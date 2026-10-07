<?php

namespace App\Filament\Widgets;

use App\Models\ViewsCounter;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class ConvertersViews extends TableWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?int   $sort = 2;

    protected function getTableQuery(): Builder
    {
        return ViewsCounter::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('title')
                ->label('Converters'),
            TextColumn::make('views')
                ->label('Views')
        ];
    }
}
