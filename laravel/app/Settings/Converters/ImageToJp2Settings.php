<?php

namespace App\Settings\Converters;

class ImageToJp2Settings extends BaseConverterSetting {

    public string $name;

    public static function group(): string {
        return 'image-to-jp2';
    }
}