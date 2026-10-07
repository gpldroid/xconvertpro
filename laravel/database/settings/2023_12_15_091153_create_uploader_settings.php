<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('uploader.prefix', '');
        $this->migrator->add('uploader.maxFileSize', 10 < maxFileSize() ? 10 : maxFileSize());
        $this->migrator->add('uploader.deleteTime', 1);
        $this->migrator->add('uploader.maxFiles', 10 < maxFiles() ? 10 : maxFiles());
    }
    public function down(): void
    {
        $this->migrator->delete('uploader.prefix');
        $this->migrator->delete('uploader.maxFileSize');
        $this->migrator->delete('uploader.deleteTime');
        $this->migrator->delete('uploader.maxFiles');
    }
};
