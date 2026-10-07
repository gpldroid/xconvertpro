<!DOCTYPE html>
<html lang="{{ locale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>Installer</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/install.js'])
    @livewireStyles
</head>

<body class="antialiased">
    <x-no-script />
    <main class="bg-gray-100">
        {{ $slot }}
    </main>
    @livewire('notifications')
    @livewireScriptConfig 
</body>

</html>
