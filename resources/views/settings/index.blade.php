@section('headerTitle')
{{ __('settings.settings') }}
@endsection

@php
$tab = request()->query('tab', 'general');
$tabs = [
'general' => ['label' => 'General', 'icon' => 'lucide-settings'],
'security' => ['label' => 'Authentication & Security', 'icon' => 'lucide-shield'],
'user' => ['label' => 'User & Role Management', 'icon' => 'lucide-users'],
'appearance' => ['label' => 'Appearance', 'icon' => 'lucide-palette'],
'localization' => ['label' => 'Localization', 'icon' => 'lucide-globe'],
'audit' => ['label' => 'Audit Logs', 'icon' => 'lucide-file-text'],
'system' => ['label' => 'Data & System', 'icon' => 'lucide-database'],
];
@endphp

<x-app-layout>
    <div class="space-y-4 lg:space-y-6 p-5">
        <div class="space-y-0.5">
            <h2 class="text-2xl font-bold tracking-tight">Settings</h2>
            <p class="text-muted-foreground">Manage your application settings.</p>
        </div>
        <div class="flex flex-col space-y-8 lg:flex-row lg:space-y-0 lg:space-x-8">
            <aside class="lg:w-64 shrink-0">
                <nav class="flex lg:flex-col lg:space-x-0 lg:space-y-1 space-x-2 overflow-x-auto pb-2 lg:pb-0" aria-label="Tabs">
                    @foreach($tabs as $key => $item)
                    <a href="{{ route('settings.index', ['tab' => $key]) }}"
                        class="{{ $tab === $key ? 'bg-gray-100' : '' }} hover:bg-gray-100 group flex items-center px-3 py-2 text-sm font-medium rounded-md whitespace-nowrap {{ $tab === $key ? 'text-primary' : 'text-muted-foreground' }}">
                        <x-dynamic-component :component="$item['icon']" class="{{ $tab === $key ? 'text-primary' : 'text-muted-foreground group-hover:text-primary' }} -ml-1 mr-3 h-5 w-5 flex-shrink-0" />
                        <span class="truncate">{{ $item['label'] }}</span>
                    </a>
                    @endforeach
                </nav>
            </aside>
            <div class="flex-1 lg:max-w-4xl">
                <div class="bg-card text-card-foreground rounded-xl border shadow-sm">
                    <div class="p-6">
                        <form method="POST" action="{{ route('settings.update', ['tab' => $tab]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Resource controller uses PUT/PATCH for update -->

                            <!-- Hidden input to persist tab on error/redirect if needed, though route param handles it -->
                            <input type="hidden" name="tab" value="{{ $tab }}">

                            @includeIf('settings.partials.' . $tab)

                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                @if(session('success'))
                                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-green-600 dark:text-green-400">
                                    {{ session('success') }}
                                </div>
                                @endif

                                <x-primary-button>{{ __('Save Changes') }}</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>