<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('slugs.imageToAiSlug', 'image-to-ai');
        $this->migrator->add('slugs.imageToApngSlug', 'image-to-apng');
        $this->migrator->add('slugs.imageToAvifSlug', 'image-to-avif');
        $this->migrator->add('slugs.imageToBmpSlug', 'image-to-bmp');
        $this->migrator->add('slugs.imageToDdsSlug', 'image-to-dds');
        $this->migrator->add('slugs.imageToDibSlug', 'image-to-dib');
        $this->migrator->add('slugs.imageToDjvuSlug', 'image-to-djvu');
        $this->migrator->add('slugs.imageToEpsSlug', 'image-to-eps');
        $this->migrator->add('slugs.imageToGifSlug', 'image-to-gif');
        $this->migrator->add('slugs.imageToHdrSlug', 'image-to-hdr');
        $this->migrator->add('slugs.imageToHeicSlug', 'image-to-heic');
        $this->migrator->add('slugs.imageToHeifSlug', 'image-to-heif');
        $this->migrator->add('slugs.imageToIcoSlug', 'image-to-ico');
        $this->migrator->add('slugs.imageToJp2Slug', 'image-to-jp2');
        $this->migrator->add('slugs.imageToJpeSlug', 'image-to-jpe');
        $this->migrator->add('slugs.imageToJpegSlug', 'image-to-jpeg');
        $this->migrator->add('slugs.imageToPdfSlug', 'image-to-pdf');
        $this->migrator->add('slugs.imageToPsdSlug', 'image-to-psd');
        $this->migrator->add('slugs.imageToPngSlug', 'image-to-png');
        $this->migrator->add('slugs.imageToRawSlug', 'image-to-raw');
        $this->migrator->add('slugs.imageToSvgSlug', 'image-to-svg');
        $this->migrator->add('slugs.imageToTgaSlug', 'image-to-tga');
        $this->migrator->add('slugs.imageToTiffSlug', 'image-to-tiff');
        $this->migrator->add('slugs.imageToWbmpSlug', 'image-to-wbmp');
        $this->migrator->add('slugs.imageToWebpSlug', 'image-to-webp');
    }

    public function down(): void
    {
        $this->migrator->delete('slugs.imageToAiSlug');
        $this->migrator->delete('slugs.imageToApngSlug');
        $this->migrator->delete('slugs.imageToAvifSlug');
        $this->migrator->delete('slugs.imageToBmpSlug');
        $this->migrator->delete('slugs.imageToDdsSlug');
        $this->migrator->delete('slugs.imageToDibSlug');
        $this->migrator->delete('slugs.imageToDjvuSlug');
        $this->migrator->delete('slugs.imageToEpsSlug');
        $this->migrator->delete('slugs.imageToGifSlug');
        $this->migrator->delete('slugs.imageToHdrSlug');
        $this->migrator->delete('slugs.imageToHeicSlug');
        $this->migrator->delete('slugs.imageToHeifSlug');
        $this->migrator->delete('slugs.imageToIcoSlug');
        $this->migrator->delete('slugs.imageToJp2Slug');
        $this->migrator->delete('slugs.imageToJpegSlug');
        $this->migrator->delete('slugs.imageToJpeSlug');
        $this->migrator->delete('slugs.imageToPdfSlug');
        $this->migrator->delete('slugs.imageToPngSlug');
        $this->migrator->delete('slugs.imageToPsdSlug');
        $this->migrator->delete('slugs.imageToSvgSlug');
        $this->migrator->delete('slugs.imageToRawSlug');
        $this->migrator->delete('slugs.imageToTgaSlug');
        $this->migrator->delete('slugs.imageToTiffSlug');
        $this->migrator->delete('slugs.imageToWbmpSlug');
        $this->migrator->delete('slugs.imageToWebpSlug');
    }
};
