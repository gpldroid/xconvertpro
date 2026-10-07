<div class="to-up" x-data="{ scrollBackTop: window.scrollY > 100 }">
    <button x-show="scrollBackTop" x-on:scroll.window="scrollBackTop = window.scrollY > 100"
        x-on:click="window.scrollTo({ top: 0, behavior: 'smooth' })"
        class="fixed z-10 flex items-center justify-center w-12 h-12 text-white duration-300 bg-gray-500 rounded to-up-btn hover:bg-gray-600 end-4 bottom-4"
        title="{{__('Scroll top')}}" x-transition x-cloak>
        <x-icons.chevron-up class="h-7 w-7" />
    </button>
</div>
