<?php

namespace App\Filament\Pages;

use App\Dashboard;
use App\Filament\Base\BaseSettingsPage;
use App\Settings\BlogPageSettings;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;

class ManageBlogPageSettings extends BaseSettingsPage
{
    protected static ?string $title = 'Blog Page Settings';
    protected static ?string $navigationIcon = 'heroicon-s-newspaper';
    protected static ?string $navigationLabel = 'Blog Page';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 3;

    protected static string $settings = BlogPageSettings::class;

    protected array $toSanitize = [
        'title',
        'metaDescription',
        'metaKeywords',
        'label',
        'headerTitle',
        'headerSubtitle'
    ];

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Toggle::make('show')
                        ->label('Enable blog')
                ]),
                Section::make('Meta Tags')->schema([
                    TextInput::make('title')
                        ->label('Title')
                        ->placeholder('The title for the blog page')
                        ->maxLength(60)
                        ->required(),
                    Textarea::make('metaDescription')
                        ->label('Meta Description')
                        ->placeholder('The meta description for the blog page')
                        ->helperText('Max characters is 155')
                        ->rows(3)
                        ->maxLength(155)
                        ->required(),
                    Textarea::make('metaKeywords')
                        ->label('Meta Keywords')
                        ->placeholder('The meta keywords for the blog page')
                        ->helperText('Keywords should be separated by commas')
                        ->rows(3),
                    Toggle::make('noIndex')
                        ->label('No Index')
                        ->helperText('Prevent search engines indexing')
                        ->inline(false),
                ]),
                Section::make(
                    heading: 'Blog link',
                )->schema([
                    Select::make('location')
                        ->options([
                            'none'   => 'None',
                            'navbar' => 'Navbar',
                            'footer' => 'Footer',
                            'both'   => 'Both'
                        ])
                        ->required(),
                    TextInput::make('label')
                        ->label('Label')
                        ->placeholder('Blog')
                        ->helperText('Link text that shows in navbar or footer')
                        ->required(),
                ]),
                Section::make('Blog Header')->schema([
                    TextInput::make('headerTitle')
                        ->label('Header Title')
                        ->placeholder('The title for the blog header section')
                        ->required(),
                    Textarea::make('headerSubtitle')
                        ->label('Header Subtitle')
                        ->placeholder('The subtitle for the blog header section')
                        ->rows(3)
                        ->required()
                ]),
                Section::make(
                    heading: 'Posts Per page'
                )->schema([
                    TextInput::make('postsPerPage')
                        ->label('')
                        ->numeric()
                        ->default(10)
                        ->minValue(5)
                        ->maxValue(25)
                        ->columnSpan(1)
                ])->columns(2),
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

    public function save(): void
    {
        if (!Dashboard::DEMO_MODE) {
            parent::save();
            removePaginationCache();
        } else
            notify('warning', 'This feature is disabled in Demo Mode');
    }
}
