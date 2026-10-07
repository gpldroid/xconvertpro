<?php

namespace App\Settings\Converters;

class ImageToDibSettings extends BaseConverterSetting {

    public string $name;

    public static function group(): string {
        return 'image-to-dib';
    }
}