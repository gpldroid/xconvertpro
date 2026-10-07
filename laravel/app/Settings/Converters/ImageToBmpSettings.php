<?php

namespace App\Settings\Converters;

class ImageToBmpSettings extends BaseConverterSetting {

    public string $name;

    public static function group(): string {
        return 'image-to-bmp';
    }
}