<?php

namespace App\Settings\Converters;

class ImageToRawSettings extends BaseConverterSetting {

    public string $name;

    public static function group(): string {
        return 'image-to-raw';
    }
}