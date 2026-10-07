<?php

namespace App\Settings\Converters;

class ImageToHdrSettings extends BaseConverterSetting {

    public string $name;

    public static function group(): string {
        return 'image-to-hdr';
    }
}