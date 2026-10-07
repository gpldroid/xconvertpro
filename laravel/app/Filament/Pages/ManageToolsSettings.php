<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ManageToolsSettings extends Page
{
    protected static ?string $title = 'Admin Tools';
    protected static ?string $navigationIcon = 'heroicon-o-scissors';
    protected static ?string $navigationLabel = 'Admin Tools';
    protected static ?string $navigationGroup = 'Administration';
    protected static ?int $navigationSort = 7;

    protected static string $view = 'filament.pages.tools';

    public function generateSitemap(): void
    {
        generateSiteMap();
    }

    public function clearCache(): void
    {
        clearCache();
    }

    public function generateViews(): void
    {
        generateViews();
    }
}
