<x-layouts.app>
    <div id="home-page">
        <header class="mb-10 text-center">
            <h2 class="mb-4 text-3xl font-medium">{{ $settings->headerTitle }}</h2>
            <h4 class="text-lg">{{ $settings->headerSubtitle }}</h4>
        </header>
        @if ($settings->topAd)
            <div class="mb-8 top-ad">
                {!! $adSettings->topAdCode !!}
            </div>
        @endif
        @php
            $items = collect(converters())
                ->map(fn($converter) => $converter['enabled'])
                ->toArray();
            $showConverters = in_array(true, $items);
        @endphp
        @if ($showConverters)
            <section class="mb-8 cards">
                <div class="grid grid-cols-2 gap-6 md:grid-cols-3">
                    @foreach (converters() as $converter)
                        @if ($converter['enabled'])
                            <a class="relative p-4 hover:scale-105 text-center duration-300 rounded-md card text-card-text-color bg-card-bg-color shadow-hover hover:bg-card-hover-bg-color hover:text-card-hover-text-color"
                                href="{{ localizedRoute('resolver', $slugs->{$converter['name']}) }}">
                                @if ($converter['views'])
                                    <span
                                        class="absolute flex items-center text-xs rounded-lg card-views badge badge-ghost top-2 end-2">
                                        <x-icons.eye class="w-4 h-4 me-1" strokeWidth="2" />
                                        {{ $converter['views'] }}
                                    </span>
                                @endif
                                <div
                                    class="flex items-center justify-center w-20 h-20 mx-auto mb-4 rounded-full card-icon bg-zinc-50">
                                    <x-dynamic-component :component="$converter['icon']" class="text-card-hover-bg-color w-14 h-14" />
                                </div>
                                <h4 class="block mb-3 text-base font-medium text-center card-title">
                                    {{ $converter['entryTitle'] }}
                                </h4>
                                <p class="text-sm card-subtitle">{{ $converter['entrySummary'] }}</p>
                            </a>
                        @endif
                    @endforeach
                </div>
            </section>
            @if ($settings->content)
                @if ($settings->middleAd)
                    <div class="mb-8 middle-ad">
                        {!! $adSettings->middleAdCode !!}
                    </div>
                @endif
                <section class="mb-8 prose about">
                    {!! $settings->content !!}
                </section>
            @endif
            @if ($settings->bottomAd)
                <div class="mb-8 bottom-ad">
                    {!! $adSettings->bottomAdCode !!}
                </div>
            @endif
            @if ($settings->showShareButtons)
                <x-share-buttons />
            @endif
        @else
            <section class="mb-8">
                <div class="container">
                    <h4 class="text-lg font-medium text-center no-converter">
                        {{ __('No Converter') }}
                    </h4>
                </div>
            </section>
        @endif
    </div>
</x-layouts.app>
