@if ($paginator->hasPages())
    <nav id="pagination" class="flex flex-col items-center pagination sm:flex-row sm:justify-between">
        <div>
            @if ($paginator->hasPages())
                @if ($paginator->currentPage() > 3)
                    <a class="hidden px-4 py-2 text-white no-underline bg-gray-400 rounded sm:inline-block last:me-0 me-1 hover:bg-gray-700"
                        href="{{ $paginator->url(1) }}">1</a>
                @endif
                @if ($paginator->currentPage() > 4)
                    <svg class="hidden w-6 h-6 sm:inline-block last:me-0 me-1" fill="none" stroke="currentColor"
                        stroke-width="1.5" height="24" width="24" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z">
                        </path>
                    </svg>
                @endif
                @foreach (range(1, $paginator->lastPage()) as $i)
                    @if ($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                        @if ($i == $paginator->currentPage())
                            <span
                                class="px-4 py-2 text-white bg-gray-700 rounded current last:me-0 me-1">{{ $i }}</span>
                        @else
                            <a class="px-4 py-2 text-white no-underline bg-gray-400 rounded last:me-0 me-1 hover:bg-gray-700"
                                href="{{ $paginator->url($i) }}">{{ $i }}</a>
                        @endif
                    @endif
                @endforeach
                @if ($paginator->currentPage() < $paginator->lastPage() - 3)
                    <svg class="hidden w-6 h-6 sm:inline-block last:me-0 me-1" fill="none" stroke="currentColor"
                        stroke-width="1.5" height="24" width="24" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z">
                        </path>
                    </svg>
                @endif
                @if ($paginator->currentPage() < $paginator->lastPage() - 2)
                    <a class="hidden px-4 py-2 text-white no-underline bg-gray-400 rounded sm:inline-block sm:visible last:me-0 me-1 hover:bg-gray-700"
                        href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
                @endif
                </ul>
            @endif
        </div>
        <p class="py-2 mb-0 text-base font-semibold leading-5 text-gray-500 page-of">
            Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}
        </p>
    </nav>
@endif
