<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charSet="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: "Roboto", sans-serif !important;
        }
    </style>
</head>

<body class="bg-[#f4f5f6] font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar"
            class="bg-[#f4f5f6] fixed inset-y-0 left-0 z-50 w-64 transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static flex flex-col">
            <!-- Logo -->
            <div class="flex items-center gap-2 px-4 py-6">
                <div class="w-6 h-6 rounded-full border-2 border-black"></div>
                <span class="font-semibold text-base">Acme Inc.</span>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-3 space-y-1 overflow-y-auto">

                <!-- Main Navigation -->
                <a href="#"
                    class="flex items-center gap-3 px-3 py-2 text-sm text-gray-700 hover:bg-gray-200 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" stroke-width="2" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v8m-4-4h8" />
                    </svg>
                    Dashboard
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-3 py-2 text-sm text-gray-700 hover:bg-gray-200 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    Lifecycle
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-3 py-2 text-sm text-gray-700 hover:bg-gray-200 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    Analytics
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-3 py-2 text-sm text-gray-700 hover:bg-gray-200 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                    </svg>
                    Projects
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-3 py-2 text-sm text-gray-700 hover:bg-gray-200 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Team
                </a>

                <!-- Documents Section -->
                <div class="pt-6">
                    <p class="px-3 text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Documents</p>

                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2 text-sm text-gray-700 hover:bg-gray-200 rounded-lg transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        Data Library
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2 text-sm text-gray-700 hover:bg-gray-200 rounded-lg transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Reports
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2 text-sm text-gray-700 hover:bg-gray-200 rounded-lg transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Word Assistant
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-3 py-2 text-sm text-gray-700 hover:bg-gray-200 rounded-lg transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                        </svg>
                        More
                    </a>
                </div>
            </nav>

            <!-- Bottom Section -->
            <div class="px-3 py-4 space-y-1">
                <a href="#"
                    class="flex items-center gap-3 px-3 py-2 text-sm text-gray-700 hover:bg-gray-200 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Settings
                </a>

                <!-- User Profile -->
                <div class="flex items-center gap-3 px-3 py-3 mt-4">
                    <img src="/placeholder.svg?height=32&width=32" alt="User"
                        class="w-8 h-8 rounded-full bg-gray-300">
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate">shadcn</p>
                        <p class="text-xs text-gray-500 truncate">m@example.com</p>
                    </div>
                    <button class="text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="5" r="1.5" />
                            <circle cx="12" cy="12" r="1.5" />
                            <circle cx="12" cy="19" r="1.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </aside>

        <!-- Mobile Sidebar Overlay -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <div class="p-2">
                <!-- White Rounded Container -->
                <div class="bg-white rounded-[12px] shadow-sm border">
                    <!-- Header -->
                    <div
                        class="flex items-center rounded-t-[12px] justify-between px-6 py-2 border-b border-gray-100 backdrop-blur-md sticky top-0 z-10">
                        <div class="flex items-center gap-4">
                            <!-- Mobile Menu Button -->
                            <button id="mobile-menu-btn" class="lg:hidden text-gray-600 hover:text-gray-900">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>

                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h1 class="text-lg font-semibold text-gray-900">Documents</h1>
                        </div>
                        <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-900">GitHub</a>
                    </div>

                    <!-- Content -->
                    <div class="p-6 space-y-6">
                        <!-- Metric Cards -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                            <!-- Total Revenue Card -->
                            <div class="bg-gray-50 rounded-lg p-5 space-y-3">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm text-gray-600">Total Revenue</p>
                                    <div class="flex items-center gap-1 text-xs font-medium text-green-600">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                        </svg>
                                        +12.5%
                                    </div>
                                </div>
                                <p class="text-3xl font-bold text-gray-900">$1,250.00</p>
                                <div class="space-y-1">
                                    <div class="flex items-center gap-1 text-xs font-medium text-gray-900">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                        </svg>
                                        Trending up this month
                                    </div>
                                    <p class="text-xs text-gray-500">Visitors for the last 6 months</p>
                                </div>
                            </div>

                            <!-- New Customers Card -->
                            <div class="bg-gray-50 rounded-lg p-5 space-y-3">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm text-gray-600">New Customers</p>
                                    <div class="flex items-center gap-1 text-xs font-medium text-red-600">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                                        </svg>
                                        -20%
                                    </div>
                                </div>
                                <p class="text-3xl font-bold text-gray-900">1,234</p>
                                <div class="space-y-1">
                                    <div class="flex items-center gap-1 text-xs font-medium text-gray-900">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                                        </svg>
                                        Down 20% this period
                                    </div>
                                    <p class="text-xs text-gray-500">Acquisition needs attention</p>
                                </div>
                            </div>

                            <!-- Active Accounts Card -->
                            <div class="bg-gray-50 rounded-lg p-5 space-y-3">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm text-gray-600">Active Accounts</p>
                                    <div class="flex items-center gap-1 text-xs font-medium text-green-600">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                        </svg>
                                        +12.5%
                                    </div>
                                </div>
                                <p class="text-3xl font-bold text-gray-900">45,678</p>
                                <div class="space-y-1">
                                    <div class="flex items-center gap-1 text-xs font-medium text-gray-900">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                        </svg>
                                        Strong user retention
                                    </div>
                                    <p class="text-xs text-gray-500">Engagement exceed targets</p>
                                </div>
                            </div>

                            <!-- Growth Rate Card -->
                            <div class="bg-gray-50 rounded-lg p-5 space-y-3">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm text-gray-600">Growth Rate</p>
                                    <div class="flex items-center gap-1 text-xs font-medium text-green-600">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                        </svg>
                                        +4.5%
                                    </div>
                                </div>
                                <p class="text-3xl font-bold text-gray-900">4.5%</p>
                                <div class="space-y-1">
                                    <div class="flex items-center gap-1 text-xs font-medium text-gray-900">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                        </svg>
                                        Steady performance increase
                                    </div>
                                    <p class="text-xs text-gray-500">Meets growth projections</p>
                                </div>
                            </div>
                        </div>

                        <!-- Chart Section -->
                        <div class="bg-gray-50 rounded-lg p-6 space-y-4">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                <div>
                                    <h2 class="text-lg font-semibold text-gray-900">Total Visitors</h2>
                                    <p class="text-sm text-gray-500">Total for the last 3 months</p>
                                </div>
                                <div class="flex gap-2">
                                    <button
                                        class="px-3 py-1.5 text-xs font-medium text-gray-900 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                                        Last 3 months
                                    </button>
                                    <button
                                        class="px-3 py-1.5 text-xs font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-md">
                                        Last 30 days
                                    </button>
                                    <button
                                        class="px-3 py-1.5 text-xs font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-md">
                                        Last 7 days
                                    </button>
                                </div>
                            </div>

                            <!-- Chart Placeholder -->
                            <div class="relative h-64 sm:h-80 bg-white rounded-lg p-4">

                                <!-- X-axis labels -->
                                <div
                                    class="absolute bottom-0 left-0 right-0 flex justify-between px-4 text-xs text-gray-500">
                                    <span>Apr 6</span>
                                    <span class="hidden sm:inline">Apr 12</span>
                                    <span>Apr 18</span>
                                    <span class="hidden sm:inline">Apr 24</span>
                                    <span class="hidden md:inline">Apr 30</span>
                                    <span class="hidden md:inline">May 6</span>
                                    <span class="hidden lg:inline">May 12</span>
                                    <span class="hidden lg:inline">May 18</span>
                                    <span class="hidden lg:inline">May 24</span>
                                    <span class="hidden lg:inline">May 30</span>
                                    <span class="hidden xl:inline">Jun 5</span>
                                    <span class="hidden xl:inline">Jun 11</span>
                                    <span class="hidden xl:inline">Jun 17</span>
                                    <span class="hidden xl:inline">Jun 23</span>
                                    <span>Jun 30</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebar-overlay');

        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
            sidebarOverlay.classList.toggle('hidden');
        }

        mobileMenuBtn.addEventListener('click', toggleSidebar);
        sidebarOverlay.addEventListener('click', toggleSidebar);

        // Close sidebar on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !sidebar.classList.contains('-translate-x-full')) {
                toggleSidebar();
            }
        });
    </script>
</body>

</html>
