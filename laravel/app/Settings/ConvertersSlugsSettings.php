<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ConvertersSlugsSettings extends Settings
{
    public string $imageToAiSlug;
    public string $imageToApngSlug;
    public string $imageToAvifSlug;
    public string $imageToBmpSlug;
    public string $imageToDdsSlug;
    public string $imageToDibSlug;
    public string $imageToEpsSlug;
    public string $imageToGifSlug;
    public string $imageToHdrSlug;
    public string $imageToHeicSlug;
    public string $imageToHeifSlug;
    public string $imageToIcoSlug;
    public string $imageToJp2Slug;
    public string $imageToJpegSlug;
    public string $imageToJpeSlug;
    public string $imageToPdfSlug;
    public string $imageToPngSlug;
    public string $imageToPsdSlug;
    public string $imageToRawSlug;
    public string $imageToSvgSlug;
    public string $imageToTgaSlug;
    public string $imageToTiffSlug;
    public string $imageToWbmpSlug;
    public string $imageToWebpSlug;

    public static function group(): string
    {
        return 'slugs';
    }
}
