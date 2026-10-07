<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('shareButtonsSettings.facebook', 'Facebook');
        $this->migrator->add('shareButtonsSettings.enableFacebook', true);
        $this->migrator->add('shareButtonsSettings.twitter', 'Twitter');
        $this->migrator->add('shareButtonsSettings.enableTwitter', true);
        $this->migrator->add('shareButtonsSettings.whatsapp', 'WhatsApp');
        $this->migrator->add('shareButtonsSettings.enableWhatsApp', true);
        $this->migrator->add('shareButtonsSettings.telegram', 'Telegram');
        $this->migrator->add('shareButtonsSettings.enableTelegram', true);
        $this->migrator->add('shareButtonsSettings.linkedin', 'LinkedIn');
        $this->migrator->add('shareButtonsSettings.enableLinkedIn', true);
        $this->migrator->add('shareButtonsSettings.reddit', 'Reddit');
        $this->migrator->add('shareButtonsSettings.enableReddit', false);
        $this->migrator->add('shareButtonsSettings.pinterest', 'Pinterest');
        $this->migrator->add('shareButtonsSettings.enablePinterest', false);
        $this->migrator->add('shareButtonsSettings.skype', 'Skype');
        $this->migrator->add('shareButtonsSettings.enableSkype', false);
        $this->migrator->add('shareButtonsSettings.evernote', 'Evernote');
        $this->migrator->add('shareButtonsSettings.enableEvernote', false);
        $this->migrator->add('shareButtonsSettings.vkontakte', 'VKontakte');
        $this->migrator->add('shareButtonsSettings.enableVKontakte', false);
        $this->migrator->add('shareButtonsSettings.hackernews', 'HackerNews');
        $this->migrator->add('shareButtonsSettings.enableHackerNews', false);
    }

    public function down(): void
    {
        $this->migrator->delete('shareButtonsSettings.facebook');
        $this->migrator->delete('shareButtonsSettings.enableFacebook');
        $this->migrator->delete('shareButtonsSettings.twitter');
        $this->migrator->delete('shareButtonsSettings.enableTwitter');
        $this->migrator->delete('shareButtonsSettings.whatsapp');
        $this->migrator->delete('shareButtonsSettings.enableWhatsApp');
        $this->migrator->delete('shareButtonsSettings.telegram');
        $this->migrator->delete('shareButtonsSettings.enableTelegram');
        $this->migrator->delete('shareButtonsSettings.linkedin');
        $this->migrator->delete('shareButtonsSettings.enableLinkedIn');
        $this->migrator->delete('shareButtonsSettings.reddit');
        $this->migrator->delete('shareButtonsSettings.enableReddit');
        $this->migrator->delete('shareButtonsSettings.pinterest');
        $this->migrator->delete('shareButtonsSettings.enablePinterest');
        $this->migrator->delete('shareButtonsSettings.skype');
        $this->migrator->delete('shareButtonsSettings.enableSkype');
        $this->migrator->delete('shareButtonsSettings.evernote');
        $this->migrator->delete('shareButtonsSettings.enableEvernote');
        $this->migrator->delete('shareButtonsSettings.vkontakte');
        $this->migrator->delete('shareButtonsSettings.enableVKontakte');
        $this->migrator->delete('shareButtonsSettings.hackernews');
        $this->migrator->delete('shareButtonsSettings.enableHackerNews');
    }
};
