<footer class="flex flex-col gap-4 p-10 footer footer-center bg-neutral text-neutral-content">
    @if ($settings->counterEnabled)
        <x-converts-count :initialValue="$settings->convertedCount" />
    @endif
    <div class="flex flex-wrap justify-center gap-4 bottom-nav">
        @foreach ($navPages as $page)
            @if (($page->location == 'footer' || $page->location == 'both') && $page->published_at?->isPast())
                <a @class([
                    'text-base font-medium no-underline link hover:text-white current:text-white flex-none',
                    'active' => active("pages/$page->slug"),
                ]) href="{{ localizedRoute('resolver', $page->slug) }}">
                    {{ $page->label }}
                </a>
            @endif
        @endforeach
        @if ($contactSettings->show && ($contactSettings->location == 'footer' || $contactSettings->location == 'both'))
            <a @class([
                'text-base font-medium no-underline link hover:text-white current:text-white flex-none',
                'active' => active('contact'),
            ]) href="{{ localizedRoute('contact') }}">
                <span>{{ $contactSettings->label }}</span>
            </a>
        @endif
        @if ($blogSettings->show && ($blogSettings->location == 'footer' || $blogSettings->location == 'both'))
            <a @class([
                'text-base font-medium no-underline link hover:text-white current:text-white flex-none',
                'active' => active('blog'),
            ]) href="{{ localizedRoute('blog') }}">
                <span>{{ $blogSettings->label }}</span>
            </a>
        @endif
        @foreach ($settings->links as $link)
            @if ($link['isVisible'])
                <a class="flex-none text-base font-medium no-underline link hover:text-white" href="{{ $link['url'] }}"
                    {{ $link['newTab'] ? 'target=_blank' : '' }}>
                    <span>{{ $link['label'] }}</span>
                </a>
            @endif
        @endforeach
    </div>
    <p class="attribution">{{ $settings->attribution }}</p>
</footer>
