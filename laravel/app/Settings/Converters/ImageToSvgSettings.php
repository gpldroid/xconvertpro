<?php

namespace App\Settings\Converters;

class ImageToSvgSettings extends BaseConverterSetting {

    public string $name;

    public static function group(): string {
        return 'image-to-svg';
    }
}