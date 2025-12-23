<div class="space-y-6">
    <div>
        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Data & System Settings</h3>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            System maintenance and storage configuration.
        </p>
    </div>

    <div class="space-y-8">
        <!-- Database Backup -->
        <div class="space-y-4">
            <h4 class="text-md font-medium text-gray-900 dark:text-gray-100">Database Backup</h4>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <x-input-label for="system_backup_schedule" :value="__('Scheduled Backup')" />
                    <select id="system_backup_schedule" name="system_backup_schedule" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="never" {{ setting('system_backup_schedule') == 'never' ? 'selected' : '' }}>Never</option>
                        <option value="daily" {{ setting('system_backup_schedule') == 'daily' ? 'selected' : '' }}>Daily</option>
                        <option value="weekly" {{ setting('system_backup_schedule') == 'weekly' ? 'selected' : '' }}>Weekly</option>
                        <option value="monthly" {{ setting('system_backup_schedule') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                    </select>
                </div>

                <div class="flex items-end">
                    <button type="button" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 h-10 mb-[2px]">
                        Run Manual Backup
                    </button>
                </div>
            </div>
        </div>

        <!-- Storage Settings -->
        <div class="space-y-4 border-t border-gray-200 dark:border-gray-700 pt-6">
            <h4 class="text-md font-medium text-gray-900 dark:text-gray-100">Storage Configuration</h4>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <x-input-label for="system_storage_disk" :value="__('Storage Disk')" />
                    <select id="system_storage_disk" name="system_storage_disk" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="local" {{ setting('system_storage_disk') == 'local' ? 'selected' : '' }}>Local (Public)</option>
                        <option value="s3" {{ setting('system_storage_disk') == 's3' ? 'selected' : '' }}>Amazon S3</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <x-input-label for="system_upload_limit" :value="__('Max File Upload Size (MB)')" />
                    <x-text-input id="system_upload_limit" name="system_upload_limit" type="number" class="mt-1 block w-full" :value="setting('system_upload_limit', 10)" />
                </div>
                <div>
                    <x-input-label for="system_allowed_types" :value="__('Allowed File Types (comma separated)')" />
                    <x-text-input id="system_allowed_types" name="system_allowed_types" type="text" class="mt-1 block w-full" :value="setting('system_allowed_types', 'jpg,png,pdf,docx')" />
                </div>
            </div>
        </div>

        <!-- System Actions -->
        <div class="space-y-4 border-t border-gray-200 dark:border-gray-700 pt-6">
            <h4 class="text-md font-medium text-gray-900 dark:text-gray-100">System Actions</h4>
            <div class="flex gap-4 flex-wrap">
                <button type="button" class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-500 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Clear Application Cache
                </button>
                <button type="button" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Check System Health
                </button>
            </div>
        </div>
    </div>
</div>