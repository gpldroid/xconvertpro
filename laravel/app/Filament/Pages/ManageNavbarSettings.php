<?php

namespace App\Filament\Pages;

use App\Filament\Base\BaseSettingsPage;
use App\Settings\NavbarSettings;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;

class ManageNavbarSettings extends BaseSettingsPage
{
    protected static ?string $title = 'Navbar Settings';
    protected static ?string $navigationIcon = 'heroicon-o-bars-3';
    protected static ?string $navigationLabel = 'Navbar Settings';
    protected static ?string $navigationGroup = 'Administration';
    protected static ?int $navigationSort = 3;

    protected static string $settings = NavbarSettings::class;

    protected array $toSanitize = [
        'logoText',
        'logoHeight',
        'logoWidth',
        'homeLabel',
        'links.label',
        'links.url'
    ];

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(
                    heading: 'Sticky Navbar',
                )->schema([
                    Toggle::make('isStickyNavbar')
                        ->label('Enable/Disable')
                        ->helperText('Whither the navbar is sticky or not'),
                ]),
                Section::make('Application Logo')
                    ->description('Upload the application logo')
                    ->schema([
                        Grid::make()->schema([
                            Toggle::make('isLogoVisible')
                                ->label('Show logo')
                                ->columnSpanFull(),
                            FileUpload::make('logo')
                                ->acceptedFileTypes(['image/png', 'image/jpeg'])
                                ->disk('public_storage')
                                ->getUploadedFileNameForStorageUsing(
                                    fn ($file) => renameUploadedFile($file, 'logo')
                                )
                                ->columnSpanFull(),
                            TextInput::make('logoText')
                                ->label('Logo Text')
                                ->maxLength(30)
                                ->helperText('Insert the text that will appear if no logo is provided')
                                ->columnSpanFull(),
                            TextInput::make('logoHeight')
                                ->numeric()
                                ->placeholder(30)
                                ->columnSpan(1),
                            TextInput::make('logoWidth')
                                ->numeric()
                                ->placeholder(90)
                                ->columnSpan(1),
                        ]),
                    ]),
                Section::make('Home Link')->schema([
                    Toggle::make('isHomeLinkVisible')
                        ->label('Show home link')
                        ->helperText('Show/hide home link in navbar'),
                    TextInput::make('homeLabel')
                        ->label('Label')
                        ->placeholder('Home')
                        ->maxLength(30)
                        ->helperText('The text that shows in the navbar')
                        ->required(),
                ]),
                Section::make('External Links')
                    ->description('Add links to external pages')
                    ->schema([
                        Repeater::make('links')
                            ->label('')
                            ->addActionLabel('+ Add Link')
                            ->schema([
                                TextInput::make('label')
                                    ->label('Label')
                                    ->helperText('The text that shows in navbar')
                                    ->placeholder('Link')
                                    ->maxLength(30)
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
            ]);
    }
}
