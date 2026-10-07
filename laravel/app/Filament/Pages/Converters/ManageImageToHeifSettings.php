<?php

namespace App\Filament\Pages\Converters;

use App\Filament\Base\BaseSettingsPage;
use App\Settings\Converters\ImageToHeifSettings;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class ManageImageToHeifSettings extends BaseSettingsPage
{
    protected static ?string $title = 'Image To HEIF Settings';
    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $navigationLabel = 'Image To HEIF Settings';
    protected static ?string $slug = 'image-to-heif-settings';

    protected static string $settings = ImageToHeifSettings::class;

    protected array $toSanitize = [
        'title',
        'metaDescription',
        'metaKeywords',
        'headerTitle',
        'headerSubtitle',
        'entryTitle',
        'entrySummary',
        'description'
    ];

    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Enable Converter')
                ->schema([
                    Toggle::make('enabled')
                        ->label('Enabled'),
                ])->columnSpanFull(),
            Section::make('SEO Tags')
                ->schema([
                    TextInput::make('title')
                        ->label('Title')
                        ->helperText('Insert the page title')
                        ->required(),
                    Textarea::make('metaDescription')
                        ->label('Meta Description')
                        ->helperText('Insert the page meta description. Max characters is 155')
                        ->rows(3)
                        ->maxLength(155)
                        ->required(),
                    Textarea::make('metaKeywords')
                        ->label('Meta Keywords')
                        ->helperText('Insert the meta keywords for the converter separated by a comma (,)')
                        ->rows(1)
                ])->columnSpanFull(),
            Section::make('Header')
                ->schema([
                    TextInput::make('headerTitle')
                        ->label('Title')
                        ->helperText('Insert the header title for the converter page')
                        ->required(),
                    Textarea::make('headerSubtitle')
                        ->label('Subtitle')
                        ->helperText('Insert the header subtitle for the converter page. Max characters is 255')
                        ->rows(3)
                        ->maxLength(255)
                        ->required()
                ])->columnSpanFull(),
            Section::make('Entry')
                ->schema([
                    TextInput::make('entryTitle')
                        ->label('Entry title')
                        ->helperText('The title of the converter that is shown in the home page in the home page')
                        ->required(),
                    Textarea::make('entrySummary')
                        ->label('Entry summary')
                        ->helperText('The brief summary of the converter that will be dispalyed in the home page. Max characters is 255')
                        ->rows(3)
                        ->maxLength(255)
                        ->required()
                ])->columnSpanFull(),
            Section::make('Show Ads')
                ->schema([
                    Toggle::make('showTopAd')
                        ->label('Show top ad'),
                    Toggle::make('showMiddleAd')
                        ->label('Show middle ad'),
                    Toggle::make('showBottomAd')
                        ->label('Show bottom ad')
                ])->columnSpanFull(),
            Section::make('Share Buttons')
                ->schema([
                    Toggle::make('showShareButtons')
                        ->label('Show share buttons'),
                ])->columnSpanFull(),
            Section::make('About')
                ->schema([
                    TinyEditor::make('description')
                        ->profile('custom')
                        ->fileAttachmentsDisk('public_storage')
                        ->label('')
                        ->helperText('A description of the converter that will be displayed in the converter page About section')
                        ->required(),
                ])->columnSpanFull(),
        ]);
    }
}
