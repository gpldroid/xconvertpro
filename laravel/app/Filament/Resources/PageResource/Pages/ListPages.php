<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Base\BaseListRecord;
use App\Filament\Resources\PageResource;
use Filament\Actions;

class ListPages extends BaseListRecord
{
    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
