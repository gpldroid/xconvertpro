<?php

namespace App\Settings\Converters;

class ImageToJpeSettings extends BaseConverterSetting {

    public string $name;

    public static function group(): string {
        return 'image-to-jpe';
    }
}