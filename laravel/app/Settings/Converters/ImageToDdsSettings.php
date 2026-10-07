<?php

namespace App\Settings\Converters;

class ImageToDdsSettings extends BaseConverterSetting {

    public string $name;

    public static function group(): string {
        return 'image-to-dds';
    }
}