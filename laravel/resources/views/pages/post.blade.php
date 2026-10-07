<x-layouts.app>
    <div id="post">
        @if ($post->topAd)
            <div class="mb-8 top-ad">
                {!! $adSettings->topAdCode !!}
            </div>
        @endif
        @if ($post->thumbnail)
        <div class="mb-8 post-thumbnail">
            <img class="w-full h-auto mx-auto" src="{{ asset('/storage/'.$post->thumbnail) }}" alt="">
        </div>
        @endif
        <h2 class="text-3xl post-title">{{ $post->title }}</h2>
        <x-partials.post-meta :post="$post" />
        <article class="mb-8 prose post-content">
            {!! $post->content !!}
        </article>
        @if ($post->bottomAd)
            <div class="mb-8 bottom-ad">
                {!! $adSettings->bottomAdCode !!}
            </div>
        @endif
        @if ($post->showShareButtons)
            <x-share-buttons />
        @endif
    </div>
</x-layouts.app>
