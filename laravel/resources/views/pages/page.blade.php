<x-layouts.app :noIndex="$page->noIndex">
    <div id="page">
        @if ($page->topAd)
            <div class="mb-8 top-ad">
                {!! $adSettings->topAdCode !!}
            </div>
        @endif
        <div class="mb-8 prose content">{!! $page->content !!}</div>
        @if ($page->bottomAd)
            <div class="mb-8 bottom-ad">
                {!! $adSettings->bottomAdCode !!}
            </div>
        @endif
        @if ($page->showShareButtons)
            <x-share-buttons />
        @endif
    </div>
</x-layouts.app>
