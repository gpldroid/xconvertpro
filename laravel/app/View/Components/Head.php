<?php

namespace App\View\Components;

use App\Settings\StyleSettings;
use Illuminate\View\Component;

class Head extends Component
{
    public function __construct(
        public StyleSettings $styleSettings,
        public bool $noIndex
    ) {
    }

    public function render()
    {
        return view('components.partials.head');
    }
}
