<?php

namespace App\Settings\Converters;

class ImageToIcoSettings extends BaseConverterSetting {

    public string $name;

    public static function group(): string {
        return 'image-to-ico';
    }
}