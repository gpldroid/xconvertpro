<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class UploaderSettings extends Settings
{

    public ?string $prefix;
    public int $maxFileSize;
    public int $deleteTime;
    public int $maxFiles;

    public static function group(): string
    {
        return 'uploader';
    }
}
