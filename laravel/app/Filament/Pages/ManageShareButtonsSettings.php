<?php

namespace App\Filament\Pages;

use App\Filament\Base\BaseSettingsPage;
use App\Settings\ShareButtonsSettings;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;

class ManageShareButtonsSettings extends BaseSettingsPage
{
    protected static ?string $title = 'Share Buttons Settings';
    protected static ?string $navigationIcon = 'heroicon-o-share';
    protected static ?string $navigationLabel = 'Share Buttons';
    protected static ?string $navigationGroup = 'Administration';
    protected static ?int $navigationSort = 6;

    protected static string $settings = ShareButtonsSettings::class;

    protected array $toSanitize = [
        'facebook',
        'twitter',
        'whatsapp',
        'telegram',
        'linkedin',
        'reddit',
        'pinterest',
        'skype',
        'evernote',
        'vkontakte',
        'hackernews'
    ];

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Facebook')->schema([
                    Toggle::make('enableFacebook')
                        ->label('Show facebook'),
                    TextInput::make('facebook')
                        ->label('Title')
                        ->placeholder('Facebook')
                        ->maxLength(30)
                        ->required()
                        ->helperText('Adds the HTML title attribute to the facebook icon')
                ]),
                Section::make('Twitter')->schema([
                    Toggle::make('enableTwitter')
                        ->label('Show twitter'),
                    TextInput::make('twitter')
                        ->label('Title')
                        ->placeholder('Twitter')
                        ->maxLength(30)
                        ->required()
                        ->helperText('Adds the HTML title attribute to the twitter icon')
                ]),
                Section::make('WhatsApp')->schema([
                    Toggle::make('enableWhatsApp')
                        ->label('Show whatsapp'),
                    TextInput::make('whatsapp')
                        ->label('Title')
                        ->placeholder('WhatsApp')
                        ->maxLength(30)
                        ->required()
                        ->helperText('Adds the HTML title attribute to the whatsapp icon')
                ]),
                Section::make('Telegram')->schema([
                    Toggle::make('enableTelegram')
                        ->label('Show telegram'),
                    TextInput::make('telegram')
                        ->label('Title')
                        ->placeholder('Telegram')
                        ->maxLength(30)
                        ->required()
                        ->helperText('Adds the HTML title attribute to the telegram icon')
                ]),
                Section::make('LinkedIn')->schema([
                    Toggle::make('enableLinkedIn')
                        ->label('Show linkedin'),
                    TextInput::make('linkedin')
                        ->label('Title')
                        ->placeholder('LinkedIn')
                        ->maxLength(30)
                        ->required()
                        ->helperText('Adds the HTML title attribute to the linkedin icon')
                ]),
                Section::make('Reddit')->schema([
                    Toggle::make('enableReddit')
                        ->label('Show reddit'),
                    TextInput::make('reddit')
                        ->label('Title')
                        ->placeholder('Reddit')
                        ->maxLength(30)
                        ->required()
                        ->helperText('Adds the HTML title attribute to the reddit icon')
                ]),
                Section::make('Pinterest')->schema([
                    Toggle::make('enablePinterest')
                        ->label('Show pinterest'),
                    TextInput::make('pinterest')
                        ->label('Title')
                        ->placeholder('Pinterest')
                        ->maxLength(30)
                        ->required()
                        ->helperText('Adds the HTML title attribute to the pinterest icon')
                ]),
                Section::make('Skype')->schema([
                    Toggle::make('enableSkype')
                        ->label('Show skype'),
                    TextInput::make('skype')
                        ->label('Title')
                        ->placeholder('Skype')
                        ->maxLength(30)
                        ->required()
                        ->helperText('Adds the HTML title attribute to the skype icon')
                ]),
                Section::make('Evernote')->schema([
                    Toggle::make('enableEvernote')
                        ->label('Show evernote'),
                    TextInput::make('evernote')
                        ->label('Title')
                        ->placeholder('Evernote')
                        ->maxLength(30)
                        ->required()
                        ->helperText('Adds the HTML title attribute to the evernote icon')
                ]),
                Section::make('VKontakte')->schema([
                    Toggle::make('enableVKontakte')
                        ->label('Show vkontakte'),
                    TextInput::make('vkontakte')
                        ->label('Title')
                        ->placeholder('VKontakte')
                        ->maxLength(30)
                        ->required()
                        ->helperText('Adds the HTML title attribute to the vkontakte icon')
                ]),
                Section::make('HackerNews')->schema([
                    Toggle::make('enableHackerNews')
                        ->label('Show hackernews'),
                    TextInput::make('hackernews')
                        ->label('Title')
                        ->placeholder('HackerNews')
                        ->maxLength(30)
                        ->required()
                        ->helperText('Adds the HTML title attribute to the hackernews icon')
                ]),
            ]);
    }
}
