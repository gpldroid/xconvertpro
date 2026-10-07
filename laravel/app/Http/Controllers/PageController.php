<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Artesaos\SEOTools\Facades\SEOTools;

class PageController extends Controller
{
    public static function index(Page $page)
    {
        if ($page->published_at?->isPast()) {
            SEOTools::webPage(
                title: $page->title,
                description: $page->metaDescription,
                keyWords: $page->metaKeywords,
            );
            
            return view('pages.page', compact('page'));
        } else {
            abort(404) ;
        }
    }
}
