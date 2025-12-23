<div class="space-y-6">
    <div>
        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Audit Logs & Activity</h3>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Configure system logging and data retention.
        </p>
    </div>

    <div class="space-y-6">
        <div class="flex items-center justify-between p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
            <div>
                <x-input-label for="audit_enabled" :value="__('Enable Activity Logging')" class="text-base" />
                <p class="text-sm text-gray-500">Track user actions and system events.</p>
            </div>
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" name="audit_enabled" value="1" class="sr-only peer" {{ setting('audit_enabled', true) ? 'checked' : '' }}>
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600"></div>
            </label>
        </div>

        <div>
            <x-input-label for="audit_retention" :value="__('Log Retention Duration')" />
            <select id="audit_retention" name="audit_retention" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="7" {{ setting('audit_retention') == '7' ? 'selected' : '' }}>7 Days</option>
                <option value="30" {{ setting('audit_retention') == '30' ? 'selected' : '' }}>30 Days</option>
                <option value="90" {{ setting('audit_retention') == '90' ? 'selected' : '' }}>90 Days</option>
                <option value="365" {{ setting('audit_retention') == '365' ? 'selected' : '' }}>1 Year</option>
                <option value="forever" {{ setting('audit_retention') == 'forever' ? 'selected' : '' }}>Forever</option>
            </select>
        </div>

        <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
            <h4 class="text-md font-medium text-gray-900 dark:text-gray-100 mb-4">Export Logs</h4>
            <div class="flex gap-4">
                <button type="button" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                    Export CSV
                </button>
                <button type="button" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                    Export PDF
                </button>
            </div>
        </div>
    </div>
</div>