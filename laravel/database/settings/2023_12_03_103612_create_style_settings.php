<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('styleSettings.bgColor', '#ffffff');
        $this->migrator->add('styleSettings.textColor', '#111827');
        $this->migrator->add('styleSettings.navBgColor', '#f3f4f6');
        $this->migrator->add('styleSettings.navTextColor', '#111827');
        $this->migrator->add('styleSettings.uploaderBgColor', '#eaf2f8');
        $this->migrator->add('styleSettings.uploaderTextColor', '#9ca3af');
        $this->migrator->add('styleSettings.uploadBarTextColor', '#fff');
        $this->migrator->add('styleSettings.uploadBarSuccessBgColor', '#198754');
        $this->migrator->add('styleSettings.uploadBarErrorBgColor', '#c44e47');
        $this->migrator->add('styleSettings.browseBtnBgColor', '#262626');
        $this->migrator->add('styleSettings.browseBtnTextColor', '#e5e7eb');
        $this->migrator->add('styleSettings.convertBtnBgColor', '#14b8a6');
        $this->migrator->add('styleSettings.convertBtnTextColor', '#ffffff');
        $this->migrator->add('styleSettings.cardBgColor', '#ffffff');
        $this->migrator->add('styleSettings.cardTextColor', '#111827');
        $this->migrator->add('styleSettings.cardHoverBgColor', '#0284c7');
        $this->migrator->add('styleSettings.cardHoverTextColor', '#ffffff');
        $this->migrator->add('styleSettings.customCSS', '/* your CSS goes here */');
    }

    public function down(): void
    {
        $this->migrator->delete('styleSettings.bgColor');
        $this->migrator->delete('styleSettings.textColor');
        $this->migrator->delete('styleSettings.navBgColor');
        $this->migrator->delete('styleSettings.navTextColor');
        $this->migrator->delete('styleSettings.uploaderBgColor');
        $this->migrator->delete('styleSettings.uploaderTextColor');
        $this->migrator->delete('styleSettings.uploadBarTextColor');
        $this->migrator->delete('styleSettings.uploadBarSuccessBgColor');
        $this->migrator->delete('styleSettings.uploadBarErrorBgColor');
        $this->migrator->delete('styleSettings.browseBtnBgColor');
        $this->migrator->delete('styleSettings.browseBtnTextColor');
        $this->migrator->delete('styleSettings.convertBtnBgColor');
        $this->migrator->delete('styleSettings.convertBtnTextColor');
        $this->migrator->delete('styleSettings.cardBgColor');
        $this->migrator->delete('styleSettings.cardTextColor');
        $this->migrator->delete('styleSettings.cardHoverBgColor');
        $this->migrator->delete('styleSettings.cardHoverTextColor');
        $this->migrator->delete('styleSettings.customCSS');
    }
};
