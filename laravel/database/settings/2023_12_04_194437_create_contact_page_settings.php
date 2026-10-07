<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('contactPageSettings.show', true);
        $this->migrator->add('contactPageSettings.title', 'Contact Us');
        $this->migrator->add('contactPageSettings.metaDescription', 'If you have any suggestions or problems, please feel free to contact us.');
        $this->migrator->add('contactPageSettings.metaKeywords', 'meta, key, words');
        $this->migrator->add('contactPageSettings.noIndex', false);
        $this->migrator->add('contactPageSettings.location', 'footer');
        $this->migrator->add('contactPageSettings.label', 'Contact Us');
        $this->migrator->add('contactPageSettings.content', 'Have a question about this website? Did you find a bug in one of the tools? You can contact me me at:');
        $this->migrator->add('contactPageSettings.email', 'westiti@mail.com');
        $this->migrator->add('contactPageSettings.facebook', 'https://www.facebook.com/username');
        $this->migrator->add('contactPageSettings.twitter', 'https://twitter.com/username');
        $this->migrator->add('contactPageSettings.instagram', 'https://instagram.com/username');
        $this->migrator->add('contactPageSettings.whatsapp', '+123456789');
        $this->migrator->add('contactPageSettings.telegram', '+123456789');
        $this->migrator->add('contactPageSettings.topAd', false);
        $this->migrator->add('contactPageSettings.bottomAd', false);
        $this->migrator->add('contactPageSettings.showShareButtons', false);
    }

    public function down(): void
    {
        $this->migrator->delete('contactPageSettings.show');
        $this->migrator->delete('contactPageSettings.title');
        $this->migrator->delete('contactPageSettings.metaDescription');
        $this->migrator->delete('contactPageSettings.metaKeywords');
        $this->migrator->delete('contactPageSettings.noIndex');
        $this->migrator->delete('contactPageSettings.location');
        $this->migrator->delete('contactPageSettings.label');
        $this->migrator->delete('contactPageSettings.content');
        $this->migrator->delete('contactPageSettings.email');
        $this->migrator->delete('contactPageSettings.facebook');
        $this->migrator->delete('contactPageSettings.twitter');
        $this->migrator->delete('contactPageSettings.instagram');
        $this->migrator->delete('contactPageSettings.whatsapp');
        $this->migrator->delete('contactPageSettings.telegram');
        $this->migrator->delete('contactPageSettings.topAd');
        $this->migrator->delete('contactPageSettings.bottomAd');
        $this->migrator->delete('contactPageSettings.showShareButtons');
    }
};
