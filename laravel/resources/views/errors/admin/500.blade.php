<x-layouts.error title="{{ __('500 Unexpected Error') }}">
    <h1 class="mb-8">{{ __('Whoops! Something Went Wrong') }}</h1>
    <h5 class="mb-8">{{ __('Internal Server Error! Please try again later') }}</h5>
    <a class="btn btn-outline btn-error hover:!text-white" href="/admin">
        {{ __('Go back to the dashboard') }}
    </a>
</x-layouts.error>
