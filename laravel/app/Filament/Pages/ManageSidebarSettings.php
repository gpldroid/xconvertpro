<?php

namespace App\Filament\Pages;

use App\Filament\Base\BaseSettingsPage;
use App\Settings\SidebarSettings;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;

class ManageSidebarSettings extends BaseSettingsPage
{
    protected static ?string $title = 'Sidebar Settings';
    protected static ?string $navigationIcon = 'heroicon-o-document';
    protected static ?string $navigationLabel = 'Sidebar Settings';
    protected static ?string $navigationGroup = 'Administration';
    protected static ?int $navigationSort = 4;

    protected static string $settings = SidebarSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(
                    heading: 'Show Sidebar',
                )->schema([
                    Toggle::make('enableSidebar')
                        ->label('Enable/Disable')
                        ->helperText('Whither to show or hide the sidebar'),
                ]),
                Section::make(
                    heading: 'Recent Posts',
                )->schema([
                    Toggle::make('showRecentPosts')
                        ->label('Show recent posts')
                        ->helperText('Whither the display or hide the recent posts in the sidebar'),
                ]),
                Section::make(
                    heading: 'Ad Spot',
                )->schema([
                    Toggle::make('showAd')
                        ->label('Show sidebar ad')
                        ->helperText('Enable/disable sidebar ad spot'),
                ]),
                Section::make(
                    heading: 'Sticky Sidebar',
                )->schema([
                    Toggle::make('isStickySidebar')
                        ->label('Enable/Disable')
                        ->helperText('Whither the sidebar is sticky or not'),
                ])
            ]);
    }
}
