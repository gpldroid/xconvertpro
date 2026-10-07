<?php

namespace App\Settings\Converters;

class ImageToPdfSettings extends BaseConverterSetting {

    public string $name;

    public static function group(): string {
        return 'image-to-pdf';
    }
}