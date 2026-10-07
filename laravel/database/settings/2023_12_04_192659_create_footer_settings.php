<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('footerSettings.attribution', 'Copyright © 2024 - All right reserved');
        $this->migrator->add('footerSettings.links', []);
        $this->migrator->add('footerSettings.convertedCount', 0);
        $this->migrator->add('footerSettings.counterEnabled', true);
    }

    public function down(): void
    {
        $this->migrator->delete('footerSettings.attribution');
        $this->migrator->delete('footerSettings.links');
        $this->migrator->delete('footerSettings.convertedCount');
        $this->migrator->delete('footerSettings.counterEnabled');
    }
};
