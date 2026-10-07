<x-layouts.app :noIndex="$settings->noIndex">
    <div id="contact-page">
        @if ($settings->topAd)
            <div class="mb-8 top-ad">
                {!! $adSettings->topAdCode !!}
            </div>
        @endif
        <div class="mb-8 prose about">
            {!! $settings->content !!}
        </div>
        <p class="flex items-center gap-2 email">
            <x-icons.at-symbol class="w-6 h-6" />
            {{ $settings->email }}
        </p>
        @if (!empty($settings->facebook))
            <p class="flex items-center gap-2 mt-3 facebook">
                <x-icons.facebook class="w-6 h-6" />
                {{ $settings->facebook }}
            </p>
        @endif
        @if (!empty($settings->twitter))
            <p class="flex items-center gap-2 mt-3 twitter">
                <x-icons.twitter class="w-6 h-6" />
                {{ $settings->twitter }}
            </p>
        @endif
        @if (!empty($settings->instagram))
            <p class="flex items-center gap-2 mt-3 instagram">
                <x-icons.instagram class="w-6 h-6" />
                {{ $settings->instagram }}
            </p>
        @endif
        @if (!empty($settings->whatsapp))
            <p class="flex items-center gap-2 mt-3 whatsapp">
                <x-icons.whatsapp class="w-6 h-6" />
                {{ $settings->whatsapp }}
            </p>
        @endif
        @if (!empty($settings->telegram))
            <p class="flex items-center gap-2 mt-3 telegram">
                <x-icons.telegram class="w-6 h-6" />
                {{ $settings->telegram }}
            </p>
        @endif
        @if ($settings->bottomAd)
            <div class="mt-8 bottom-ad">
                {!! $adSettings->bottomAdCode !!}
            </div>
        @endif
        @if ($settings->showShareButtons)
            <div class="mt-8">
                <x-share-buttons />
            </div>
        @endif
    </div>
</x-layouts.app>
