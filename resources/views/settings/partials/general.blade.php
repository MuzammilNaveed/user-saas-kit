<div class="space-y-6">
    <div>
        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">General Settings</h3>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Configure the basic settings for your application.
        </p>
    </div>

    <div class="grid grid-cols-1 gap-6">
        <!-- Application Name -->
        <div>
            <x-input-label for="app_name" :value="__('Application Name')" />
            <x-text-input id="app_name" name="app_name" type="text" class="mt-1 block w-full" :value="setting('app_name', config('app.name'))" required autofocus autocomplete="app_name" />
        </div>

        <!-- Logo & Favicon -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- App Logo -->
            <div x-data="{ photoName: null, photoPreview: null }">
                <x-input-label for="app_logo" :value="__('Application Logo')" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    @if(setting('app_logo'))
                    <img src="{{ Storage::url(setting('app_logo')) }}" alt="Logo" class="h-20 w-20 object-cover rounded-full">
                    @else
                    <div class="h-20 w-20 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center text-gray-400">
                        <x-lucide-image class="w-8 h-8" />
                    </div>
                    @endif
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2 relative inline-block" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                    <button type="button" class="absolute top-0 right-0 bg-red-500 text-white rounded-full p-1 shadow-sm hover:bg-red-600 transition" x-on:click="photoPreview = null; photoName = null; document.getElementById('app_logo').value = null;">
                        <x-lucide-x class="w-3 h-3" />
                    </button>
                </div>

                <div class="mt-2">
                    <input type="file" id="app_logo" name="app_logo" class="hidden"
                        x-ref="photo"
                        x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                    <x-secondary-button class="mt-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select a New Logo') }}
                    </x-secondary-button>
                </div>
                <p class="mt-1 text-xs text-gray-500">Recommended size: 512x512px (PNG, JPG).</p>
            </div>

            <!-- Favicon -->
            <div x-data="{ photoName: null, photoPreview: null }">
                <x-input-label for="app_favicon" :value="__('Favicon')" />

                <div class="mt-2" x-show="! photoPreview">
                    @if(setting('app_favicon'))
                    <img src="{{ Storage::url(setting('app_favicon')) }}" alt="Favicon" class="h-10 w-10 object-cover">
                    @else
                    <div class="h-10 w-10 bg-gray-200 dark:bg-gray-700 rounded flex items-center justify-center text-gray-400">
                        <x-lucide-image class="w-5 h-5" />
                    </div>
                    @endif
                </div>

                <div class="mt-2 relative inline-block" x-show="photoPreview" style="display: none;">
                    <span class="block w-10 h-10 bg-cover bg-no-repeat bg-center"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                    <button type="button" class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full p-0.5 shadow-sm hover:bg-red-600 transition" x-on:click="photoPreview = null; photoName = null; document.getElementById('app_favicon').value = null;">
                        <x-lucide-x class="w-2 h-2" />
                    </button>
                </div>

                <div class="mt-2">
                    <input type="file" id="app_favicon" name="app_favicon" class="hidden"
                        x-ref="photo"
                        x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                    <x-secondary-button class="mt-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select Favicon') }}
                    </x-secondary-button>
                </div>
                <p class="mt-1 text-xs text-gray-500">Recommended size: 32x32px or 16x16px (PNG, ICO).</p>
            </div>
        </div>

        <!-- Timezone & Date Format -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <x-input-label for="app_timezone" :value="__('Timezone')" />
                <select id="app_timezone" name="app_timezone" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    @foreach(timezone_identifiers_list() as $timezone)
                    <option value="{{ $timezone }}" {{ setting('app_timezone', config('app.timezone')) == $timezone ? 'selected' : '' }}>
                        {{ $timezone }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div>
                <x-input-label for="app_date_format" :value="__('Date Format')" />
                <select id="app_date_format" name="app_date_format" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value="F j, Y" {{ setting('app_date_format', 'F j, Y') == 'F j, Y' ? 'selected' : '' }}>October 7, 2025</option>
                    <option value="Y-m-d" {{ setting('app_date_format') == 'Y-m-d' ? 'selected' : '' }}>2025-10-07</option>
                    <option value="d/m/Y" {{ setting('app_date_format') == 'd/m/Y' ? 'selected' : '' }}>07/10/2025</option>
                    <option value="m/d/Y" {{ setting('app_date_format') == 'm/d/Y' ? 'selected' : '' }}>10/07/2025</option>
                </select>
            </div>
        </div>

        <!-- Language -->
        <div>
            <x-input-label for="app_locale" :value="__('Default Language')" />
            <select id="app_locale" name="app_locale" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="en" {{ setting('app_locale', config('app.locale')) == 'en' ? 'selected' : '' }}>English</option>
                <option value="es" {{ setting('app_locale') == 'es' ? 'selected' : '' }}>Spanish</option>
                <option value="fr" {{ setting('app_locale') == 'fr' ? 'selected' : '' }}>French</option>
                <!-- Add more languages as needed -->
            </select>
        </div>

        <!-- Maintenance Mode -->
        <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg" x-data="{ maintenance: {{ setting('maintenance_mode') ? 'true' : 'false' }} }">
            <div class="flex items-center justify-between">
                <div>
                    <x-input-label for="maintenance_mode" :value="__('Maintenance Mode')" class="text-base" />
                    <p class="text-sm text-gray-500">Put the application into maintenance mode.</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="maintenance_mode" value="1" class="sr-only peer" x-model="maintenance">
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600"></div>
                </label>
            </div>

            <div class="mt-4" x-show="maintenance" x-transition>
                <x-input-label for="maintenance_message" :value="__('Custom Maintenance Message')" />
                <x-text-area id="maintenance_message" name="maintenance_message" class="mt-1 block w-full" rows="3">{{ setting('maintenance_message') }}</x-text-area>
            </div>
        </div>
    </div>
</div>