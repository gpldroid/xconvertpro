@php
    $date = \Carbon\Carbon::parse($post->created_at);
    $created = $date->diffInMonths(now()) >= 3 ? $date->format('F d, Y') : $date->diffForHumans();
@endphp
<div class="flex items-center gap-2 mb-2 text-gray-500 uppercase post-meta">
    <span class="flex items-center meta-date text-[.60rem]">
        <x-icons.clock class="w-4 h-4 mb-[.15rem] me-1" />
        {{ $created }}
    </span>
    <span class="flex items-center text-[.60rem] rounded-lg meta-views">
        <x-icons.eye class="w-4 h-4 mb-[.15rem] me-1" />
        {{ views($post)->count() }}
    </span>
</div>
