<x-filament::widget class="filament-account-widget">
    <x-filament::card>
        <div class="flex items-center h-12">
            <div
                class="p-2 font-bold text-white bg-center bg-contain rounded-lg bg-primary-500 text-md me-4">
                {{ $this->version }}</div>
            <h2 class="text-lg font-bold tracking-tight sm:text-xl">
                {{ $this->name }}
            </h2>
        </div>
    </x-filament::card>
</x-filament::widget>
