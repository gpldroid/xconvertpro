<?php

namespace App\Filament\Pages;

use App\Filament\Base\BaseSettingsPage;
use App\Settings\StyleSettings;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Wiebenieuwenhuis\FilamentCodeEditor\Components\CodeEditor;

class ManageStyleSettings extends BaseSettingsPage
{
    protected static ?string $title = 'Styles Settings';
    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';
    protected static ?string $navigationLabel = 'Styles Settings';
    protected static ?string $navigationGroup = 'Administration';
    protected static ?int $navigationSort = 5;

    protected static string $settings = StyleSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('General Styles')->schema([
                    ColorPicker::make('bgColor')
                        ->label('Background color'),
                    ColorPicker::make('textColor')
                        ->label('Text color'),
                ]),
                Section::make('Navbar Styles')->schema([
                    ColorPicker::make('navBgColor')
                        ->label('Background color'),
                    ColorPicker::make('navTextColor')
                        ->label('Text color')
                ]),
                Section::make('Uploader Styles')->schema([
                    ColorPicker::make('uploaderBgColor')
                        ->label('Uploader background color'),
                    ColorPicker::make('uploaderTextColor')
                        ->label('Uploader text color'),
                    ColorPicker::make('browseBtnBgColor')
                        ->label('Browse button background color'),
                    ColorPicker::make('browseBtnTextColor')
                        ->label('Browse button text color'),
                    ColorPicker::make('uploadBarTextColor')
                        ->label('Upload bar text color'),
                    ColorPicker::make('uploadBarSuccessBgColor')
                        ->label('Upload bar success bg color'),
                    ColorPicker::make('uploadBarErrorBgColor')
                        ->label('Upload bar error bg color'),
                    ColorPicker::make('convertBtnBgColor')
                        ->label('Convert button background color'),
                    ColorPicker::make('convertBtnTextColor')
                        ->label('Convert button text color'),
                ]),
                Section::make('Cards Styles')->schema([
                    ColorPicker::make('cardBgColor')
                        ->label('Background color'),
                    ColorPicker::make('cardTextColor')
                        ->label('Text color'),
                    ColorPicker::make('cardHoverBgColor')
                        ->label('Hover background color'),
                    ColorPicker::make('cardHoverTextColor')
                        ->label('Hover text color')
                ]),
                Section::make('Custom Styles')->schema([
                    CodeEditor::make('customCSS')
                        ->label('')
                        ->helperText('Need more customization? Paste the css rules you want to override in the input box above.'),
                ]),
            ]);
    }
}
