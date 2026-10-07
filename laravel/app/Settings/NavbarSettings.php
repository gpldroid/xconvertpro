<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class NavbarSettings extends Settings
{
    public bool $isStickyNavbar;
    public bool $isLogoVisible;
    public ?string $logo;
    public ?string $logoText;
    public ?int $logoWidth;
    public ?int $logoHeight;
    public string $homeLabel;
    public bool $isHomeLinkVisible;
    public ?array $links;

    public static function group(): string
    {
        return 'navbarSettings';
    }
}
