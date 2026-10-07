<?php

namespace App\Settings\Converters;

class ImageToAvifSettings extends BaseConverterSetting {

    public string $name;

    public static function group(): string {
        return 'image-to-avif';
    }
}