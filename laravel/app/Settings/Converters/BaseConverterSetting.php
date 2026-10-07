<?php

namespace App\Settings\Converters;

use Spatie\LaravelSettings\Settings;

class BaseConverterSetting extends Settings {
    public bool   $enabled;
    public string $title;
    public string $metaDescription;
    public string $metaKeywords;
    public string $headerTitle;
    public string $headerSubtitle;
    public string $entryTitle;
    public string $entrySummary;
    public bool $showTopAd;
    public bool $showMiddleAd;
    public bool $showBottomAd;
    public bool $showShareButtons;
    public string $description;

    public static function group(): string {
        return 'converter-setting';
    }
}