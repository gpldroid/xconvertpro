<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ShareButtonsSettings extends Settings
{
    public string $facebook;
    public bool $enableFacebook;
    public string $twitter;
    public bool $enableTwitter;
    public string $whatsapp;
    public bool $enableWhatsApp;
    public string $telegram;
    public bool $enableTelegram;
    public string $linkedin;
    public bool $enableLinkedIn;
    public string $reddit;
    public bool $enableReddit;
    public string $pinterest;
    public bool $enablePinterest;
    public string $skype;
    public bool $enableSkype;
    public string $evernote;
    public bool $enableEvernote;
    public string $vkontakte;
    public bool $enableVKontakte;
    public string $hackernews;
    public bool $enableHackerNews;

    public static function group(): string
    {
        return 'shareButtonsSettings';
    }
}
