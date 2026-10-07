<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class FooterSettings extends Settings
{
    public string $attribution;
    public int $convertedCount;
    public bool $counterEnabled;
    public ?array $links;

    public static function group(): string
    {
        return 'footerSettings';
    }
}