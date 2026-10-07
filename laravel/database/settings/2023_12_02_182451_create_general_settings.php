<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('generalSettings.debugEnabled', false);
        $this->migrator->add('generalSettings.favicon', 'favicon.ico');
        $this->migrator->add('generalSettings.analyticsId', '');
        $this->migrator->add('generalSettings.headerTags', '');
    }

    public function down(): void
    {
        $this->migrator->delete('generalSettings.debugEnabled');
        $this->migrator->delete('generalSettings.favicon');
        $this->migrator->delete('generalSettings.analyticsId');
        $this->migrator->delete('generalSettings.headerTags');
    }
};
