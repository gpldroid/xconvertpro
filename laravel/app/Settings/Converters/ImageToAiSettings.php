<?php

namespace App\Settings\Converters;

class ImageToAiSettings extends BaseConverterSetting {

    public string $name;

    public static function group(): string {
        return 'image-to-ai';
    }
}