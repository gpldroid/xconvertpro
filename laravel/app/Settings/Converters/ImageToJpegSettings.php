<?php

namespace App\Settings\Converters;

class ImageToJpegSettings extends BaseConverterSetting {

    public string $name;

    public static function group(): string {
        return 'image-to-jpeg';
    }
}