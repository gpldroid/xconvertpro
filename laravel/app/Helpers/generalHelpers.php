<?php

use App\Dashboard;
use App\Models\Page;
use App\Models\Post;
use App\Settings\BlogPageSettings;
use App\Settings\ContactPageSettings;
use App\Settings\ConvertersSlugsSettings;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Winter\LaravelConfigWriter\ArrayFile;

/**
 * Check if app is behind Cloudflare
 */
if (!function_exists('isCloudFlareHttps')) {
    function isCloudFlareHttps(): bool
    {
        return isset($_SERVER['HTTPS']) ||
            (isset($_SERVER['HTTP_CF_VISITOR']) && (($visitor = json_decode($_SERVER['HTTP_CF_VISITOR'])) &&
                $visitor->scheme == 'https'));
    }
}

/**
 * add active class to current page navbar link
 * 
 * @return bool active or not
 */
if (!function_exists('active')) {
    function active(string $route): bool
    {
        # for pages links
        if (Route::is('page')) {
            return $route == "pages/" . request()->segment(2);
        }
        # for home page link
        return Route::is($route);
    }
}

/**
 * get current locale (en, fr, es, ...)
 *
 * @return string
 */
if (!function_exists('locale')) {
    function locale(): string
    {
        # en_GB => en-GB
        return str_replace('_', '-', currentLocale());
    }
}

/**
 * Get current locale
 *
 * @return string
 */
if (!function_exists('currentLocale')) {
    function currentLocale(): string
    {
        return LaravelLocalization::getCurrentLocale();
    }
}

/**
 * Get a list of all supported locales
 *
 * @return array
 */
if (!function_exists('locales')) {
    function locales(): array
    {
        return LaravelLocalization::getSupportedLocales();
    }
}

/**
 * Create a localized version of a link with route() helper
 *
 * @param string $route
 * @return string
 */
if (!function_exists('localizedRoute')) {
    function localizedRoute(string $route, mixed $parameters = []): string
    {
        return LaravelLocalization::localizeUrl(route($route, $parameters));
    }
}

/**
 * Create a localized version of a link
 *
 * @param string $route
 * @return string
 */
if (!function_exists('localizedUrl')) {
    function localizedUrl(string $route): string
    {
        return LaravelLocalization::localizeUrl($route);
    }
}

/**
 * Get a flag from locale
 *
 * @param string $locale
 * @return string
 */
function flag(string $locale): string
{
    return locales()[$locale]['flag'];
}

/**
 * Get language native name from locale
 *
 * @param string $locale
 * @return string
 */
function nativeName(string $locale): string
{
    return locales()[$locale]['native'];
}

/**
 * Rename uploaded file name
 *
 * @param string $new file name
 * @return string
 */
if (!function_exists('renameUploadedFile')) {
    function renameUploadedFile(UploadedFile $file, string $newName): string
    {
        $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);

        return  "{$newName}.{$extension}";
    }
}

/**
 * Check installation progress
 *
 * @param string $step possible values: "requirements", "database", "admin", "installed"
 * @return bool step progress
 */
function checkProgress(string $step): bool
{
    /**
     * For some reason, include returns the old values after the new values 
     * hav been saved
     */
    $progress = Storage::get('installer/progress.php');
    $progress = str_replace('<?php', '', $progress);
    $progress = eval($progress);

    return match ($step) {
        'requirements' => $progress['requirements'],
        'database' => $progress['database'],
        'admin' => $progress['admin'],
        'installed' => $progress['installed'],
        default => false
    };
}

/**
 * Save progress current step
 * We use varargs to allow saving multi steps at once
 * @param string ...$steps possible values: "requirements", "database", "admin", "installed"
 * @return void
 */
function saveProgress(string ...$steps): void
{
    $progress = ArrayFile::open(storage_path('app/installer/progress.php'));
    foreach ($steps as $step) {
        $progress->set($step, true);
    }
    $progress->write();
}

/**
 * Generate sitemap
 */

