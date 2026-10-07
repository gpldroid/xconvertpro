<?php

namespace App\Filament\Base;

use App\Dashboard;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\Model;

class BaseListRecord extends ListRecords
{

    protected function configureDeleteBulkAction(DeleteBulkAction $action): void
    {
        $action
            ->authorize(static::getResource()::canDeleteAny() && !Dashboard::DEMO_MODE);
    }

    protected function configureDeleteAction(DeleteAction $action): void
    {
        $action
            ->authorize(fn (Model $record): bool => static::getResource()::canDelete($record) && !Dashboard::DEMO_MODE);
    }
}
