<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Settings\BlogPageSettings;
use Artesaos\SEOTools\Facades\SEOTools;

class BlogPageController extends Controller
{
    public function index(BlogPageSettings $blogSettings)
    {
        if ($blogSettings->show) {
            # https://laracasts.com/discuss/channels/laravel/how-to-cache-laravel-paginate
            $posts = cache()->rememberForever(
                cacheKey('posts.' . request('page', 1)),
                fn () => Post::select('title', 'slug', 'snippet', 'thumbnail')
                    ->where('published_at', '<', now())
                    ->paginate($blogSettings->postsPerPage)
            );

            SEOTools::webPage(
                title: $blogSettings->title,
                description: $blogSettings->metaDescription,
                keyWords: $blogSettings->metaKeywords,
            );

            return view('pages.blog', [
                'posts' => $posts,
                'settings' => $blogSettings
            ]);
        } else {
            abort(404);
        }
    }

    public static function post(
        Post $post
    ) {
        $blogSettings = app(BlogPageSettings::class);
        if ($blogSettings->show && $post->published_at?->isPast()) {
            SEOTools::webPage(
                title: $post->title,
                description: $post->metaDescription,
                keyWords: $post->metaKeywords,
            );

            $expiresAt = now()->addMinutes(5);
            views($post)->cooldown($expiresAt)->record();
            return view('pages.post', [
                'post' => $post,
            ]);
        } else {
            abort(404);
        }
    }
}
