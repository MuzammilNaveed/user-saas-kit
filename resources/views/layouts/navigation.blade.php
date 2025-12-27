<aside x-bind:class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="background-color fixed inset-y-0 left-0 z-50 w-64 transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static flex flex-col">
    <!-- Logo -->
    <div class="flex items-center gap-2 px-4 py-6">
        @if(setting('app_logo'))
        <img src="{{ Storage::url(setting('app_logo')) }}" alt="{{ setting('app_name', config('app.name')) }}" class="w-8 h-8 rounded-full object-cover">
        @else
        <div class="w-6 h-6 rounded-full border-2 border-black"></div>
        @endif
        <span class="font-semibold text-base">{{ setting('app_name', config('app.name', 'Acme Inc.')) }}</span>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-3 space-y-1 overflow-y-auto">

        <!-- Main Navigation -->
        <a href="{{ route('dashboard') }}" @class(['nav-link', 'active'=> Route::is('dashboard')])>
            <x-lucide-layout-dashboard class="w-4 h-4 text-gray-600" />
            {{ __("navigation.dashboard") }}
        </a>

        <a href="{{ route('users.index') }}" @class(['nav-link', 'active'=> Route::is('users.*')])>
            <x-lucide-users class="w-4 h-4 text-gray-600" />
            {{ __("navigation.users") }}
        </a>

        <a href="{{ route("roles.index") }}" @class(['nav-link', 'active'=> Route::is('roles.index')])>
            <x-lucide-cable class="w-4 h-4 text-gray-600" />
            {{ __("navigation.roles") }}
        </a>

        <a href="{{ route("permissions.index") }}" @class(['nav-link', 'active'=> Route::is('permissions.index')])>
            <x-lucide-key class="w-4 h-4 text-gray-600" />
            {{ __("navigation.permissions") }}
        </a>

        <a href="{{ route("media.index") }}" @class(['nav-link', 'active'=> Route::is('media.index')])>
            <x-lucide-image-play class="w-4 h-4 text-gray-600" />
            {{ __("navigation.media_manager") }}
        </a>

        <a href="{{ route("activity_log.index") }}" @class(['nav-link', 'active'=> Route::is('activity_log.index')])>
            <x-lucide-logs class="w-4 h-4 text-gray-600" />
            {{ __("navigation.activity_logs") }}
        </a>

        <a href="{{ route("plans.index") }}" @class(['nav-link', 'active'=> Route::is('plans.*')])>
            <x-lucide-credit-card class="w-4 h-4 text-gray-600" />
            Plans
        </a>
    </nav>

    <!-- Bottom Section -->
    <div class="px-3 py-4 space-y-1">
        <a href="{{ route("settings.index") }}" @class(['nav-link', 'active'=> Route::is('settings.index')])>
            <x-lucide-settings class="w-4 h-4 text-gray-600" />
            {{ __("navigation.settings") }}
        </a>

        <a href="{{ route("subscriptions.index") }}" @class(['nav-link', 'active'=> Route::is('subscriptions.*')])>
            <x-lucide-sparkles class="w-4 h-4 text-gray-600" />
            Subscriptions
        </a>

        <!-- User Profile -->
        <div class="flex items-center gap-3 px-3 py-3 mt-4">
            <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-black font-medium text-sm">
                {{ substr(auth()->user()->name, 0, 1) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900 truncate">{{ auth()->user()->name}}</p>
                <p class="text-xs text-gray-500 truncate">{{auth()->user()->email}}</p>
            </div>
            <button class="text-gray-400 hover:text-gray-600">
                <x-lucide-ellipsis-vertical class="w-4 h-4 text-gray-600" />
            </button>
        </div>
    </div>
</aside>