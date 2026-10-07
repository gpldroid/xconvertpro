<x-layouts.error title="{{ __('404 Page Not Found') }}">
    <h1 class="mb-8">{{ __('Oops! Page Not Found') }}</h1>
    <h5 class="mb-8">{{ __('The page you are looking for does not exist') }}</h5>
    <a class="btn btn-outline btn-error hover:!text-white" href="/admin">
        {{ __('Go back to the dashboard') }}
    </a>
</x-layouts.error>
