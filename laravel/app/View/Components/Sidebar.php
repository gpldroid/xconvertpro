<?php

namespace App\View\Components;

use App\Models\Post;
use App\Models\ViewsCounter;
use App\Settings\ConvertersSlugsSettings;
use App\Settings\SidebarSettings;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public bool $isSticky;
    public bool $showAd;
    public ?Collection $recentPosts;
    public ?Collection $popularConverters;

    public function __construct(
        public SidebarSettings $settings,
        ConvertersSlugsSettings $slugs
    ) {
        $this->isSticky    = $settings->isStickySidebar;
        $this->showAd      = $settings->showAd;
        $this->recentPosts = $settings->showRecentPosts
            ? cache()->rememberForever(cacheKey('recent.posts'), fn () => Post::select('title', 'slug')
                ->where('published_at', '<', now())
                ->latest()
                ->take(5)
                ->get()) : null;

        # database call to views counter cannot be cached because it updates often
        $popularConverters = ViewsCounter::orderBy('views', 'DESC')
            ->take(5)
            ->get();
        # $slugs settings id already cached
        $popularConverters->each(function ($converter) use ($slugs) {
            $converter['slug'] = $slugs
                ->originalValues
                ->flip()
                ->filter(
                    fn ($value) => $value == $converter->identifier
                )
                ->flip()
                ->first();
            $converter['title'] = collect(converters())->filter(
                fn ($c) => $c['admin']['title'] == $converter->title
            )->first()['title'];
        });
        $this->popularConverters = $popularConverters;
    }

    public function render()
    {
        return view('components.partials.sidebar');
    }
}
