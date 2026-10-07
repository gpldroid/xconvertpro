<?php

namespace App\View\Components;

use App\Models\Page;
use App\Settings\NavbarSettings;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Navbar extends Component
{
    public ?Collection $navPages;

    public function __construct(public NavbarSettings $settings)
    {
        $this->navPages = cache()->rememberForever(
            cacheKey('navPages'),
            fn () => Page::query()
                ->select(['title', 'slug', 'label', 'location', 'published_at'])
                ->get()
        );
    }

    public function render()
    {
        return view('components.partials.navbar');
    }
}
