<?php

namespace App\Settings\Converters;

class ImageToGifSettings extends BaseConverterSetting {

    public string $name;

    public static function group(): string {
        return 'image-to-gif';
    }
}