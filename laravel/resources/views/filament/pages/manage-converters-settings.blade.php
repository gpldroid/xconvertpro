<x-filament::page>
    <div class="grid grid-cols-3 gap-4 mt-3">
        @foreach ($this->converters as $converter)
            <div class="p-2 space-y-2 bg-white shadow rounded-xl">
                <div class="px-4 py-2">
                    <div class="flex flex-col gap-4 xl:flex-row xl:items-center xl:justify-between">
                        <h2 class="text-xl font-semibold tracking-tight filament-card-heading">
                            {{ $converter['admin']['title'] }}
                        </h2>

                    </div>
                </div>

                <div aria-hidden="true" class="border-t filament-hr"></div>

                <div class="space-y-2">
                    <div class="px-4 py-2 space-y-4">
                        <div class="space-y-6">
                            <p>
                                {{ $converter['admin']['summary'] }}
                            </p>

                            <a href="{{ $converter['admin']['settings-page']::getUrl() }}"
                                class="inline-flex items-center justify-center px-4 font-medium tracking-tight text-white transition-colors border border-transparent rounded-lg shadow focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset filament-button h-9 focus:ring-white bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700">
                                <span>Settings</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-filament::page>
