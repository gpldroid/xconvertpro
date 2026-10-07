<?php

namespace App\Settings\Converters;

class ImageToHeifSettings extends BaseConverterSetting {

    public string $name;

    public static function group(): string {
        return 'image-to-heif';
    }
}