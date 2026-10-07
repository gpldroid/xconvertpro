<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class BlogPageSettings extends Settings
{
    public bool $show;
    public string $title;
    public string $metaDescription;
    public ?string $metaKeywords;
    public bool $noIndex;
    public string $location;
    public string $label;
    public string $headerTitle;
    public string $headerSubtitle;
    public int $postsPerPage;
    public ?bool $topAd;
    public ?bool $bottomAd;
    public ?bool $showShareButtons;

    public static function group(): string
    {
        return 'blogPageSettings';
    }
}
