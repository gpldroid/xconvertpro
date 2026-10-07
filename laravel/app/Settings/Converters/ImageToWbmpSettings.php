<?php

namespace App\Settings\Converters;

class ImageToWbmpSettings extends BaseConverterSetting {

    public string $name;

    public static function group(): string {
        return 'image-to-wbmp';
    }
}