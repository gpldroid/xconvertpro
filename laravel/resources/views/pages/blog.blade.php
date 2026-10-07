<x-layouts.app :noIndex="$settings->noIndex">
    <div id="blog-page">
        @if (!count($posts))
            <p class="my-20 text-center no-posts">{{ __('No posts yet. Please checkback later.') }}</p>
        @else
            <header class="mb-12">
                <h1>{{ $settings->headerTitle }}</h1>
                <p>{{ $settings->headerSubtitle }}</p>
            </header>
            @if ($settings->topAd)
                <div class="mb-8 top-ad">
                    {!! $adSettings->topAdCode !!}
                </div>
            @endif
            <section class="grid gap-6 xs:grid-cols-2 md:grid-cols-3">
                @foreach ($posts as $post)
                    <article class="flex flex-col entry bg-zinc-50">
                        @if ($post->thumbnail)
                            <div class="h-48 bg-center bg-no-repeat bg-cover xs:h-32 entry-thumbnail"
                                style="background-image: url({{ asset('/storage/' . $post->thumbnail) }});">
                            </div>
                        @endif
                        <div class="p-4">
                            <h2 class="mb-1 text-base font-medium entry-title">
                                <a class="text-gray-700 no-underline transition-colors hover:text-blue-500"
                                    href="{{ localizedRoute('resolver', $post->slug) }}">
                                    {{ $post->title }}
                                </a>
                            </h2>
                            <x-partials.post-meta :post="$post" />
                            <p class="mb-2 text-sm text-gray-500 entry-snippet">{{ Str::limit($post->snippet, 150) }}</p>
                            <a href="{{ localizedRoute('resolver', $post->slug) }}" class="h-auto min-h-0 py-3 leading-4 text-blue-600 bg-transparent border-blue-600 rounded btn-read-more btn hover:bg-transparent hover:border-blue-600">{{__('Read more')}}</a>
                        </div>
                    </article>
                @endforeach
                @if ($settings->bottomAd)
                    <div class="mb-8 bottom-ad">
                        {!! $adSettings->bottomAdCode !!}
                    </div>
                @endif
                @if ($settings->showShareButtons)
                    <x-share-buttons />
                @endif
            </section>
            {{ $posts->links() }}
        @endif
    </div>
</x-layouts.app>
