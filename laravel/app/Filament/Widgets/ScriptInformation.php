<?php

namespace App\Filament\Widgets;

use App\Dashboard;
use Filament\Widgets\Widget;

class ScriptInformation extends Widget
{
    protected static ?int   $sort = 4;
    protected static string $view = 'filament.widgets.script-information';

    public string  $name;
    public string  $url;
    public ?string $version;
    public string  $vendor;
    public string  $vendor_url;

    public function mount() {
        $this->name       = Dashboard::NAME;
        $this->version    = Dashboard::VERSION;
    }
}
