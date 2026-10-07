<?php

namespace App\Filament\Pages;

use App\Filament\Base\BaseSettingsPage;
use App\Settings\FooterSettings;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;

class ManageFooterSettings extends BaseSettingsPage
{
    protected static ?string $title = 'Footer Settings';
    protected static ?string $navigationIcon = 'heroicon-o-table-cells';
    protected static ?string $navigationLabel = 'Footer Settings';
    protected static ?string $navigationGroup = 'Administration';
    protected static ?int $navigationSort = 8;

    protected static string $settings = FooterSettings::class;

    protected array $toSanitize = [
        'attribution',
    ];

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('External Links')
                    ->description('Add links to external pages')
                    ->schema([
                        Repeater::make('links')
                            ->label('')
                            ->addActionLabel('+ Add Link')
                            ->schema([
                                TextInput::make('label')
                                    ->label('Label')
                                    ->placeholder('Link')
                                    ->helperText('The text that shows in footer')
                                    ->maxLength(60)
                                    ->required(),
                                TextInput::make('url')
                                    ->url()
                                    ->label('Url')
                                    ->placeholder('https://example.com/page')
                                    ->required(),
                                Toggle::make('isVisible')
                                    ->label('Show')
                                    ->default(true),
                                Toggle::make('newTab')
                                    ->label('Open in New Tab')
                                    ->default(true)
                            ])
                            ->collapsible()
                            ->reorderable(false)
                    ]),
                Section::make('Footer Attribution')->schema([
                    TextInput::make('attribution')
                        ->label('')
                        ->maxLength(150)
                        ->helperText('Change the Footer Attribution of the app')
                        ->placeholder('Copyright © 2023 - All right reserved')
                        ->required(),
                ]),
                Section::make('Converted Counter')->schema([
                    TextInput::make('convertedCount')
                        ->label('Initial value')
                        ->numeric()
                        ->required(),
                    Toggle::make('counterEnabled')
                        ->label('Enable/Disable')
                ])
            ]);
    }
}
