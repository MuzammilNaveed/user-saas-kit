<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex h-screen overflow-hidden relative" x-data="{ sidebarOpen: false }">

        <div x-show="sidebarOpen" x-transition.opacity.duration.300ms
            class="fixed inset-0 bg-black bg-opacity-75 z-40 lg:hidden" @click="sidebarOpen = false"></div>

        @include('layouts.navigation')


        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <div class="p-2">
                <!-- White Rounded Container -->
                <div class="bg-white rounded-[12px] shadow-sm border">
                    <!-- Header -->
                    <header
                        class="flex items-center rounded-t-[12px] justify-between px-6 py-2 border-b border-gray-100 backdrop-blur-md sticky top-0 z-10">
                        <div class="flex items-center gap-4">
                            <!-- Mobile Menu Button -->
                            <button @click="sidebarOpen = !sidebarOpen"
                                class="lg:hidden text-gray-600 hover:text-gray-900">
                                <x-lucide-panel-right class="w-5 h-5 text-gray-600" />
                            </button>
                            <h1 class="text-lg font-medium text-gray-900">
                                @yield('headerTitle')
                            </h1>
                        </div>
                        <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-900">GitHub</a>
                    </header>

                    <!-- Content -->
                    <div class="p-6 space-y-6 min-h-[calc(100vh-4rem)]">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </main>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.select2').select2({
                placeholder: 'Select an option',
                minimumResultsForSearch: Infinity
            });
            $('.searchable-select2').select2({
                placeholder: 'Select an option',
            });
        });
    </script>
</body>

</html>
