<div class="space-y-6">
    <div>
        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Localization & Language</h3>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Manage language support and localization preferences.
        </p>
    </div>

    <div class="space-y-6">
        <div class="flex items-center justify-between p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
            <div>
                <x-input-label for="localization_multi_language" :value="__('Enable Multi-language Support')" class="text-base" />
                <p class="text-sm text-gray-500">Allow users to switch between languages.</p>
            </div>
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" name="localization_multi_language" value="1" class="sr-only peer" {{ setting('localization_multi_language') ? 'checked' : '' }}>
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600"></div>
            </label>
        </div>

        <div class="flex items-center justify-between p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
            <div>
                <x-input-label for="localization_show_switcher" :value="__('Show Language Switcher')" class="text-base" />
                <p class="text-sm text-gray-500">Display a language switcher in the header/footer.</p>
            </div>
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" name="localization_show_switcher" value="1" class="sr-only peer" {{ setting('localization_show_switcher') ? 'checked' : '' }}>
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600"></div>
            </label>
        </div>

        <div>
            <x-input-label for="localization_fallback_language" :value="__('Fallback Language')" />
            <select id="localization_fallback_language" name="localization_fallback_language" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="en" {{ setting('localization_fallback_language') == 'en' ? 'selected' : '' }}>English</option>
                <option value="es" {{ setting('localization_fallback_language') == 'es' ? 'selected' : '' }}>Spanish</option>
                <option value="fr" {{ setting('localization_fallback_language') == 'fr' ? 'selected' : '' }}>French</option>
            </select>
            <p class="mt-1 text-sm text-gray-500">Used when a translation is missing.</p>
        </div>
    </div>
</div>