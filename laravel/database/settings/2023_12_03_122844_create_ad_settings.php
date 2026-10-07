<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $adPlaceHolder = '<p style="text-align: center;color: gray;font-size: 1rem;border: 1px solid #ddd;border-radius: 8px;padding: 2.5rem;background: #fafafa;">YOUR AD GOES HERE</p>';

        $this->migrator->add('adSettings.topAdCode', $adPlaceHolder);
        $this->migrator->add('adSettings.middleAdCode', $adPlaceHolder);
        $this->migrator->add('adSettings.bottomAdCode', $adPlaceHolder);
        $this->migrator->add('adSettings.sidebarAdCode', $adPlaceHolder);
    }

    public function down(): void
    {
        $this->migrator->delete('adSettings.topAdCode');
        $this->migrator->delete('adSettings.middleAdCode');
        $this->migrator->delete('adSettings.bottomAdCode');
        $this->migrator->delete('adSettings.sidebarAdCode');
    }
};
