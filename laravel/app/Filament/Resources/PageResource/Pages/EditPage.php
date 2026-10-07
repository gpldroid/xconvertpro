<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Base\BaseEditRecord;
use App\Filament\Resources\PageResource;
use Filament\Actions;

class EditPage extends BaseEditRecord
{
    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
