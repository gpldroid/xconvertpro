<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Base\BaseListRecord;
use App\Filament\Resources\PostResource;
use Filament\Actions;

class ListPosts extends BaseListRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
