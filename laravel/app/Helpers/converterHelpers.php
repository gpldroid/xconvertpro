<?php

use App\Filament\Pages\Converters\ManageImageToAiSettings;
use App\Filament\Pages\Converters\ManageImageToApngSettings;
use App\Filament\Pages\Converters\ManageImageToAvifSettings;
use App\Filament\Pages\Converters\ManageImageToBmpSettings;
use App\Filament\Pages\Converters\ManageImageToDdsSettings;
use App\Filament\Pages\Converters\ManageImageToDibSettings;
use App\Filament\Pages\Converters\ManageImageToEpsSettings;
use App\Filament\Pages\Converters\ManageImageToGifSettings;
use App\Filament\Pages\Converters\ManageImageToHdrSettings;
use App\Filament\Pages\Converters\ManageImageToHeicSettings;
use App\Filament\Pages\Converters\ManageImageToHeifSettings;
use App\Filament\Pages\Converters\ManageImageToIcoSettings;
use App\Filament\Pages\Converters\ManageImageToJp2Settings;
use App\Filament\Pages\Converters\ManageImageToJpegSettings;
use App\Filament\Pages\Converters\ManageImageToJpeSettings;
use App\Filament\Pages\Converters\ManageImageToPdfSettings;
use App\Filament\Pages\Converters\ManageImageToPngSettings;
use App\Filament\Pages\Converters\ManageImageToPsdSettings;
use App\Filament\Pages\Converters\ManageImageToRawSettings;
use App\Filament\Pages\Converters\ManageImageToSvgSettings;
use App\Filament\Pages\Converters\ManageImageToTgaSettings;
use App\Filament\Pages\Converters\ManageImageToTiffSettings;
use App\Filament\Pages\Converters\ManageImageToWbmpSettings;
use App\Filament\Pages\Converters\ManageImageToWebpSettings;
use App\Services\ByteSize;
use App\Settings\Converters\ImageToAiSettings;
use App\Settings\Converters\ImageToApngSettings;
use App\Settings\Converters\ImageToAvifSettings;
use App\Settings\Converters\ImageToBmpSettings;
use App\Settings\Converters\ImageToDdsSettings;
use App\Settings\Converters\ImageToDibSettings;
use App\Settings\Converters\ImageToEpsSettings;
use App\Settings\Converters\ImageToGifSettings;
use App\Settings\Converters\ImageToHdrSettings;
use App\Settings\Converters\ImageToHeicSettings;
use App\Settings\Converters\ImageToHeifSettings;
use App\Settings\Converters\ImageToIcoSettings;
use App\Settings\Converters\ImageToJp2Settings;
use App\Settings\Converters\ImageToJpegSettings;
use App\Settings\Converters\ImageToJpeSettings;
use App\Settings\Converters\ImageToPdfSettings;
use App\Settings\Converters\ImageToPngSettings;
use App\Settings\Converters\ImageToPsdSettings;
use App\Settings\Converters\ImageToRawSettings;
use App\Settings\Converters\ImageToSvgSettings;
use App\Settings\Converters\ImageToTgaSettings;
use App\Settings\Converters\ImageToTiffSettings;
use App\Settings\Converters\ImageToWbmpSettings;
use App\Settings\Converters\ImageToWebpSettings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Get upload max file size in MB
 *  ...
 * 
 * @return int - file size
 */
function maxFileSize(): int
{
    return min((int)ini_get('upload_max_filesize'), (int)ini_get('post_max_size'));
}

/**
 * Get upload max files
 *  ...
 *
 * @return int - number of files
 */
function maxFiles(): int
{
    return (int)ini_get('max_file_uploads');
}

/**
 * Delete images older than 15 minutes
 *
 * @param string $maxAge - 7 * 24 * 60 * 60 * 60 format
 * @return void
 */
function deleteOldImages(int $duration)
{
    $maxAge = $duration * 60 * 60;
    $files = array_merge(
        Storage::disk('upload_storage')->allFiles("uploads"),
        Storage::disk('upload_storage')->allFiles("converted")
    );
    # get images older than 1 hour
    $oldFiles = collect($files)->filter(
        fn ($file) => (time() - Storage::disk('upload_storage')->lastModified($file)) > $maxAge
    )->toArray();
    Storage::disk('upload_storage')->delete($oldFiles);
}

/**
 * Get all converters entries
 *
 * @return array
 */
