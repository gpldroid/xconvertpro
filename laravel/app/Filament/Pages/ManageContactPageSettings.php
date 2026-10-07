<?php

namespace App\Filament\Pages;

use App\Filament\Base\BaseSettingsPage;
use App\Settings\ContactPageSettings;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class ManageContactPageSettings extends BaseSettingsPage
{
    protected static ?string $title = 'Contact Page Settings';
    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationLabel = 'Contact Page';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 2;

    protected static string $settings = ContactPageSettings::class;

    protected array $toSanitize = [
        'title',
        'metaDescription',
        'metaKeywords',
        'label',
        'content',
        'email',
        'facebook',
        'twitter',
        'instagram',
    ];

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Toggle::make('show')
                        ->label('Published')
                ]),
                Section::make('Meta Tags')->schema([
                    TextInput::make('title')
                        ->label('Title')
                        ->placeholder('The title for the contact us page')
                        ->required(),
                    Textarea::make('metaDescription')
                        ->label('Meta Description')
                        ->placeholder('The meta description for contact us page')
                        ->helperText('Max characters is 155')
                        ->rows(3)
                        ->maxLength(155)
                        ->required(),
                    Textarea::make('metaKeywords')
                        ->label('Meta Keywords')
                        ->placeholder('The meta keywords for the contact us page')
                        ->helperText('Keywords should be separated by commas')
                        ->rows(3),
                    Toggle::make('noIndex')
                        ->label('No Index')
                        ->helperText('Prevent search engines indexing')
                        ->inline(false),
                ]),
                Section::make(
                    heading: 'Contact Link'
                )->schema([
                    Select::make('location')
                        ->options([
                            'none'   => 'None',
                            'navbar' => 'Navbar',
                            'footer' => 'Footer',
                            'both'   => 'Both'
                        ])->required(),
                    TextInput::make('label')
                        ->label('Label')
                        ->placeholder('Contact Us')
                        ->helperText('Link text that shows in navbar or footer')
                        ->required(),
                ]),
                Section::make(
                    heading: 'Content'
                )->schema([
                    TinyEditor::make('content')
                        ->profile('custom')
                        ->fileAttachmentsDisk('public_storage')
                        ->label('Content')
                        ->helperText('A brief description for the contact page')
                        ->required(),
                ]),
                Section::make(
                    heading: 'Email Address'
                )->schema([
                    TextInput::make('email')
                        ->label('')
                        ->placeholder('westiti@mail.com')
                        ->helperText('Your contact Email address')
                        ->required(),
                ]),
                Section::make(
                    heading: 'Facebook Address'
                )->schema([
                    TextInput::make('facebook')
                        ->label('')
                        ->placeholder('https://www.facebook.com/username')
                        ->helperText('Your Facebook account URL')
                ]),
                Section::make(
                    heading: 'Twitter Address'
                )->schema([
                    TextInput::make('twitter')
                        ->label('')
                        ->placeholder('https://twitter.com/username')
                        ->helperText('Your Twitter account URL')
                ]),
                Section::make(
                    heading: 'Instagram Address'
                )->schema([
                    TextInput::make('instagram')
                        ->label('')
                        ->placeholder('https://instagram.com/username')
                        ->helperText('Your Instagram account URL')
                ]),
                Section::make(
                    heading: 'Whatsapp Number'
                )->schema([
                    TextInput::make('whatsapp')
                        ->label('')
                        ->placeholder('+123456789')
                        ->helperText('Your Whatsapp contact number')
                ]),
                Section::make(
                    heading: 'Telegram Number'
                )->schema([
                    TextInput::make('telegram')
                        ->label('')
                        ->placeholder('+123456789')
                        ->helperText('Your Telegram contact number')
                ]),
                Section::make(
                    'Show Ads'
                )->schema([
                    Toggle::make('topAd')
                        ->label('Show top ad')
                        ->default(false),
                    Toggle::make('bottomAd')
                        ->label('Show bottom ad')
                        ->default(false)
                ]),
                Section::make(
                    'Share Buttons'
                )->schema([
                    Toggle::make('showShareButtons')
                        ->label('Show share buttons')
                        ->default(false),
                ]),
            ]);
    }
}
