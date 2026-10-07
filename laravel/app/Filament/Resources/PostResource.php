<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use Illuminate\Support\Str;
use App\Models\Post;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Blog Posts';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 4;

    public static $toSanitize = [
        'title',
        'slug',
        'metaDescription',
        'metaKeywords',
        'snippet',
    ];

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Grid::make()->schema([
                        TextInput::make('title')
                            ->reactive()
                            ->placeholder('The title for the post')
                            ->afterStateUpdated(
                                fn ($state, $set) => $set('slug', Str::slug($state))
                            )
                            ->required()
                            ->maxLength(60)
                            ->helperText('Max characters is 60'),
                        TextInput::make('slug')
                            ->placeholder('The permalink / slug for the post')
                            ->required()
                            ->maxLength(60)
                            ->helperText('Max characters is 60')
                            ->unique(Post::class, 'slug', ignoreRecord: true),
                        DatePicker::make('published_at')
                            ->label('Published Date')
                            ->default(now())
                    ]),
                    Textarea::make('metaDescription')
                        ->rows(3)
                        ->placeholder('The meta description for the post')
                        ->maxLength(155)
                        ->helperText('Max characters is 155')
                        ->required(),
                    Textarea::make('metaKeywords')
                        ->label('Meta Keywords')
                        ->placeholder('The meta keywords for the post')
                        ->helperText('Keywords should be separated by commas')
                        ->rows(3),
                    Textarea::make('snippet')
                        ->rows(3)
                        ->placeholder('Uses as post snippet in the blog page')
                        ->required(),
                    FileUpload::make('thumbnail')
                        ->image()
                        ->maxSize(2048)
                        ->directory('images')
                        ->helperText('1230x700 Recommended Size. Max image size is 2 MB.'),
                    TinyEditor::make('content')
                        ->profile('custom')
                        ->fileAttachmentsDisk('public_storage')
                        ->required(),
                    Toggle::make('topAd')
                        ->label('Show top ad')
                        ->default(true),
                    Toggle::make('bottomAd')
                        ->label('Show bottom ad')
                        ->default(true),
                    Toggle::make('showShareButtons')
                        ->label('Show share buttons')
                        ->default(true),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('slug'),
                TextColumn::make('status')
                    ->badge()
                    ->getStateUsing(
                        fn ($record): string => $record->published_at?->isPast() ? 'Published' : 'Draft'
                    )
                    ->colors([
                        'success' => 'Published',
                    ]),
                TextColumn::make('published_at')
                    ->label('Published Date')
                    ->sortable()
                    ->date(),
                TextColumn::make('')
                    ->label('Views')
                    ->getStateUsing(
                        fn ($record) => views($record)->count()
                    )
            ])->actions([
                EditAction::make(),
                DeleteAction::make()->after(
                    function ($record) {
                        // removePagePostFromCache($record);
                        // cache()->forget(cacheKey('recent.posts'));
                        // removePaginationCache();
                        cache()->flush();
                    }
                ),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
