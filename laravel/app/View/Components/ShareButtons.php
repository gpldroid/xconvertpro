<?php

namespace App\View\Components;

use App\Settings\ShareButtonsSettings;
use Illuminate\View\Component;

class ShareButtons extends Component
{
    public function __construct(public ShareButtonsSettings $settings)
    {
    }

    public function render()
    {
        return view('components.share-buttons');
    }
}
