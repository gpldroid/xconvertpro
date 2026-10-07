<?php

namespace App\Providers;

use App\Models\ConvertsCounter;
use App\Settings\AdSettings;
use App\Settings\BlogPageSettings;
use App\Settings\ContactPageSettings;
use App\Settings\GeneralSettings;
use App\Settings\SidebarSettings;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        # https://stackoverflow.com/questions/42244541/laravel-migration-error-syntax-error-or-access-violation-1071-specified-key-wa
        Schema::defaultStringLength(191);

        if (isCloudFlareHttps()) {
            URL::forceScheme('https');
        }

        if (checkProgress('installed')) {
            Paginator::defaultView('pagination.default');

            SEOTools::macro('webPage', function (
                string $title,
                string $description,
                ?string $keyWords = null,
            ) {
                SEOMeta::setTitle($title);
                SEOMeta::setDescription($description);
                $keyWords && SEOMeta::addKeyword($keyWords);
                SEOMeta::setCanonical(url()->current());
            });

            $generalSettings = app(GeneralSettings::class);
            $adSettings      = app(AdSettings::class);
            $contactSettings = app(ContactPageSettings::class);
            $blogSettings    = app(BlogPageSettings::class);
            $sidebarSettings = app(SidebarSettings::class);

            config(['app.debug' => $generalSettings->debugEnabled]);

            View::share([
                'generalSettings' => $generalSettings,
                'adSettings'      => $adSettings,
                'blogSettings'    => $blogSettings,
                'contactSettings' => $contactSettings,
                'sidebarSettings' => $sidebarSettings,
                'totalConverted'  => ConvertsCounter::first()?->count ?? 0
            ]);
        }
    }
}
