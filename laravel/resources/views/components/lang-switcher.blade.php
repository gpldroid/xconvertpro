<div class="lang-switch dropdown dropdown-end">
    <label tabindex="0" class="h-auto p-2 border border-gray-300 border-solid btn btn-ghost rounded-btn min-h-fit">
        <img class="w-6 h-6" src="{{ asset('storage/flags/' . flag(currentLocale()) . '.svg') }}" lazy>
        <span class="text-xs capitalize">
            {{ nativeName(currentLocale()) }}
        </span>
    </label>
    <ul tabindex="1" class="menu menu-sm dropdown-content z-[1] p-2 shadow bg-base-100 mt-4">
        @foreach (locales() as $locale => $values)
            @if ($locale != currentLocale())
                <li>
                    <a hreflang="{{ $locale }}"
                        href="{{ LaravelLocalization::getLocalizedURL($locale, null, [], true) }}">
                        <img class="w-6 h-6 max-w-none" src="{{ asset('images/flags/' . $values['flag'] . '.svg') }}" lazy>
                        <span class="text-xs">{{ $values['native'] }}</span>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</div>
