<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{

    public bool $debugEnabled;
    public ?string $favicon;
    public ?string $analyticsId;
    public ?string $headerTags;

    public static function group(): string
    {
        return 'generalSettings';
    }
}