<?php

namespace App\Settings\Converters;

class ImageToTgaSettings extends BaseConverterSetting {

    public string $name;

    public static function group(): string {
        return 'image-to-tga';
    }
}