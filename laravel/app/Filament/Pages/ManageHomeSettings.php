<?php

namespace App\Filament\Pages;

use Filament\Forms\Form;
use App\Settings\HomePageSettings;
use App\Filament\Base\BaseSettingsPage;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class ManageHomeSettings extends BaseSettingsPage
{
    protected static ?string $title = 'Home Page Settings';
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationLabel = 'Home Page';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 1;

    protected static string $settings = HomePageSettings::class;

    protected array $toSanitize = [
        'title',
        'metaDescription',
        'metaKeywords',
        'headerTitle',
        'headerSubtitle'
    ];

    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make('SEO Tags')
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->maxLength(60)
                    ->placeholder('The title for the home page')
                    ->required(),
                Textarea::make('metaDescription')
                    ->label('Meta Description')
                    ->placeholder('The meta description for the home page')
                    ->helperText('Max characters is 155')
                    ->rows(3)
                    ->maxLength(155)
                    ->required(),
                Textarea::make('metaKeywords')
                    ->label('Meta Keywords')
                    ->placeholder('The meta keywords for the home page')
                    ->helperText('Keywords should be separated by commas')
                    ->rows(3)
            ]),
            Section::make('Header')
            ->schema([
                TextInput::make('headerTitle')
                    ->label('Title')
                    ->placeholder('The title for the home page header section')
                    ->required(),
                Textarea::make('headerSubtitle')
                    ->label('Header Subtitle')
                    ->placeholder('The subtilte for home page header section')
                    ->rows(3)
                    ->required()
            ]),
            Section::make('Show Ads')
            ->schema([
                Toggle::make('topAd')
                    ->label('Show top ad'),
                Toggle::make('middleAd')
                    ->label('Show middle ad'),
                Toggle::make('bottomAd')
                    ->label('Show bottom ad')
            ]),
            Section::make('Share Buttons')
            ->schema([
                Toggle::make('showShareButtons')
                    ->label('Show share buttons'),
            ]),
            Section::make('About Section')->schema(
                [
                    TinyEditor::make('content')
                        ->profile('custom')
                        ->columnSpan('full')
                        ->helperText('Add some content in the home page about section')
                ]
            )
        ]);
    }
}
