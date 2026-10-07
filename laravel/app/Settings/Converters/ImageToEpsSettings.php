<?php

namespace App\Settings\Converters;

class ImageToEpsSettings extends BaseConverterSetting {

    public string $name;

    public static function group(): string {
        return 'image-to-eps';
    }
}