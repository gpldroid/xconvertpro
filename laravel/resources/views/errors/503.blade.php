<x-layouts.error title="{{ __('HTTP 503 Service Unavailable') }}">
    <h1 class="mb-8">{{ __('Oops! Server Busy') }}</h1>
    <h5 class="mb-8">{{ __('Website can\'t be reached at the moment because the server is not ready to handle the request') }}</h5>
    <a class="btn btn-outline btn-error hover:!text-white" href="/">
        {{ __('Go back to the home page') }}
    </a>
</x-layouts.error>
