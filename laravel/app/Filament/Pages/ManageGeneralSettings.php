<?php

namespace App\Filament\Pages;

use Filament\Forms\Form;
use App\Settings\GeneralSettings;
use App\Filament\Base\BaseSettingsPage;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class ManageGeneralSettings extends BaseSettingsPage
{
    protected static ?string $title = 'General Settings';
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = 'General Settings';
    protected static ?string $navigationGroup = 'Administration';
    protected static ?int $navigationSort = 1;

    protected static string $settings = GeneralSettings::class;

    protected array $toSanitize = [
        'analyticsId',
    ];

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Debug Mode')->schema([
                    Toggle::make('debugEnabled')
                        ->label('Enable debugging')
                        ->helperText('Enable/Disable debug mode to help debug errors')
                ]),
                Section::make('Application Favicon')->schema([
                    FileUpload::make('favicon')
                        ->acceptedFileTypes(['image/vnd.microsoft.icon'])
                        ->disk('public_storage')
                        ->getUploadedFileNameForStorageUsing(
                            fn ($file) => renameUploadedFile($file, 'favicon')
                        ),
                ]),
                Section::make('Google Analytics ID')->schema([
                    TextInput::make('analyticsId')
                        ->label('ID')
                        ->placeholder('UA-10876-1')
                        ->helperText('Insert your Google Analytics ID')
                ]),
                Section::make('Custom Head Tags')->schema([
                    Textarea::make('headerTags')
                        ->label('Tags')
                        ->helperText('Used to insert additional code in the <head> tag')
                ]),
            ]);
    }
}
