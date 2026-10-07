<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ContactPageSettings extends Settings
{
    public bool $show;
    public string $title;
    public string $metaDescription;
    public ?string $metaKeywords;
    public bool $noIndex;
    public string $location;
    public string $label;
    public string $content;
    public ?string $email;
    public ?string $facebook;
    public ?string $twitter;
    public ?string $instagram;
    public ?string $whatsapp;
    public ?string $telegram;
    public ?bool $topAd;
    public ?bool $bottomAd;
    public ?bool $showShareButtons;

    public static function group(): string
    {
        return 'contactPageSettings';
    }
}
