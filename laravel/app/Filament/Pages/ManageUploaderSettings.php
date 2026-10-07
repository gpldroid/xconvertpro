<?php

namespace App\Filament\Pages;

use App\Filament\Base\BaseSettingsPage;
use App\Settings\UploaderSettings;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;

class ManageUploaderSettings extends BaseSettingsPage
{
    protected static ?string $title = 'Uploader Settings';
    protected static ?string $navigationIcon = 'heroicon-o-cloud-arrow-up';
    protected static ?string $navigationLabel = 'Uploader Settings';
    protected static ?string $navigationGroup = 'Converters';
    protected static ?int $navigationSort = 3;

    protected static string $settings = UploaderSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Image Name Prefix')
                    ->schema([
                        TextInput::make('prefix')
                            ->label('Prefix')
                            ->placeholder('example_com')
                            ->helperText('Add a prefix to the converted image name. e.g. example_com_image.png')
                    ]),
                Section::make('Max Upload Size')
                    ->schema([
                        TextInput::make('maxFileSize')
                            ->label('Size')
                            ->numeric()
                            ->step(1)
                            ->suffix('MB')
                            ->minValue(1)
                            ->placeholder(10)
                            ->maxValue(maxFileSize())
                            ->helperText('The Max upload size allowed by the server is ' . maxFileSize() . ' MB.')
                    ]),
                Section::make('Delete Old Images')
                    ->schema([
                        TextInput::make('deleteTime')
                            ->label('Duration')
                            ->numeric()
                            ->suffix('hour(s)')
                            ->minValue(1)
                            ->maxValue(24)
                            ->step(1)
                            ->placeholder(1)
                            ->helperText('The period after which old images will be deleted. The upper limit is 24 hours.')
                    ]),
                Section::make('Max Uploaded Files')
                    ->schema([
                        TextInput::make('maxFiles')
                            ->label('Number')
                            ->numeric()
                            ->suffix('file(s)')
                            ->minValue(1)
                            ->maxValue(maxFiles())
                            ->step(1)
                            ->placeholder(10)
                            ->helperText('The Max upload files allowed by the server is ' . maxFiles() .' file(s).')
                    ]),
            ]);
    }
}
