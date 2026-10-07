<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ManageConvertersSettings extends Page
{
    protected static ?string $navigationLabel = 'Converters Settings';
    protected static ?string $navigationGroup = 'Converters';
    protected static ?string $navigationIcon  = 'heroicon-o-adjustments-vertical';
    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.manage-converters-settings';

    public array $converters;

    public function mount() {
        $this->converters = converters();
    }
}
