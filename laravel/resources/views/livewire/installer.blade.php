<div class="container max-w-3xl py-10">
    <h1 class="font-medium text-center">Installation Process</h1>
    <section class="p-6 mt-3 text-center bg-white rounded shadow">
        <div>You are installing <strong>{{ $name }}</strong> <span
                class="px-2 py-1 text-xs font-bold text-white bg-teal-500 rounded-md ms-1">{{ $version }}</span>
        </div>
    </section>
    <section>
        <div class="flex justify-center py-6">
            <div class="w-1/3">
                <div class="relative mb-2">
                    <div class="flex items-center w-10 h-10 mx-auto text-lg text-white bg-indigo-500 rounded-full">
                        <span class="w-full text-center text-white">
                            <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                width="24" height="24">
                                <path class="heroicon-ui"
                                    d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm14 8V5H5v6h14zm0 2H5v6h14v-6zM8 9a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm0 8a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="text-xs text-center md:text-base">Requirements</div>
            </div>
            <div class="w-1/3">
                <div class="relative mb-2">
                    <div class="absolute flex items-center content-center align-middle align-center"
                        style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                        <div class="items-center flex-1 w-full align-middle bg-gray-200 rounded align-center">
                            <div class="w-0 {{ $stage > 0 ? 'bg-indigo-300' : 'border-gray-200' }} py-1 rounded"
                                style="width: 100%;"></div>
                        </div>
                    </div>
                    <div
                        class="w-10 h-10 mx-auto {{ $stage > 0 ? 'bg-indigo-500' : 'bg-white border-2 border-gray-200' }} rounded-full text-lg text-white flex items-center">
                        <span class="text-center {{ $stage > 0 ? 'text-white' : 'text-gray-600' }} w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-full" width="24" height="24"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="text-xs text-center md:text-base">Database</div>
            </div>
            <div class="w-1/3">
                <div class="relative mb-2">
                    <div class="absolute flex items-center content-center align-middle align-center"
                        style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                        <div class="items-center flex-1 w-full align-middle bg-gray-200 rounded align-center">
                            <div class="w-0 {{ $stage > 1 ? 'bg-indigo-300' : 'border-gray-200' }} py-1 rounded"
                                style="width: 100%;"></div>
                        </div>
                    </div>
                    <div
                        class="w-10 h-10 mx-auto {{ $stage > 1 ? 'bg-indigo-500' : 'bg-white border-2 border-gray-200' }} rounded-full text-lg text-white flex items-center">
                        <span class="text-center {{ $stage > 1 ? 'text-white' : 'text-gray-600' }} w-full">
                            <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                width="24" height="24">
                                <path class="heroicon-ui"
                                    d="M19 10h2a1 1 0 0 1 0 2h-2v2a1 1 0 0 1-2 0v-2h-2a1 1 0 0 1 0-2h2V8a1 1 0 0 1 2 0v2zM9 12A5 5 0 1 1 9 2a5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm8 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h5a5 5 0 0 1 5 5v2z" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="text-xs text-center md:text-base">Add User</div>
            </div>
        </div>
        <div class="w-full p-6 bg-white rounded shadow">
            @if ($stage == 0)
                <form wire:submit="submitRequirements">
                    <div class="mb-6">
                        <p class="mb-1 text-2xl font-medium">1. Server Requirements</p>
                        <p class="text-base">
                            Make sure all the requirements are met before you proceed with the installation process
                        </p>
                    </div>
                    <div class="flex flex-col gap-3">
                        @php
                            $extensions = $this->requirements()['extensions'];
                            $systemRequirements = $this->requirements()['system'];
                        @endphp
                        <h4 class="text-lg font-medium ">Extensions:</h4>
                        <div class="grid w-full grid-cols-2 gap-3 mb-6">
                            @foreach ($extensions as $extension => $isInstalled)
                                <div class="w-full p-3 {{ $isInstalled ? 'bg-teal-600 text-teal-100' : 'bg-rose-600 text-rose-100' }} items-center leading-none lg:rounded-md flex lg:inline-flex"
                                    role="alert">
                                    @if ($isInstalled)
                                        <svg class="w-8 h-8 p-1 text-teal-600 bg-white rounded-full me-4" fill="none"
                                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5">
                                            </path>
                                        </svg>
                                    @else
                                        <svg class="w-8 h-8 p-1 bg-white rounded-full me-4 text-rose-600" fill="none"
                                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12">
                                            </path>
                                        </svg>
                                    @endif
                                    <span class="flex-auto font-semibold text-left me-2">{{ $extension }}</span>
                                </div>
                            @endforeach
                        </div>
                        <h4 class="text-lg font-medium ">System:</h4>
                        @foreach ($systemRequirements as $requirement => $isMet)
                            <div class="flex-1 w-full p-3 {{ $isMet ? 'bg-teal-600 text-teal-100' : 'bg-rose-600 text-rose-100' }} items-center leading-none lg:rounded-md inline-flex"
                                role="alert">
                                @if ($isMet)
                                    <svg class="w-8 h-8 p-1 text-teal-600 bg-white rounded-full me-4" fill="none"
                                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5">
                                        </path>
                                    </svg>
                                @else
                                    <svg class="w-8 h-8 p-1 bg-white rounded-full me-4 text-rose-600" fill="none"
                                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                                        </path>
                                    </svg>
                                @endif
                                @if ($requirement == 'PHP')
                                    <span class="flex-auto font-semibold text-left me-2">Minimum required PHP is 8.1.0,
                                        current
                                        is {{ PHP_VERSION }}</span>
                                @else
                                    <span class="flex-auto font-semibold text-left me-2">{{ $requirement }}</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-6 text-end">
                        <hr />
                        <button wire:loading.attr="disabled" wire:loading.class="opacity-50"
                            class="inline-flex items-center justify-center px-6 py-2 mt-6 text-white bg-indigo-600 rounded cursor-pointer">
                            <svg wire:loading id="spinner" xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5 text-gray-100 me-2 animate-spin" viewBox="0 0 16 16" fill="none">
                                <circle cx="8" cy="8" r="7" stroke="currentColor"
                                    stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke">
                                </circle>
                                <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                            </svg>
                            Next
                        </button>
                    </div>
                </form>
            @elseif ($stage == 1)
                <form wire:submit="submitDatabase">
                    <div class="mb-6">
                        <p class="mb-[.5] text-xl font-medium">2. Setup MySQL Database</p>
                        <p class="text-base">
                            Fill in your database details to proceed with the installation.
                        </p>
                    </div>
                    <div class="flex gap-3">
                        <div class="w-1/2">
                            <label class="inline-block mt-3 mb-2 font-medium text-gray-700" for="username">
                                Username <span class="text-rose-500">*</span>
                            </label>
                            <input wire:model="databaseUsername" autocomplete="off" name="databaseUsername"
                                class="w-full px-3 py-2 leading-tight text-gray-700 border border-gray-500 rounded form-input"
                                id="username" type="text" placeholder="database username">
                            @error('databaseUsername')
                                <span class="text-xs font-medium text-rose-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="w-1/2">
                            <label class="inline-block mt-3 mb-2 font-medium text-gray-700" for="password">
                                Password <span class="text-rose-500">*</span>
                            </label>
                            <input wire:model="databasePassword" autocomplete="off"
                                class="w-full px-3 py-2 leading-tight text-gray-700 border border-gray-500 rounded form-input"
                                id="password" type="text" placeholder="database password">
                            @error('databasePassword')
                                <span class="text-xs font-medium text-rose-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex gap-3 mt-3">
                        <div class="w-1/2">
                            <label class="inline-block mt-3 mb-2 font-medium text-gray-700" for="dbname">
                                Name <span class="text-rose-500">*</span>
                            </label>
                            <input wire:model="databaseName" autocomplete="off"
                                class="w-full px-3 py-2 leading-tight text-gray-700 border border-gray-500 rounded form-input"
                                id="dbname" type="text" placeholder="database name">
                            @error('databaseName')
                                <span class="text-xs font-medium text-rose-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="w-1/2">
                            <label class="inline-block mt-3 mb-2 font-medium text-gray-700" for="port">
                                Port <span class="text-rose-500">*</span>
                            </label>
                            <input wire:model="databasePort" autocomplete="off"
                                class="w-full px-3 py-2 leading-tight text-gray-700 border border-gray-500 rounded form-input"
                                id="port" type="text" placeholder="3306">
                            @error('databasePort')
                                <span class="text-xs font-medium text-rose-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="inline-block mt-3 mb-2 font-medium text-gray-700" for="host">
                            Host <span class="text-rose-500">*</span>
                        </label>
                        <input wire:model="databaseHost" default="localhost" autocomplete="off"
                            class="w-full px-3 py-2 leading-tight text-gray-700 border border-gray-500 rounded form-input"
                            id="host" type="text" placeholder="localhost">
                        @error('databaseHost')
                            <span class="text-xs font-medium text-rose-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mt-6 text-right">
                        <hr />
                        <div class="flex items-center mt-6">
                            <span wire:loading class="flex-1 me-4">Creating database tables. Please wait...</span>
                            <button wire:loading.attr="disabled" wire:loading.class="opacity-50"
                                class="inline-flex items-center justify-center px-6 py-2 text-white bg-indigo-600 rounded cursor-pointer ms-auto">
                                <svg wire:loading id="spinner" xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 text-gray-100 me-2 animate-spin" viewBox="0 0 16 16"
                                    fill="none">
                                    <circle cx="8" cy="8" r="7" stroke="currentColor"
                                        stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke">
                                    </circle>
                                    <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                                </svg>
                                Next
                            </button>
                        </div>
                    </div>
                </form>
            @elseif ($stage == 2)
                <form wire:submit="submitAdmin">
                    <div class="mb-6">
                        <p class="mb-[.5] text-xl font-medium">3. Create admin user</p>
                        <p class="text-base">
                            Fill in the login & profile details for the admin.
                        </p>
                    </div>
                    <div class="mt-3">
                        <label class="inline-block mt-3 mb-2 font-medium text-gray-700" for="admin-username">
                            Username <span class="text-rose-500">*</span>
                        </label>
                        <input wire:model="adminUsername" autocomplete="off"
                            class="w-full px-3 py-2 leading-tight text-gray-700 border border-gray-500 rounded form-input"
                            id="admin-username" type="text" placeholder="specify username">
                        @error('adminUsername')
                            <span class="text-xs font-medium text-rose-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label class="inline-block mt-3 mb-2 font-medium text-gray-700" for="admin-email">
                            Email <span class="text-rose-500">*</span>
                        </label>
                        <input wire:model="adminEmail" autocomplete="off"
                            class="w-full px-3 py-2 leading-tight text-gray-700 border border-gray-500 rounded form-input"
                            id="admin-email" type="email" placeholder="example@gmail.com">
                        @error('adminEmail')
                            <span class="text-xs font-medium text-rose-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="flex gap-2 mt-3">
                        <div class="w-1/2">
                            <label class="inline-block mt-3 mb-2 font-medium text-gray-700" for="admin-password">
                                Password <span class="text-rose-500">*</span>
                            </label>
                            <input wire:model="adminPassword" autocomplete="off"
                                class="w-full px-3 py-2 leading-tight text-gray-700 border border-gray-500 rounded form-input"
                                id="admin-password" type="text" placeholder="choose password">
                            @error('adminPassword')
                                <span class="text-xs font-medium text-rose-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="w-1/2">
                            <label class="inline-block mt-3 mb-2 font-medium text-gray-700"
                                for="password-confirmation">
                                Confirm <span class="text-rose-500">*</span>
                            </label>
                            <input wire:model="adminPassword_confirmation" autocomplete="off"
                                class="w-full px-3 py-2 leading-tight text-gray-700 border border-gray-500 rounded form-input"
                                id="password-confirmation" type="text" placeholder="confirm password">
                            @error('adminPassword_confirmation')
                                <span class="text-xs font-medium text-rose-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="inline-block mt-3 mb-2 font-medium text-gray-700" for="web-url">
                            Website URL <span class="text-rose-500">*</span>
                        </label>
                        <input wire:model="url" default="{{ $this->url }}" autocomplete="off"
                            class="w-full px-3 py-2 leading-tight text-gray-700 border border-gray-500 rounded form-input"
                            id="web-url" type="text" placeholder="https://example.com">
                        @error('url')
                            <span class="text-xs font-medium text-rose-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mt-6 text-right">
                        <hr />
                        <button wire:loading.attr="disabled" wire:loading.class="opacity-50"
                            class="inline-flex items-center justify-center px-6 py-2 mt-6 text-white bg-indigo-600 rounded cursor-pointer">
                            <svg wire:loading id="spinner" xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5 text-gray-100 me-2 animate-spin" viewBox="0 0 16 16" fill="none">
                                <circle cx="8" cy="8" r="7" stroke="currentColor"
                                    stroke-opacity="0.25" stroke-width="2" vector-effect="non-scaling-stroke">
                                </circle>
                                <path d="M15 8a7.002 7.002 0 00-7-7" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" vector-effect="non-scaling-stroke"></path>
                            </svg>
                            Finish
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </section>
</div>
