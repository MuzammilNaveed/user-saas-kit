<div class="space-y-6">
    <div>
        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Authentication & Security Settings</h3>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Manage social logins and security policies.
        </p>
    </div>

    <div class="space-y-6">
        <!-- Security Policies -->
        <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg space-y-4">
            <h4 class="text-md font-medium text-gray-900 dark:text-gray-100">Security Policies</h4>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- 2FA -->
                <div>
                    <x-input-label for="security_2fa_type" :value="__('Two-Factor Authentication')" />
                    <select id="security_2fa_type" name="security_2fa_type" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="disabled" {{ setting('security_2fa_type') == 'disabled' ? 'selected' : '' }}>Disabled</option>
                        <option value="email" {{ setting('security_2fa_type') == 'email' ? 'selected' : '' }}>Email</option>
                        <option value="otp" {{ setting('security_2fa_type') == 'otp' ? 'selected' : '' }}>Authenticator App (OTP)</option>
                    </select>
                </div>

                <!-- Login Limits -->
                <div>
                    <x-input-label for="security_login_attempts" :value="__('Login Attempt Limit')" />
                    <x-text-input id="security_login_attempts" name="security_login_attempts" type="number" class="mt-1 block w-full" :value="setting('security_login_attempts', 5)" />
                </div>

                <!-- Lockout Duration -->
                <div>
                    <x-input-label for="security_lockout_minutes" :value="__('Account Lockout (Minutes)')" />
                    <x-text-input id="security_lockout_minutes" name="security_lockout_minutes" type="number" class="mt-1 block w-full" :value="setting('security_lockout_minutes', 15)" />
                </div>
            </div>
        </div>

        <!-- IP Whitelist/Blacklist -->
        <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg space-y-4">
            <h4 class="text-md font-medium text-gray-900 dark:text-gray-100">IP Restrictions</h4>
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <x-input-label for="security_ip_whitelist" :value="__('IP Whitelist (One per line)')" />
                    <x-text-area id="security_ip_whitelist" name="security_ip_whitelist" class="mt-1 block w-full" rows="3">{{ setting('security_ip_whitelist') }}</x-text-area>
                </div>
                <div>
                    <x-input-label for="security_ip_blacklist" :value="__('IP Blacklist (One per line)')" />
                    <x-text-area id="security_ip_blacklist" name="security_ip_blacklist" class="mt-1 block w-full" rows="3">{{ setting('security_ip_blacklist') }}</x-text-area>
                </div>
            </div>
        </div>

        <!-- Force Logout -->
        <div class="p-4 border border-red-200 dark:border-red-900 rounded-lg bg-red-50 dark:bg-red-900/20">
            <div class="flex items-center justify-between">
                <div>
                    <h4 class="text-md font-medium text-red-800 dark:text-red-200">Force Logout</h4>
                    <p class="text-sm text-red-600 dark:text-red-400">Force logout all users from all devices.</p>
                </div>
                <button type="button" onclick="alert('This would trigger a session flush for all users. (Implementation pending)')" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Flash All Sessions
                </button>
            </div>
        </div>
    </div>
</div>