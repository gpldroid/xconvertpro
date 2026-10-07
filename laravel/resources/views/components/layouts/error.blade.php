<!DOCTYPE html>
<html lang="{{ locale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('storage/images/favicon.ico') }}" type="image/x-icon">
    <title>{{ $title }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])

</head>

<body class="antialiased">
    <main class="flex flex-col items-center justify-center min-h-screen">
        <div class="container text-center">
            {{ $slot }}
        </div>
    </main>
</body>

</html>
