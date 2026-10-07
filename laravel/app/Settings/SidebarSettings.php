<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SidebarSettings extends Settings
{

    public bool $enableSidebar;
    public bool $showRecentPosts;
    public bool $showAd;
    public bool $isStickySidebar;

    public static function group(): string
    {
        return 'sidebarSettings';
    }
}