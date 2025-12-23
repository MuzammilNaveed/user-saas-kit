<div class="space-y-6">
    <div>
        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">User & Role Management</h3>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Configure default settings for users.
        </p>
    </div>

    <div class="space-y-6">
        <!-- Default Role -->
        <div>
            <x-input-label for="user_default_role" :value="__('Default Role for New Users')" />
            <select id="user_default_role" name="user_default_role" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="">{{ __('None') }}</option>
                @foreach(\Spatie\Permission\Models\Role::all() as $role)
                <option value="{{ $role->name }}" {{ setting('user_default_role') == $role->name ? 'selected' : '' }}>
                    {{ ucfirst($role->name) }}
                </option>
                @endforeach
            </select>
            <p class="mt-1 text-sm text-gray-500">{{ __('Assign this role to newly registered users automatically.') }}</p>
        </div>

        <!-- User Self Deletion -->
        <div class="flex items-center justify-between p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
            <div>
                <x-input-label for="user_allow_self_delete" :value="__('Enable User Self-Deletion')" class="text-base" />
                <p class="text-sm text-gray-500">Allow users to delete their own accounts.</p>
            </div>
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" name="user_allow_self_delete" value="1" class="sr-only peer" {{ setting('user_allow_self_delete') ? 'checked' : '' }}>
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-indigo-600"></div>
            </label>
        </div>
    </div>
</div>