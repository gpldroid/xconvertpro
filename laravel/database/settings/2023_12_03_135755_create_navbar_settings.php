<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('navbarSettings.isStickyNavbar', false);
        $this->migrator->add('navbarSettings.isLogoVisible', true);
        $this->migrator->add('navbarSettings.logo', 'logo.png');
        $this->migrator->add('navbarSettings.logoText', 'My Logo');
        $this->migrator->add('navbarSettings.logoWidth', 90);
        $this->migrator->add('navbarSettings.logoHeight', 30);
        $this->migrator->add('navbarSettings.homeLabel', 'Home');
        $this->migrator->add('navbarSettings.isHomeLinkVisible', true);
        $this->migrator->add('navbarSettings.links', []);
    }

    public function down(): void
    {
        $this->migrator->delete('navbarSettings.isStickyNavbar');
        $this->migrator->delete('navbarSettings.isLogoVisible');
        $this->migrator->delete('navbarSettings.logo');
        $this->migrator->delete('navbarSettings.logoText');
        $this->migrator->delete('navbarSettings.logoWidth');
        $this->migrator->delete('navbarSettings.logoHeight');
        $this->migrator->delete('navbarSettings.homeLabel');
        $this->migrator->delete('navbarSettings.isHomeLinkVisible');
        $this->migrator->delete('navbarSettings.links');
    }
};
