<x-layouts.app>
    <div id="converter">
        <header class="mb-10 text-center">
            <h2 class="mb-4 text-3xl font-medium">{{ $headerTitle }}</h2>
            <h4 class="text-lg">{{ $headerSubtitle }}</h4>
        </header>
        @if ($showTopAd)
            <div class="mb-8 top-ad">
                {!! $adSettings->topAdCode !!}
            </div>
        @endif
        <livewire:uploader :slug="$slug" :format="$format" />
        @if ($showMiddleAd)
            <div class="mb-8 middle-ad">
                {!! $adSettings->middleAdCode !!}
            </div>
        @endif
        <section class="mb-8 prose about">
            {!! $description !!}
        </section>
        @php
            $converters = collect(converters())
                ->filter(fn($converter) => $converter['format'] !== $format)
                ->toArray();
        @endphp
        <section class="mb-8 converters-links">
            <h4 class="mb-4 text-xl font-medium">More Converters</h4>
            <div class="grid grid-cols-2 gap-6 md:grid-cols-3">
                @foreach ($converters as $converter)
                    @if ($converter['enabled'])
                        <a class="font-medium converter-link opacity-80 hover:opacity-100"
                            href="{{ localizedRoute('resolver', $slugs->{$converter['name']}) }}">
                            {{ $converter['title'] }}
                        </a>
                    @endif
                @endforeach
            </div>
        </section>
        @if ($showBottomAd)
            <div class="mb-8 bottom-ad">
                {!! $adSettings->bottomAdCode !!}
            </div>
        @endif
        @if ($showShareButtons)
            <x-share-buttons />
        @endif
    </div>
</x-layouts.app>
