<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class PageResource extends Resource
{
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Custom Pages';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 3;

    protected static ?string $model = Page::class;

    public static array $toSanitize = [
        'title',
        'slug',
        'label',
        'metaDescription',
        'metaKeywords'
    ];

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Grid::make()->schema([
                        DatePicker::make('published_at')
                            ->label('Published Date')
                            ->default(now()),
                        Select::make('location')
                            ->required()
                            ->options([
                                'navbar' => 'Navbar',
                                'footer' => 'Footer',
                                'both' => 'Both',
                            ]),
                    ]),
                    TextInput::make('title')
                        ->reactive()
                        ->placeholder('The Title for the Page')
                        ->required()
                        ->maxLength(60)
                        ->helperText('Max characters is 60')
                        ->afterStateUpdated(
                            fn ($state, $set) => $set('slug', Str::slug($state))
                        ),
                    TextInput::make('slug')
                        ->placeholder('The permalink / slug for the page')
                        ->required()
                        ->maxLength(60)
                        ->helperText('Max characters is 60')
                        ->unique(Page::class, 'slug', ignoreRecord: true),
                    TextInput::make('label')
                        ->label('Label')
                        ->placeholder('My Page')
                        ->helperText('Link text that shows in navbar or footer')
                        ->required(),
                    Textarea::make('metaDescription')
                        ->label('Meta Description')
                        ->placeholder('The meta description for the page')
                        ->rows(3)
                        ->maxLength(155)
                        ->helperText('Max characters is 155')
                        ->required()
                        ->columnSpanFull(),
                    Textarea::make('metaKeywords')
                        ->label('Meta Keywords')
                        ->placeholder('The meta keywords for the page')
                        ->helperText('Keywords should be separated by commas')
                        ->rows(3),
                    Toggle::make('noIndex')
                        ->label('No Index')
                        ->helperText('Prevent search engines indexing'),
                    TinyEditor::make('content')
                        ->profile('custom')
                        ->fileAttachmentsDisk('public_storage')
                        ->required(),
                    Toggle::make('topAd')
                        ->label('Show top ad')
                        ->default(false),
                    Toggle::make('bottomAd')
                        ->label('Show bottom ad')
                        ->default(false),
                    Toggle::make('showShareButtons')
                        ->label('Show share buttons')
                        ->default(false),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug'),
                TextColumn::make('status')
                    ->badge()
                    ->getStateUsing(
                        fn ($record): string => $record->published_at?->isPast() ? 'Published' : 'Draft'
                    )
                    ->colors([
                        'success' => 'Published',
                    ]),
                TextColumn::make('location')
                    ->badge()
                    ->formatStateUsing(fn ($state) => ([
                        'both' => 'Both',
                        'navbar' => 'Navbar',
                        'footer' => 'Footer'
                    ])[$state]),
                TextColumn::make('published_at')
                    ->label('Published Date')
                    ->sortable()
                    ->date()
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make()
                    ->after(function ($record) {
                        // cache()->forget(cacheKey('navPages'));
                        // removePagePostFromCache($record);
                        cache()->flush();
                    }),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