function converters(): array
{
    $pageViews = DB::table('views_counters')->get();

    /**
     * Get converter views
     *
     * @param string $slugName
     * @return integer
     */
    $views = function (string $slugName) use ($pageViews): int {
        return $pageViews
            ->filter(fn ($page) => $page->identifier === $slugName)
            ->pluck('views')
            # if converter not added to page_views table
            ->first() ?? 0;
    };

    return [
        [
            'name' => app(ImageToAiSettings::class)->name,
            'format' => 'ai',
            'title' => app(ImageToAiSettings::class)->headerTitle,
            'entryTitle' => app(ImageToAiSettings::class)->entryTitle,
            'entrySummary' => app(ImageToAiSettings::class)->entrySummary,
            'enabled' => app(ImageToAiSettings::class)->enabled,
            'settings' => ImageToAiSettings::class,
            'views' => $views(app(ImageToAiSettings::class)->name),
            'icon' => 'icons.formats.ai',
            'admin' => [
                'title' => 'Image to AI',
                'summary' => 'Convert any image to AI format',
                'settings-page' => ManageImageToAiSettings::class
            ]
        ],
        [
            'name' => app(ImageToApngSettings::class)->name,
            'format' => 'apng',
            'title' => app(ImageToApngSettings::class)->headerTitle,
            'entryTitle' => app(ImageToApngSettings::class)->entryTitle,
            'entrySummary' => app(ImageToApngSettings::class)->entrySummary,
            'enabled' => app(ImageToApngSettings::class)->enabled,
            'settings' => ImageToApngSettings::class,
            'views' => $views(app(ImageToApngSettings::class)->name),
            'icon' => 'icons.formats.apng',
            'admin' => [
                'title' => 'Image to APNG',
                'summary' => 'Convert any image to APNG format',
                'settings-page' => ManageImageToApngSettings::class
            ]
        ],
        [
            'name' => app(ImageToAvifSettings::class)->name,
            'format' => 'avif',
            'title' => app(ImageToAvifSettings::class)->headerTitle,
            'entryTitle' => app(ImageToAvifSettings::class)->entryTitle,
            'entrySummary' => app(ImageToAvifSettings::class)->entrySummary,
            'enabled' => app(ImageToAvifSettings::class)->enabled,
            'settings' => ImageToAvifSettings::class,
            'views' => $views(app(ImageToAvifSettings::class)->name),
            'icon' => 'icons.formats.avif',
            'admin' => [
                'title' => 'Image to AVIF',
                'summary' => 'Convert any image to AVIF format',
                'settings-page' => ManageImageToAvifSettings::class
            ]
        ],
        [
            'name' => app(ImageToBmpSettings::class)->name,
            'format' => 'bmp',
            'title' => app(ImageToBmpSettings::class)->headerTitle,
            'entryTitle' => app(ImageToBmpSettings::class)->entryTitle,
            'entrySummary' => app(ImageToBmpSettings::class)->entrySummary,
            'enabled' => app(ImageToBmpSettings::class)->enabled,
            'settings' => ImageToBmpSettings::class,
            'views' => $views(app(ImageToBmpSettings::class)->name),
            'icon' => 'icons.formats.bmp',
            'admin' => [
                'title' => 'Image to BMP',
                'summary' => 'Convert any image to BMP format',
                'settings-page' => ManageImageToBmpSettings::class
            ]
        ],
        [
            'name' => app(ImageToDdsSettings::class)->name,
            'format' => 'dds',
            'title' => app(ImageToDdsSettings::class)->headerTitle,
            'entryTitle' => app(ImageToDdsSettings::class)->entryTitle,
            'entrySummary' => app(ImageToDdsSettings::class)->entrySummary,
            'enabled' => app(ImageToDdsSettings::class)->enabled,
            'settings' => ImageToDdsSettings::class,
            'views' => $views(app(ImageToDdsSettings::class)->name),
            'icon' => 'icons.formats.dds',
            'admin' => [
                'title' => 'Image to DDS',
                'summary' => 'Convert any image to DDS format',
                'settings-page' => ManageImageToDdsSettings::class
            ]
        ],
        [
            'name' => app(ImageToDibSettings::class)->name,
            'format' => 'dib',
            'title' => app(ImageToDibSettings::class)->headerTitle,
            'entryTitle' => app(ImageToDibSettings::class)->entryTitle,
            'entrySummary' => app(ImageToDibSettings::class)->entrySummary,
            'enabled' => app(ImageToDibSettings::class)->enabled,
            'settings' => ImageToDibSettings::class,
            'views' => $views(app(ImageToDibSettings::class)->name),
            'icon' => 'icons.formats.dib',
            'admin' => [
                'title' => 'Image to DIB',
                'summary' => 'Convert any image to DIB format',
                'settings-page' => ManageImageToDibSettings::class
            ]
        ],
        [
            'name' => app(ImageToEpsSettings::class)->name,
            'format' => 'eps',
            'title' => app(ImageToEPSSettings::class)->headerTitle,
            'entryTitle' => app(ImageToEPSSettings::class)->entryTitle,
            'entrySummary' => app(ImageToEPSSettings::class)->entrySummary,
            'enabled' => app(ImageToEPSSettings::class)->enabled,
            'settings' => ImageToEPSSettings::class,
            'views' => $views(app(ImageToEPSSettings::class)->name),
            'icon' => 'icons.formats.eps',
            'admin' => [
                'title' => 'Image to EPS',
                'summary' => 'Convert any image to EPS format',
                'settings-page' => ManageImageToEpsSettings::class
            ]
        ],
        [
            'name' =>  app(ImageToGifSettings::class)->name,
            'format' => 'gif',
            'title' => app(ImageToGifSettings::class)->headerTitle,
            'entryTitle' => app(ImageToGifSettings::class)->entryTitle,
            'entrySummary' => app(ImageToGifSettings::class)->entrySummary,
            'enabled' => app(ImageToGifSettings::class)->enabled,
            'settings' => ImageToGifSettings::class,
            'views' => $views(app(ImageToGifSettings::class)->name),
            'icon' => 'icons.formats.gif',
            'admin' => [
                'title' => 'Image to GIF',
                'summary' => 'Convert any image to GIF format',
                'settings-page' => ManageImageToGifSettings::class
            ]
        ],
        [
            'name' => app(ImageToHdrSettings::class)->name,
            'format' => 'hdr',
            'title' => app(ImageToHdrSettings::class)->headerTitle,
            'entryTitle' => app(ImageToHdrSettings::class)->entryTitle,
            'entrySummary' => app(ImageToHdrSettings::class)->entrySummary,
            'enabled' => app(ImageToHdrSettings::class)->enabled,
            'settings' => ImageToHdrSettings::class,
            'views' => $views(app(ImageToHdrSettings::class)->name),
            'icon' => 'icons.formats.hdr',
            'admin' => [
                'title' => 'Image to HDR',
                'summary' => 'Convert any image to HDR format',
                'settings-page' => ManageImageToHdrSettings::class
            ]
        ],
        [
            'name' => app(ImageToHeicSettings::class)->name,
            'format' => 'heic',
            'title' => app(ImageToHeicSettings::class)->headerTitle,
            'entryTitle' => app(ImageToHeicSettings::class)->entryTitle,
            'entrySummary' => app(ImageToHeicSettings::class)->entrySummary,
            'enabled' => app(ImageToHeicSettings::class)->enabled,
            'settings' => ImageToHeicSettings::class,
            'views' => $views(app(ImageToHeicSettings::class)->name),
            'icon' => 'icons.formats.heic',
            'admin' => [
                'title' => 'Image to HEIC',
                'summary' => 'Convert any image to HEIC format',
                'settings-page' => ManageImageToHeicSettings::class
            ]
        ],
        [
            'name' => app(ImageToHeifSettings::class)->name,
            'format' => 'heif',
            'title' => app(ImageToHeifSettings::class)->headerTitle,
            'entryTitle' => app(ImageToHeifSettings::class)->entryTitle,
            'entrySummary' => app(ImageToHeifSettings::class)->entrySummary,
            'enabled' => app(ImageToHeifSettings::class)->enabled,
            'settings' => ImageToHeifSettings::class,
            'views' => $views(app(ImageToHeifSettings::class)->name),
            'icon' => 'icons.formats.heif',
            'admin' => [
                'title' => 'Image to HEIF',
                'summary' => 'Convert any image to HEIF format',
                'settings-page' => ManageImageToHeifSettings::class
            ]
        ],
        [
            'name' => app(ImageToIcoSettings::class)->name,
            'format' => 'ico',
            'title' => app(ImageToIcoSettings::class)->headerTitle,
            'entryTitle' => app(ImageToIcoSettings::class)->entryTitle,
            'entrySummary' => app(ImageToIcoSettings::class)->entrySummary,
            'enabled' => app(ImageToIcoSettings::class)->enabled,
            'settings' => ImageToIcoSettings::class,
            'views' => $views(app(ImageToIcoSettings::class)->name),
            'icon' => 'icons.formats.ico',
            'admin' => [
                'title' => 'Image to ICO',
                'summary' => 'Convert any image to ICO format',
                'settings-page' => ManageImageToIcoSettings::class
            ]
        ],
        [
            'name' => app(ImageToJp2Settings::class)->name,
            'format' => 'jp2',
            'title' => app(ImageToJp2Settings::class)->headerTitle,
            'entryTitle' => app(ImageToJp2Settings::class)->entryTitle,
            'entrySummary' => app(ImageToJp2Settings::class)->entrySummary,
            'enabled' => app(ImageToJp2Settings::class)->enabled,
            'settings' => ImageToJp2Settings::class,
            'views' => $views(app(ImageToJp2Settings::class)->name),
            'icon' => 'icons.formats.jp2',
            'admin' => [
                'title' => 'Image to JP2',
                'summary' => 'Convert any image to JP2 format',
                'settings-page' => ManageImageToJp2Settings::class
            ]
        ],
        [
            'name' => app(ImageToJpeSettings::class)->name,
            'format' => 'jpe',
            'title' => app(ImageToJpeSettings::class)->headerTitle,
            'entryTitle' => app(ImageToJpeSettings::class)->entryTitle,
            'entrySummary' => app(ImageToJpeSettings::class)->entrySummary,
            'enabled' => app(ImageToJpeSettings::class)->enabled,
            'settings' => ImageToJpeSettings::class,
            'views' => $views(app(ImageToJpeSettings::class)->name),
            'icon' => 'icons.formats.jpe',
            'admin' => [
                'title' => 'Image to JPE',
                'summary' => 'Convert any image to JPE format',
                'settings-page' => ManageImageToJpeSettings::class
            ]
        ],
        [
            'name' => app(ImageToJpegSettings::class)->name,
            'format' => 'jpeg',
            'title' => app(ImageToJpegSettings::class)->headerTitle,
            'entryTitle' => app(ImageToJpegSettings::class)->entryTitle,
            'entrySummary' => app(ImageToJpegSettings::class)->entrySummary,
            'enabled' => app(ImageToJpegSettings::class)->enabled,
            'settings' => ImageToJpegSettings::class,
            'views' => $views(app(ImageToJpegSettings::class)->name),
            'icon' => 'icons.formats.jpeg',
            'admin' => [
                'title' => 'Image to JPEG',
                'summary' => 'Convert any image to JPEG format',
                'settings-page' => ManageImageToJpegSettings::class
            ]
        ],
        [
            'name' => app(ImageToPdfSettings::class)->name,
            'format' => 'pdf',
            'title' => app(ImageToPdfSettings::class)->headerTitle,
            'entryTitle' => app(ImageToPdfSettings::class)->entryTitle,
            'entrySummary' => app(ImageToPdfSettings::class)->entrySummary,
            'enabled' => app(ImageToPdfSettings::class)->enabled,
            'settings' => ImageToPdfSettings::class,
            'views' => $views(app(ImageToPdfSettings::class)->name),
            'icon' => 'icons.formats.pdf',
            'admin' => [
                'title' => 'Image to PDF',
                'summary' => 'Convert any image to PDF format',
                'settings-page' => ManageImageToPdfSettings::class
            ]
        ],
        [
            'name' => app(ImageToPngSettings::class)->name,
            'format' => 'png',
            'title' => app(ImageToPngSettings::class)->headerTitle,
            'entryTitle' => app(ImageToPngSettings::class)->entryTitle,
            'entrySummary' => app(ImageToPngSettings::class)->entrySummary,
            'enabled' => app(ImageToPngSettings::class)->enabled,
            'settings' => ImageToPngSettings::class,
            'views' => $views(app(ImageToPngSettings::class)->name),
            'icon' => 'icons.formats.png',
            'admin' => [
                'title' => 'Image to PNG',
                'summary' => 'Convert any image to PNG format',
                'settings-page' => ManageImageToPngSettings::class
            ]
        ],
        [
            'name' => app(ImageToPsdSettings::class)->name,
            'format' => 'psd',
            'title' => app(ImageToPsdSettings::class)->headerTitle,
            'entryTitle' => app(ImageToPsdSettings::class)->entryTitle,
            'entrySummary' => app(ImageToPsdSettings::class)->entrySummary,
            'enabled' => app(ImageToPsdSettings::class)->enabled,
            'settings' => ImageToPsdSettings::class,
            'views' => $views(app(ImageToPsdSettings::class)->name),
            'icon' => 'icons.formats.psd',
            'admin' => [
                'title' => 'Image to PSD',
                'summary' => 'Convert any image to PSD format',
                'settings-page' => ManageImageToPsdSettings::class
            ]
        ],
        [
            'name' => app(ImageToRawSettings::class)->name,
            'format' => 'raw',
            'title' => app(ImageToRawSettings::class)->headerTitle,
            'entryTitle' => app(ImageToRawSettings::class)->entryTitle,
            'entrySummary' => app(ImageToRawSettings::class)->entrySummary,
            'enabled' => app(ImageToRawSettings::class)->enabled,
            'settings' => ImageToRawSettings::class,
            'views' => $views(app(ImageToRawSettings::class)->name),
            'icon' => 'icons.formats.raw',
            'admin' => [
                'title' => 'Image to RAW',
                'summary' => 'Convert any image to RAW format',
                'settings-page' => ManageImageToRawSettings::class
            ]
        ],
        [
            'name' => app(ImageToSvgSettings::class)->name,
            'format' => 'svg',
            'title' => app(ImageToSvgSettings::class)->headerTitle,
            'entryTitle' => app(ImageToSvgSettings::class)->entryTitle,
            'entrySummary' => app(ImageToSvgSettings::class)->entrySummary,
            'enabled' => app(ImageToSvgSettings::class)->enabled,
            'settings' => ImageToSvgSettings::class,
            'views' => $views(app(ImageToSvgSettings::class)->name),
            'icon' => 'icons.formats.svg',
            'admin' => [
                'title' => 'Image to SVG',
                'summary' => 'Convert any image to SVG format',
                'settings-page' => ManageImageToSvgSettings::class
            ]
        ],
        [
            'name' => app(ImageToTgaSettings::class)->name,
            'format' => 'tga',
            'title' => app(ImageToTgaSettings::class)->headerTitle,
            'entryTitle' => app(ImageToTgaSettings::class)->entryTitle,
            'entrySummary' => app(ImageToTgaSettings::class)->entrySummary,
            'enabled' => app(ImageToTgaSettings::class)->enabled,
            'settings' => ImageToTgaSettings::class,
            'views' => $views(app(ImageToTgaSettings::class)->name),
            'icon' => 'icons.formats.tga',
            'admin' => [
                'title' => 'Image to TGA',
                'summary' => 'Convert any image to TGA format',
                'settings-page' => ManageImageToTgaSettings::class
            ]
        ],
        [
            'name' => app(ImageToTiffSettings::class)->name,
            'format' => 'tiff',
            'title' => app(ImageToTiffSettings::class)->headerTitle,
            'entryTitle' => app(ImageToTiffSettings::class)->entryTitle,
            'entrySummary' => app(ImageToTiffSettings::class)->entrySummary,
            'enabled' => app(ImageToTiffSettings::class)->enabled,
            'settings' => ImageToTiffSettings::class,
            'views' => $views(app(ImageToTiffSettings::class)->name),
            'icon' => 'icons.formats.tiff',
            'admin' => [
                'title' => 'Image to TIFF',
                'summary' => 'Convert any image to TIFF format',
                'settings-page' => ManageImageToTiffSettings::class
            ]
        ],
        [
            'name' => app(ImageToWbmpSettings::class)->name,
            'format' => 'wbmp',
            'title' => app(ImageToWbmpSettings::class)->headerTitle,
            'entryTitle' => app(ImageToWbmpSettings::class)->entryTitle,
            'entrySummary' => app(ImageToWbmpSettings::class)->entrySummary,
            'enabled' => app(ImageToWbmpSettings::class)->enabled,
            'settings' => ImageToWbmpSettings::class,
            'views' => $views(app(ImageToWbmpSettings::class)->name),
            'icon' => 'icons.formats.wbmp',
            'admin' => [
                'title' => 'Image to WBMP',
                'summary' => 'Convert any image to WBMP format',
                'settings-page' => ManageImageToWbmpSettings::class
            ]
        ],
        [
            'name' => app(ImageToWebpSettings::class)->name,
            'format' => 'webp',
            'title' => app(ImageToWebpSettings::class)->headerTitle,
            'entryTitle' => app(ImageToWebpSettings::class)->entryTitle,
            'entrySummary' => app(ImageToWebpSettings::class)->entrySummary,
            'enabled' => app(ImageToWebpSettings::class)->enabled,
            'settings' => ImageToWebpSettings::class,
            'views' => $views(app(ImageToWebpSettings::class)->name),
            'icon' => 'icons.formats.webp',
            'admin' => [
                'title' => 'Image to WEBP',
                'summary' => 'Convert any image to WEBP format',
                'settings-page' => ManageImageToWebpSettings::class
            ]
        ],
    ];
}

/**
 * Get human readable file size
 *
 * @param string $path
 * @return string
 */
function size(string $path): string
{
    $size = @filesize($path);
    if (!$size) return '---';
    $byeSize = new ByteSize;
    return $byeSize->format($size);
}
