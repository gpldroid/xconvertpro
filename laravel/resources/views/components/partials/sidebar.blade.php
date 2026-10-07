<aside @class(['lg:col-span-1', 'sticky self-start top-8' => $isSticky])>
    @if ($showAd)
        <div class="mb-8 sidebar-ad">
            {!! $adSettings->sidebarAdCode !!}
        </div>
    @endif
    <div class="recent-posts">
        <h2 class="mb-3 text-2xl font-medium">{{ __('Popular Converters') }}</h2>
        @if ($popularConverters->isEmpty())
            <p>{{ __('No popular converter yet. Please checkback later.') }}</p>
        @else
            <ul class="p-0 list-none">
                @foreach ($popularConverters as $converter)
                    <li class="mb-2 last:mb-0">
                        <div class="flex items-center gap-1">
                            <a href="/{{ $converter->slug }}" class="flex-1 truncate hover:text-sky-700">
                                {{ $converter->title }}
                            </a>
                            <span class="flex items-center text-[.60rem] meta-views">
                                <x-icons.eye class="w-4 h-4 mb-[.15rem] me-1" />
                                {{ $converter->views }}
                            </span>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    @if (!Route::is('blog'))
        @if ($recentPosts)
            <div class="mt-8 recent-posts">
                <h2 class="mb-3 text-2xl font-medium">{{ __('Recent Posts') }}</h2>
                @if ($recentPosts->isEmpty())
                    <p>{{ __('No posts yet. Please checkback later.') }}</p>
                @else
                    <ul class="p-0 list-none">
                        @foreach ($recentPosts as $post)
                            <li class="mb-2 last:mb-0">
                                <a href="/{{ $post->slug }}" class="truncate hover:text-sky-700">
                                    {{ $post->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endif
    @endif
</aside>
