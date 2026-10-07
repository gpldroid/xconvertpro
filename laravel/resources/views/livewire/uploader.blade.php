<section x-data="filepond" class="mb-8 uploader" x-ref="result">
    <div x-show="showPlaceHolder" class="flex flex-col w-full gap-4">
        <div class="w-full h-60 skeleton"></div>
        <div class="h-12 rounded-md skeleton w-28"></div>
    </div>
    @if ($showUploader)
        <div x-show='showUploader'>
            <div wire:ignore>
                <div class="filepond" x-ref='filepond'></div>
            </div>
            <button x-cloak x-show="showConvertBtn" x-bind:disabled="isConvertBtnDisabled" @click="convert"
                class="flex items-center mt-4 text-base leading-4 convert-btn bg-convert-btn-bg-color hover:bg-convert-btn-bg-color text-convert-btn-text-color btn opacity-95 hover:opacity-100 disabled:text-convert-btn-text-color disabled:bg-convert-btn-bg-color disabled:opacity-60">
                <x-icons.chevron-right class="w-4 h-4 mb-[.15rem]" stroke-width="4" />
                {{ __('Convert') }}
            </button>
        </div>
    @endif
    <div class="fixed top-0 z-50 flex items-center justify-center w-full h-screen py-20 text-sky-200 bg-opacity-60 bg-slate-800 start-0 spinner"
        wire:loading.flex wire:target="convert">
        <x-icons.spinner class="w-24 h-24 mx-auto animate-spin" stroke-width="7" />
    </div>
    @if ($errors->any())
        <div class="flex flex-col gap-2 mb-4">
            @foreach ($errors->all() as $error)
                <div class="flex items-center gap-2 p-3 text-white bg-red-500 rounded error-box">
                    <x-icons.alert class="h-5 w-5 mb-[.15rem]" stroke-width="2.25" />
                    <span class="flex-1">{{ $error }}</span>
                </div>
            @endforeach
        </div>
        @if (empty($results))
            <a class="mt-4 text-base font-medium leading-4 text-white rounded try-btn btn btn-info"
                href="{{ localizedRoute('resolver', $slug) }}">
                {{ __('Try other images') }}
            </a>
        @endif
    @endif
    @if (!empty($results))
        <div class="bg-white result">
            @foreach ($results['images'] as $result)
                @php
                    $id = $result['id'];
                    $basename = $result['basename'];
                    $size = $result['size'];
                @endphp
                <div class="p-2 mb-4 bg-white border rounded-md">
                    <div class="flex items-center">
                        <x-icons.image class="hidden text-gray-500 w-7 h-7 me-2 sm:inline-flex" stroke-width="2" />
                        <span class="flex-1 max-w-[10rem] me-auto xs:max-w-[15rem] sm:max-w-[20rem] truncate">
                            {{ "{$basename}.{$format}" }}
                        </span>
                        <span
                            class="px-2 py-3 text-sm leading-4 text-gray-500 rounded-md badge badge-ghost me-3">{{ $size }}</span>
                        <a href="{{ localizedRoute('download') }}/?id={{ $id }}&basename={{ $basename }}&format={{ $format }}"
                            class="text-base font-medium leading-4 text-white rounded download-btn btn btn-info"
                            target="_blank">
                            <x-icons.download class="w-6 h-6 mb-[.15rem] hidden sm:inline-flex" stroke-width="2.25" />
                            {{ __('Download') }}
                        </a>
                    </div>
                </div>
            @endforeach
            <div class="flex flex-wrap items-center gap-2 p-2 bg-slate-100">
                <a class="more-btn p-1 px-3 leading-4 !text-gray-400 border-2 border-gray-400 rounded hover:!text-white btn btn-outline font-medium text-base btn-info"
                    href="{{ localizedRoute('resolver', $slug) }}">
                    {{ __('Convert More!') }}
                </a>
                <button onclick="modal.showModal()"
                    class="delete-btn p-1 px-3 !text-gray-400 border-2 text-base border-gray-400 rounded btn btn-outline btn-error hover:!text-white me-auto">
                    <x-icons.trash class="w-7 h-7" />
                </button>
                <dialog id="modal" class="modal">
                    <div class="rounded modal-box">
                        <h3 class="text-xl font-medium">{{ __('Alert!') }}</h3>
                        <hr>
                        <p class="py-4">{{ __('Are you sure you want to delete all images from the server?') }}
                        </p>
                        <div class="modal-action">
                            <form method="dialog">
                                <button class="rounded btn">{{ __('Cancel') }}</button>
                                <a wire:click="deleteAll"
                                    class="text-white bg-red-500 rounded btn btn-ghost hover:bg-red-500"
                                    href="{{ localizedRoute('resolver', $slug) }}">{{ __('Delete') }}</a>
                            </form>
                        </div>
                    </div>
                </dialog>
                @if ($results['zipId'] == null)
                    <button disabled
                        class="text-base font-medium leading-4 text-white download-zip-btn btn btn-info disabled:bg-info-300"
                        target="_blanks">
                        <x-icons.download class="w-6 h-6 mb-[.15rem]" stroke-width="2.25" />
                        {{ __('Zip unavailable') }}
                    </button>
                @else
                    <a href="{{ localizedRoute('downloadZip') }}/?zipId={{ $results['zipId'] }}"
                        class="text-base font-medium leading-4 text-white download-zip-btn btn btn-info"
                        target="_blanks">
                        <x-icons.download class="w-6 h-6 mb-[.15rem]" stroke-width="2.25" />
                        {{ __('Download ZIP') }}
                    </a>
                @endif
            </div>
        </div>
    @endif
</section>
