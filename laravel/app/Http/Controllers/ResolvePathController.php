<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use App\Settings\ConvertersSlugsSettings;
use Illuminate\Support\Facades\Cache;

class ResolvePathController extends Controller
{
    public function resolve(
        string $path,
        ConvertersSlugsSettings $slugs
    ) {
        # 1. resolve converter path
        # check if converter slug exists
        $slug = $slugs
            ->originalValues
            ->filter(
                fn ($value) => trim(strtolower($path)) === $value
            )
            ->first();
        if ($slug) {
            return ConvertersController::index($slug);
        }

        # 2. resolve post path 
        $post = Cache::rememberForever(
            cacheKey("post.{$path}"),
            fn () => Post::where('slug', $path)->first()
        );
        if ($post) {
            return BlogPageController::post($post);
        }
        # remove cached null post
        cache()->forget("post.{$path}");

        # 3. resolve page path
        $page = Cache::rememberForever(
            cacheKey("page.{$path}"),
            fn () => Page::where('slug', $path)->first()
        );
        if ($page) {
            return PageController::index($page);
        }
        # remove cache null page
        cache()->forget("page.{$path}");

        # 4. abort if no match found
        abort(404);
    }
}
