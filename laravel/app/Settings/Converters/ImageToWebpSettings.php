<?php

namespace App\Settings\Converters;

class ImageToWebpSettings extends BaseConverterSetting {

    public string $name;

    public static function group(): string {
        return 'image-to-webp';
    }
}