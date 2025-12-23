<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class SettingService
{
    /**
     * Get a setting value.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        $settings = Session::get('settings', []);

        if (array_key_exists($key, $settings)) {
            return $settings[$key];
        }

        // Fallback to DB if not in session (though session should be populated on login)
        // ideally we might want to return default if we assume session is source of truth
        // but for safety let's check DB once or just return default.
        // Given the requirement "put into session... don't want to query everytime",
        // we should rely on session. But if the key is missing from session, it might be a new setting or truly missing.
        // Let's try to fetch from found settings in session, if not found return default.

        return $default;
    }

    /**
     * Set a setting value.
     *
     * @param string $key
     * @param mixed $value
     * @param string $group
     * @param string $type
     * @param int|null $userId
     * @return \App\Models\Setting
     */
    public function set(string $key, $value, string $group = 'general', string $type = 'string', ?int $userId = null)
    {
        $setting = Setting::updateOrCreate(
            ['key' => $key, 'user_id' => $userId],
            [
                'value' => $value,
                'group' => $group,
                'type' => $type,
            ]
        );

        // Update Session
        $settings = Session::get('settings', []);
        $settings[$key] = $value;
        Session::put('settings', $settings);

        return $setting;
    }

    /**
     * Load all settings into the session.
     *
     * @return void
     */
    public function loadSettingsToSession()
    {
        // Load global settings (user_id is null)
        // If we want user specific settings later, we can check Auth::id()
        // The schema has user_id nullable. For now assuming global settings for the app as per request 'Application Settings'.
        // If user specific settings are needed (like theme), we might need to merge or specific logic.
        // The prompt says "General Application Settings" but also "User & Role Management Settings".
        // And "All values should store in settings".
        // Let's load all settings where user_id is null for global, or maybe user_id is current user?
        // Let's assume global settings for now as most listed are app-wide.
        // Wait, "Theme color picker" might be user specific.
        // Let's load global settings first.

        $settings = Setting::whereNull('user_id')->pluck('value', 'key')->toArray();

        // If user is logged in, we could also look for user-specific overrides.
        // For now, let's stick to simple key-value load.

        Session::put('settings', $settings);
    }

    /**
     * Get instance of the service.
     */
    public static function make(): self
    {
        return new self();
    }
}
