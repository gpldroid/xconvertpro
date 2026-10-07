<x-filament::page>
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <div class="p-2 space-y-2 bg-white shadow rounded-xl">
            <div class="px-4 py-2">
                <h2 class="mb-2 text-xl font-semibold tracking-tight">
                    Generate Sitemap
                </h2>
                <p class="text-sm">Press the button to generate a new sitemap.</p>
            </div>
            <div class="px-4 py-2">
                <form class="space-y-6" wire:submit="generateSitemap">
                    <button type="submit" wire:loading.attr="disabled"
                        class="inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2.25rem] px-4 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700"
                        wire:loading.class="cursor-wait opacity-70">
                        <svg wire:loading wire:target="generateSitemap" xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 text-gray-100 me-2 animate-spin" viewBox="0 0 16 16" fill="none">
                            <circle cx="8" cy="8" r="7" stroke="currentColor"
                                stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                            <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                        </svg>
                        Submit
                    </button>
                </form>
            </div>
        </div>
        <div class="p-2 space-y-2 bg-white shadow rounded-xl">
            <div class="px-4 py-2">
                <h2 class="mb-2 text-xl font-semibold tracking-tight">
                    Clear Cache
                </h2>
                <p class="text-sm">Press the button to clear the application cache</p>
            </div>
            <div class="px-4 py-2">
                <form class="mb-4 space-y-6" wire:submit="clearCache">
                    <button type="submit" wire:loading.attr="disabled"
                        class="inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2.25rem] px-4 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700"
                        wire:loading.class="cursor-wait opacity-70">
                        <svg wire:loading wire:target="clearCache" xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 text-gray-100 me-2 animate-spin" viewBox="0 0 16 16" fill="none">
                            <circle cx="8" cy="8" r="7" stroke="currentColor"
                                stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                            <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                        </svg>
                        Submit
                    </button>
                </form>
            </div>
        </div>
        <div class="p-2 space-y-2 bg-white shadow rounded-xl">
            <div class="px-4 py-2">
                <h2 class="mb-2 text-xl font-semibold tracking-tight">
                   Clear Views Cache
                </h2>
                <p class="text-sm">Press the button to clear the views cache</p>
            </div>
            <div class="px-4 py-2">
                <form class="mb-4 space-y-6" wire:submit="generateViews">
                    <button type="submit" wire:loading.attr="disabled"
                        class="inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2.25rem] px-4 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700"
                        wire:loading.class="cursor-wait opacity-70">
                        <svg wire:loading wire:target="generateViews" xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 text-gray-100 me-2 animate-spin" viewBox="0 0 16 16" fill="none">
                            <circle cx="8" cy="8" r="7" stroke="currentColor"
                                stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke"></circle>
                            <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                        </svg>
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-filament::page>
