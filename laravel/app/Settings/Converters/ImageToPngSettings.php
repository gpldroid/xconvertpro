<?php

namespace App\Settings\Converters;

class ImageToPngSettings extends BaseConverterSetting {

    public string $name;

    public static function group(): string {
        return 'image-to-png';
    }
}