<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class AdSettings extends Settings
{

    public ?string $topAdCode;
    public ?string $middleAdCode;
    public ?string $bottomAdCode;
    public ?string $sidebarAdCode;
    
    public static function group(): string
    {
        return 'adSettings';
    }
}