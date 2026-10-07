<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('sidebarSettings.enableSidebar', true);
        $this->migrator->add('sidebarSettings.showRecentPosts', true);
        $this->migrator->add('sidebarSettings.showAd', true);
        $this->migrator->add('sidebarSettings.isStickySidebar', false);
    }

    public function down(): void
    {
        $this->migrator->delete('sidebarSettings.enableSidebar');
        $this->migrator->delete('sidebarSettings.showRecentPosts');
        $this->migrator->delete('sidebarSettings.showAd');
        $this->migrator->delete('sidebarSettings.isStickySidebar');
    }
};
