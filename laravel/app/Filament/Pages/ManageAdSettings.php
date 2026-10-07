<?php

namespace App\Filament\Pages;

use App\Filament\Base\BaseSettingsPage;
use App\Settings\AdSettings;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;

class ManageAdSettings extends BaseSettingsPage
{
    protected static ?string $title = 'Ad Settings';
    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';
    protected static ?string $navigationLabel = 'Ad Settings';
    protected static ?string $navigationGroup = 'Administration';
    protected static ?int $navigationSort = 2;

    protected static string $settings = AdSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Top Ad Spot')->schema([
                    Textarea::make('topAdCode')
                        ->label('Code')
                        ->rows(5)
                        ->helperText('Insert the top ad code in this box')
                ]),
                Section::make('Middle Ad Spot')->schema([
                    Textarea::make('middleAdCode')
                        ->label('Code')
                        ->rows(5)
                        ->helperText('Insert the middle ad code in this box')
                ]),
                Section::make('Bottom Ad Spot')->schema([
                    Textarea::make('bottomAdCode')
                        ->label('Code')
                        ->rows(5)
                        ->helperText('Insert the bottom ad code in this box')
                ]),
                Section::make('Sidebar Ad Spot')->schema([
                    Textarea::make('sidebarAdCode')
                        ->label('Code')
                        ->rows(5)
                        ->helperText('Insert the sidebar ad code in this box')
                ]),
            ]);
    }
}
