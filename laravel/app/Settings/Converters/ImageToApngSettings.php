<?php

namespace App\Settings\Converters;

class ImageToApngSettings extends BaseConverterSetting {

    public string $name;

    public static function group(): string {
        return 'image-to-apng';
    }
}