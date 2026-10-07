<?php

namespace App\Filament\Base;

use App\Dashboard;
use Illuminate\Support\Str;
use Filament\Pages\SettingsPage;
use Stevebauman\Purify\Facades\Purify;

class BaseSettingsPage extends SettingsPage
{
    protected array $toSanitize = [];

    # override the SettingsPage method
    # $data is the data from the page's form
    public function mutateFormDataBeforeSave(array $data): array
    {
        foreach ($this->toSanitize as $field) {
            if (!Str::contains($field, '.')) {
                $data[$field] = Purify::clean($data[$field]);
                continue;
            }

            $exp = explode('.', $field);

            if (count($exp) == 2) {
                for ($i = 0; $i < count($data[$exp[0]]); $i++) {
                    $data[$exp[0]][$i][$exp[1]] = Purify::clean($data[$exp[0]][$i][$exp[1]]);
                }
            }
        }

        return $data;
    }

    public function save(): void
    {
        if( ! Dashboard::DEMO_MODE ) {
            parent::save();
        } else 
            notify('warning', 'This feature is disabled in Demo Mode');
    }
}
