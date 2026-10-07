<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if ($noIndex)
        <meta name="robots" content="noindex,nofollow">
    @endif
    <link rel="shortcut icon" href="{{ asset('/storage/favicon.ico') }}" type="image/x-icon">
    {!! SEOMeta::generate() !!}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/css/share-buttons.css', 'resources/js/app.js'])
    @livewireStyles
    @if (!empty($generalSettings->headerTags))
        {!! $generalSettings->headerTags !!}
    @endif
    @if (!empty($generalSettings->analyticsId))
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $generalSettings->analyticsId }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', '{{ $generalSettings->analyticsId }}');
        </script>
    @endif
    <style>
        [x-cloak] {
            display: none !important;
        }

        :root {
            --bg-color: {{ $styleSettings->bgColor }};
            --text-color: {{ $styleSettings->textColor }};
            --nav-bg-color: {{ $styleSettings->navBgColor }};
            --nav-text-color: {{ $styleSettings->navTextColor }};
            --uploader-bg-color: {{ $styleSettings->uploaderBgColor }};
            --uploader-text-color: {{ $styleSettings->uploaderTextColor }};
            --uploader-bar-text-color: {{ $styleSettings->uploadBarTextColor }};
            --uploader-bar-success-bg-color: {{ $styleSettings->uploadBarSuccessBgColor }};
            --uploader-bar-error-bg-color: {{ $styleSettings->uploadBarErrorBgColor }};
            --browse-btn-bg-color: {{ $styleSettings->browseBtnBgColor }};
            --browse-btn-text-color: {{ $styleSettings->browseBtnTextColor }};
            --convert-btn-bg-color: {{ $styleSettings->convertBtnBgColor }};
            --convert-btn-text-color: {{ $styleSettings->convertBtnTextColor }};
            --card-bg-color: {{ $styleSettings->cardBgColor }};
            --card-text-color: {{ $styleSettings->cardTextColor }};
            --card-hover-bg-color: {{ $styleSettings->cardHoverBgColor }};
            --card-hover-text-color: {{ $styleSettings->cardHoverTextColor }};
        }

        {{ $styleSettings->customCSS }}
    </style>
</head>
