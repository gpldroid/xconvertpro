<?php

namespace App\Http\Controllers;

use App\Settings\ConvertersSlugsSettings;
use App\Settings\HomePageSettings;
use Artesaos\SEOTools\Facades\SEOTools;

class HomeController extends Controller
{
    public function index(
        HomePageSettings $settings,
        ConvertersSlugsSettings $slugs
        ) {
        SEOTools::webPage(
            title: $settings->title,
            description: $settings->metaDescription,
            keyWords: $settings->metaKeywords,
        );

        return view('pages.home', [
            'settings' => $settings,
            'slugs' => $slugs,
        ]);
    }
}
