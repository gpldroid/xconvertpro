<nav @class([
    'top-nav mb-14 bg-nav-bg-color text-nav-text-color not-prose',
    'sticky self-start w-full top-0 z-10' => $settings->isStickyNavbar,
])>
    <div class="container">
        <div class="hidden gap-2 px-0 navbar md:flex">
            @if ($settings->isLogoVisible)
                <div class="flex-none logo-img">
                    <a href="{{ localizedRoute('home') }}">
                        <img src='{{ asset("storage/{$settings->logo}") }}' width="{{ $settings->logoWidth }}"
                            height="{{ $settings->logoHeight }}" alt="logo" title="{{ $settings->logoText }}" lazy>
                    </a>
                </div>
            @elseif(!empty($settings->logoText))
                <div class="flex-none logo-text">
                    <a class="text-lg font-medium" href="{{ localizedRoute('home') }}">
                        {{ $settings->logoText }}
                    </a>
                </div>
            @endif
            <div @class(['flex-1', 'justify-end' => !empty($settings->logoText)])>
                <ul class="gap-1 p-0 menu menu-horizontal">
                    @if ($settings->isHomeLinkVisible)
                        <li>
                            <a @class(['active' => active('home'), 'font-medium']) href="{{ localizedRoute('home') }}">
                                {{ $settings->homeLabel }}
                            </a>
                        </li>
                    @endif
                    @foreach ($navPages as $page)
                        @if (($page->location === 'navbar' || $page->location === 'both') && $page->published_at?->isPast())
                            <li>
                                <a @class(['active' => active("pages/$page->slug"), 'font-medium']) href="{{ localizedRoute('resolver', $page->slug) }}">
                                    {{ $page->label }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                    @if ($contactSettings->show && ($contactSettings->location === 'navbar' || $contactSettings->location === 'both'))
                        <li>
                            <a @class(['active' => active('contact'), 'font-medium']) href="{{ localizedRoute('contact') }}">
                                <span>{{ $contactSettings->label }}</span>
                            </a>
                        </li>
                    @endif
                    @if ($blogSettings->show && ($blogSettings->location === 'navbar' || $blogSettings->location === 'both'))
                        <li>
                            <a @class(['active' => active('blog'), 'font-medium']) href="{{ localizedRoute('blog') }}">
                                <span>{{ $blogSettings->label }}</span>
                            </a>
                        </li>
                    @endif
                    @foreach ($settings->links as $link)
                        @if ($link['isVisible'])
                            <li>
                                <a class="font-medium" href="{{ $link['url'] }}"
                                    {{ $link['newTab'] ? 'target=_blank' : '' }}>
                                    <span>{{ $link['label'] }}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            @if (count(locales()) > 1)
                <div class="nav-end">
                    <x-lang-switcher />
                </div>
            @endif
        </div>
        {{-- modile navbar --}}
        <div x-data="{ expanded: false }" class="flex-col px-0 md:hidden navbar-mobile navbar">
            <div class="flex w-full gap-2">
                @if ($settings->isLogoVisible)
                    <div class="flex items-center flex-1 logo-img">
                        <a class="inline-block" href="{{ localizedRoute('home') }}">
                            <img src="{{ asset("storage/{$settings->logo}") }}" width="{{ $settings->logoWidth }}"
                                height="{{ $settings->logoHeight }}" alt="logo" title="{{ $settings->logoText }}"
                                lazy>
                        </a>
                    </div>
                @else
                    @if (!empty($settings->logoText))
                        <h2 class="logo-text">
                            <a class="text-lg font-medium" href="{{ localizedRoute('home') }}">
                                {{ $settings->logoText }}
                            </a>
                        </h2>
                    @endif
                @endif
                @if (count(locales()) > 1)
                    <div class="flex-none">
                        <x-lang-switcher />
                    </div>
                @endif
                <div class="ms-auto">
                    <button @click="expanded = !expanded"
                        class="border border-gray-400 border-solid btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="w-6 h-6 text-gray-500 stroke-current"
                            :class="{ 'block': !expanded, 'hidden': expanded }" x-transition>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg class="hidden w-6 h-6 text-gray-500 stroke-current"
                            :class="{ 'block': expanded, 'hidden': !(expanded) }" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" x-transition>
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="w-full mt-2" x-show="expanded" x-collapse x-cloak>
                <ul class="w-full gap-1 p-0 navbar-links menu menu-vertical">
                    @if ($settings->isHomeLinkVisible)
                        <li>
                            <a @class(['active' => active('home'), 'font-medium']) href="{{ localizedRoute('home') }}">
                                <span>{{ $settings->homeLabel }}</span>
                            </a>
                        </li>
                    @endif
                    @foreach ($navPages as $page)
                        @if (($page->location === 'navbar' or $page->location === 'both') and $page->published_at?->isPast())
                            <li>
                                <a @class(['active' => active("pages/$page->slug"), 'font-medium']) href="{{ localizedRoute('resolver', $page->slug) }}">
                                    <span>{{ $page->label }}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                    @if ($contactSettings->location === 'navbar' || $contactSettings->location === 'both')
                        <li>
                            <a @class(['active' => active('contact'), 'font-medium']) href="{{ localizedRoute('contact') }}">
                                <span>{{ $contactSettings->label }}</span>
                            </a>
                        </li>
                    @endif
                    @if ($blogSettings->location === 'navbar' || $blogSettings->location === 'both')
                        <li>
                            <a @class(['active' => active('blog'), 'font-medium']) href="{{ localizedRoute('blog') }}">
                                <span>{{ $blogSettings->label }}</span>
                            </a>
                        </li>
                    @endif
                    @foreach ($settings->links as $link)
                        @if ($link['isVisible'])
                            <li>
                                <a href="{{ $link['url'] }}" {{ $link['newTab'] ? 'target="_blank"' : '' }}>
                                    <span>{{ $link['label'] }}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</nav>