if (!function_exists('generateSiteMap')) {
    function generateSiteMap(): void
    {
        if (!Dashboard::DEMO_MODE) {
            try {
                $sitemap = Sitemap::create();

                $sitemap->add(
                    Url::create("/")
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                        ->setPriority(1.0)
                );
                if (app(ContactPageSettings::class)->show) {
                    $sitemap->add(
                        Url::create("/contact")
                            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                            ->setPriority(0.6)
                    );
                }
                foreach (converters() as $converter) {
                    $slug = app(ConvertersSlugsSettings::class)
                        ->originalValues
                        ->flip()
                        ->filter(
                            fn ($value) => $value == $converter['name']
                        )
                        ->flip()
                        ->first();
                    $sitemap->add(
                        Url::create("/{$slug}")
                            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                            ->setPriority(0.6)
                    );
                }
                foreach (Page::all() as $page) {
                    if ($page->published_at?->isPast()) {
                        $sitemap->add(
                            Url::create("/{$page->slug}")
                                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                                ->setPriority(0.6)
                        );
                    }
                }
                if (app(BlogPageSettings::class)->show) {
                    $sitemap->add(
                        Url::create("/blog")
                            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                            ->setPriority(0.6)
                    );
                    foreach (Post::all() as $post) {
                        if ($post->published_at?->isPast()) {
                            $sitemap->add(
                                Url::create("/{$post->slug}")
                                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                                    ->setPriority(0.6)
                            );
                        }
                    }
                }

                $sitemap->writeToFile(public_path('sitemap.xml'));
                Notification::make()
                    ->title('Sitemap generated successfully')
                    ->success()
                    ->send();
            } catch (\Throwable $th) {
                Log::error($th);
                Notification::make()
                    ->title('Sitemap could not be generated')
                    ->danger()
                    ->send();
            }
        } else {
            Notification::make()
                ->title('This feature is disabled in Demo Mode')
                ->warning()
                ->send();
        }
    }
}

/**
 * Clear application cache
 *
 * @return void
 */
if (!function_exists('clearCache')) {
    function clearCache(): void
    {
        if (!Dashboard::DEMO_MODE) {
            try {
                cache()->flush();
                notify('success', 'Cache has been cleared successfully');
            } catch (\Throwable $th) {
                Log::error($th);
                notify('danger', 'Cache could not be cleared');
            }
        } else {
            notify('warning', 'This feature is disabled in Demo Mode');
        }
    }
}

/**
 * Generate views cache
 *
 * @return void
 */
if (!function_exists('generateViews')) {
    function generateViews(): void
    {
        if (!Dashboard::DEMO_MODE) {
            try {
                Artisan::call('view:clear --quiet');
                notify('success', 'Views cache cleared successfully');
            } catch (\Throwable $th) {
                Log::error($th);
                notify('danger', 'Views cache could not be cleared');
            }
        } else {
            notify('warning', 'This feature is disabled in Demo Mode');
        }
    }
}

/**
 * A small helper function for filament notifications
 *
 * @param string $status
 * @param string $message
 * @return void
 */
if (!function_exists('notify')) {
    function notify(string $status, string $message): void
    {
        Notification::make()
            ->title($message)
            ->status($status)
            ->send();
    }
}

/**
 * Remove value from cache
 *
 * @param string $status
 * @param string $message
 * @return void
 */
if (!function_exists('removePagePostFromCache')) {
    function removePagePostFromCache(Model $record): void
    {
        cache()->forget(cacheKey($record->slug));
    }
}

/**
 * Remove cached pagination
 * @return void
 */
if (!function_exists('removePaginationCache')) {
    function removePaginationCache(): void
    {
        $limit = Post::all()->count();
        for ($i = 1; $i < $limit; $i++) {
            $key = cacheKey("posts.$i");
            if (cache()->has($key)) {
                cache()->forget($key);
            } else {
                break;
            }
        }
    }
}

/**
 * Normalize cache keys
 */
if (!function_exists('cacheKey')) {
    function cacheKey(string $name): string
    {
        return "my.custom.key.$name";
    }
}
