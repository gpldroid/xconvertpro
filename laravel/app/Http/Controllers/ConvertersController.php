<?php

namespace App\Http\Controllers;

use App\Models\ViewsCounter;
use App\Settings\ConvertersSlugsSettings;
use Artesaos\SEOTools\Facades\SEOTools;

class ConvertersController extends Controller
{
    public static function index(
        string $slug
    ) {
        $slugs = app(ConvertersSlugsSettings::class);

        # resolve converter from name (e.g. imageToAiSlug)
        $name = $slugs
            ->originalValues
            ->filter(
                fn ($value) => trim(strtolower($slug)) === $value
            )
            ->flip()
            ->first();
        $converter = collect(converters())->filter(
            fn ($converter) => $name === $converter['name']
        )->first();
        abort_if($converter === null, 404);

        $settings = app($converter['settings']);
        abort_if(!$settings->enabled, 404);

        SEOTools::webPage(
            title: $settings->title,
            description: $settings->metaDescription
        );

        ViewsCounter::addPage(
            identifier: $settings->name,
            title: $converter['admin']['title']
        );
        return view('pages.converter', [
            'slug'             => $slug,
            'slugs'            => $slugs,
            'format'           => $converter['format'],
            'headerTitle'      => $settings->headerTitle,
            'headerSubtitle'   => $settings->headerSubtitle,
            'description'      => $settings->description,
            'showTopAd'        => $settings->showTopAd,
            'showBottomAd'     => $settings->showBottomAd,
            'showMiddleAd'     => $settings->showMiddleAd,
            'showShareButtons' => $settings->showShareButtons,
        ]);
    }
}
