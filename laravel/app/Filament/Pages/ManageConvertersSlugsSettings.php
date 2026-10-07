<?php

namespace App\Filament\Pages;

use App\Filament\Base\BaseSettingsPage;
use App\Settings\ConvertersSlugsSettings;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;

class ManageConvertersSlugsSettings extends BaseSettingsPage
{
    protected static ?string $title = 'Converters Slugs Settings';
    protected static ?string $navigationIcon = 'heroicon-o-link';
    protected static ?string $navigationLabel = 'Slugs Settings';
    protected static ?string $navigationGroup = 'Converters';
    protected static ?int $navigationSort = 2;

    protected static string $settings = ConvertersSlugsSettings::class;

    protected array $toSanitize = [
        'imageToAiSlug',
        'imageToApngSlug',
        'imageToAvifSlug',
        'imageToBmpSlug',
        'imageToDdsSlug',
        'imageToDibSlug',
        'imageToEpsSlug',
        'imageToGifSlug',
        'imageToHdrSlug',
        'imageToHeicSlug',
        'imageToHeifSlug',
        'imageToIcoSlug',
        'imageToJp2Slug',
        'imageToJpegSlug',
        'imageToJpeSlug',
        'imageToPdfSlug',
        'imageToPngSlug',
        'imageToPsdSlug',
        'imageToRawSlug',
        'imageToSvgSlug',
        'imageToTgaSlug',
        'imageToTiffSlug',
        'imageToWbmpSlug',
        'imageToWebpSlug',
    ];

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('imageToAiSlug')
                            ->label('Image to AI')
                            ->required(),
                        TextInput::make('imageToApngSlug')
                            ->label('Image to APNG')
                            ->required(),
                        TextInput::make('imageToAvifSlug')
                            ->label('Image to AVIF')
                            ->required(),
                        TextInput::make('imageToBmpSlug')
                            ->label('Image to BMP')
                            ->required(),
                        TextInput::make('imageToDdsSlug')
                            ->label('Image to DDS')
                            ->required(),
                        TextInput::make('imageToDibSlug')
                            ->label('Image to DIB')
                            ->required(),
                        TextInput::make('imageToEpsSlug')
                            ->label('Image to EPS')
                            ->required(),
                        TextInput::make('imageToGifSlug')
                            ->label('Image to GIF')
                            ->required(),
                        TextInput::make('imageToHdrSlug')
                            ->label('Image to HDR')
                            ->required(),
                        TextInput::make('imageToHeicSlug')
                            ->label('Image to HEIC')
                            ->required(),
                        TextInput::make('imageToHeifSlug')
                            ->label('Image to HEIF')
                            ->required(),
                        TextInput::make('imageToIcoSlug')
                            ->label('Image to ICO')
                            ->required(),
                        TextInput::make('imageToJp2Slug')
                            ->label('Image to JP2')
                            ->required(),
                        TextInput::make('imageToJpegSlug')
                            ->label('Image to JPEG')
                            ->required(),
                        TextInput::make('imageToJpeSlug')
                            ->label('Image to JPE')
                            ->required(),
                        TextInput::make('imageToPdfSlug')
                            ->label('Image to PDF')
                            ->required(),
                        TextInput::make('imageToPngSlug')
                            ->label('Image to PNG')
                            ->required(),
                        TextInput::make('imageToPsdSlug')
                            ->label('Image to PSD')
                            ->required(),
                        TextInput::make('imageToRawSlug')
                            ->label('Image to RAW')
                            ->required(),
                        TextInput::make('imageToSvgSlug')
                            ->label('Image to SVG')
                            ->required(),
                        TextInput::make('imageToTgaSlug')
                            ->label('Image to TGA')
                            ->required(),
                        TextInput::make('imageToTiffSlug')
                            ->label('Image to TIFF')
                            ->required(),
                        TextInput::make('imageToWbmpSlug')
                            ->label('Image to WBMP')
                            ->required(),
                        TextInput::make('imageToWebpSlug')
                            ->label('Image to WEBP')
                            ->required(),
                    ])->columns(3)
            ]);
    }
}
