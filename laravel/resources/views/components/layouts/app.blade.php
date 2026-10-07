<!DOCTYPE html>
<html lang="{{ locale() }}">
<x-head :noIndex="$noIndex ?? false" />

<body class="flex flex-col min-h-screen antialiased">
    <x-no-script />
    <x-navbar />
    @if ($sidebarSettings->enableSidebar)
        <div class="container grid grid-rows-[auto_1fr] lg:grid-rows-[auto] min-h-screen gap-8 lg:grid-cols-3 mb-8 flex-1">
            <main class="flex flex-col lg:col-span-2">
                {{ $slot }}
            </main>
            <x-sidebar />
        </div>
    @else
        <div class="container flex-1 mb-8">
            <main class="flex flex-col">
                {{ $slot }}
            </main>
        </div>
    @endif
    <x-footer />
    <x-to-up />
    <livewire:alert-offline />
    @livewire('notifications')
    @livewireScriptConfig
    @include('cookie-consent::index')
</body>

</html>
