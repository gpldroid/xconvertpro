<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class StyleSettings extends Settings
{
    public string $bgColor;
    public string $textColor;
    public string $cardBgColor;
    public string $cardTextColor;
    public string $cardHoverBgColor;
    public string $cardHoverTextColor;
    public string $navBgColor;
    public string $navTextColor;
    public string $uploaderBgColor;
    public string $uploaderTextColor;
    public string $uploadBarTextColor;
    public string $uploadBarSuccessBgColor;
    public string $uploadBarErrorBgColor;
    public string $browseBtnBgColor;
    public string $browseBtnTextColor;
    public string $convertBtnBgColor;
    public string $convertBtnTextColor;
    public ?string $customCSS;

    public static function group(): string
    {
        return 'styleSettings';
    }
}
