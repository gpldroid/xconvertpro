<?php

namespace App\Settings\Converters;

class ImageToTiffSettings extends BaseConverterSetting {

    public string $name;

    public static function group(): string {
        return 'image-to-tiff';
    }
}