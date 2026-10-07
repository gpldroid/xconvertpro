<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class HomePageSettings extends Settings
{
    public string $title;
    public string $metaDescription;
    public ?string $metaKeywords;
    public string $headerTitle;
    public string $headerSubtitle;
    public bool $topAd;
    public bool $middleAd;
    public bool $bottomAd;
    public bool $showShareButtons;
    public ?string $content;

    public static function group(): string
    {
        return 'homePage';
    }
}