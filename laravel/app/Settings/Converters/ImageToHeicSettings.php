<?php

namespace App\Settings\Converters;

class ImageToHeicSettings extends BaseConverterSetting {

    public string $name;

    public static function group(): string {
        return 'image-to-heic';
    }
}