<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class PostViews extends TableWidget 
{
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 2;

    protected function getTableQuery(): Builder
    {
        return Post::query()->orderByViews();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('title')
                ->label('Posts'),
            TextColumn::make('')
                ->label('Views')
                ->getStateUsing(
                    fn ($record) => views($record)->count()
                )
        ];
    }
}
