<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('blogPageSettings.show', true);
        $this->migrator->add('blogPageSettings.title', 'Blog Page');
        $this->migrator->add('blogPageSettings.metaDescription', 'Image converter blog section');
        $this->migrator->add('blogPageSettings.metaKeywords', 'meta, key, words');
        $this->migrator->add('blogPageSettings.noIndex', false);
        $this->migrator->add('blogPageSettings.location', 'navbar');
        $this->migrator->add('blogPageSettings.label', 'Blog');
        $this->migrator->add('blogPageSettings.headerTitle', 'Blog');
        $this->migrator->add('blogPageSettings.headerSubtitle', 'News, Articles, Tips, and Tricks');
        $this->migrator->add('blogPageSettings.postsPerPage', 10);
        $this->migrator->add('blogPageSettings.topAd', false);
        $this->migrator->add('blogPageSettings.bottomAd', false);
        $this->migrator->add('blogPageSettings.showShareButtons', false);
    }
    
    public function down(): void {
        $this->migrator->delete('blogPageSettings.show');
        $this->migrator->delete('blogPageSettings.title');
        $this->migrator->delete('blogPageSettings.metaDescription');
        $this->migrator->delete('blogPageSettings.metaKeywords');
        $this->migrator->delete('blogPageSettings.noIndex');
        $this->migrator->delete('blogPageSettings.location');
        $this->migrator->delete('blogPageSettings.label');
        $this->migrator->delete('blogPageSettings.headerTitle');
        $this->migrator->delete('blogPageSettings.headerSubtitle');
        $this->migrator->delete('blogPageSettings.postsPerPage');
        $this->migrator->delete('blogPageSettings.topAd');
        $this->migrator->delete('blogPageSettings.bottomAd');
        $this->migrator->delete('blogPageSettings.showShareButtons');
    }
};
