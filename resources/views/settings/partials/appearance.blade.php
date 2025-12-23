<div class="space-y-6">
    <div>
        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Appearance Settings</h3>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Customize the look and feel of the application.
        </p>
    </div>

    <div class="space-y-6">
        <!-- Theme Mode -->
        <div x-data="{ theme: '{{ setting('appearance_theme_mode', 'system') }}' }">
            <x-input-label for="appearance_theme_mode" :value="__('Theme Mode')" />
            <p class="text-sm text-gray-500 mb-4">{{ __('Select the theme for the dashboard.') }}</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Light Mode -->
                <label class="cursor-pointer">
                    <input type="radio" name="appearance_theme_mode" value="light" class="peer sr-only" x-model="theme">
                    <div class="rounded-lg border-2 border-muted hover:border-indigo-500 peer-checked:border-indigo-600 peer-checked:ring-2 peer-checked:ring-indigo-600 transition-all p-1">
                        <div class="space-y-2 rounded bg-[#f3f4f6] p-2">
                            <div class="space-y-2 rounded-md bg-white p-2 shadow-sm">
                                <div class="h-2 w-[80px] rounded-lg bg-[#ecedef]"></div>
                                <div class="h-2 w-[100px] rounded-lg bg-[#ecedef]"></div>
                            </div>
                            <div class="flex items-center space-x-2 rounded-md bg-white p-2 shadow-sm">
                                <div class="h-4 w-4 rounded-full bg-[#ecedef]"></div>
                                <div class="h-2 w-[100px] rounded-lg bg-[#ecedef]"></div>
                            </div>
                            <div class="flex items-center space-x-2 rounded-md bg-white p-2 shadow-sm">
                                <div class="h-4 w-4 rounded-full bg-[#ecedef]"></div>
                                <div class="h-2 w-[100px] rounded-lg bg-[#ecedef]"></div>
                            </div>
                        </div>
                    </div>
                    <span class="block w-full text-center text-sm font-medium mt-2 text-gray-900 dark:text-gray-100">{{ __('Light') }}</span>
                </label>

                <!-- Dark Mode -->
                <label class="cursor-pointer">
                    <input type="radio" name="appearance_theme_mode" value="dark" class="peer sr-only" x-model="theme">
                    <div class="rounded-lg border-2 border-muted hover:border-indigo-500 peer-checked:border-indigo-600 peer-checked:ring-2 peer-checked:ring-indigo-600 transition-all p-1 bg-slate-950">
                        <div class="space-y-2 rounded bg-slate-800 p-2">
                            <div class="space-y-2 rounded-md bg-slate-950 p-2 shadow-sm">
                                <div class="h-2 w-[80px] rounded-lg bg-slate-800"></div>
                                <div class="h-2 w-[100px] rounded-lg bg-slate-800"></div>
                            </div>
                            <div class="flex items-center space-x-2 rounded-md bg-slate-950 p-2 shadow-sm">
                                <div class="h-4 w-4 rounded-full bg-slate-800"></div>
                                <div class="h-2 w-[100px] rounded-lg bg-slate-800"></div>
                            </div>
                            <div class="flex items-center space-x-2 rounded-md bg-slate-950 p-2 shadow-sm">
                                <div class="h-4 w-4 rounded-full bg-slate-800"></div>
                                <div class="h-2 w-[100px] rounded-lg bg-slate-800"></div>
                            </div>
                        </div>
                    </div>
                    <span class="block w-full text-center text-sm font-medium mt-2 text-gray-900 dark:text-gray-100">{{ __('Dark') }}</span>
                </label>

                <!-- System Mode -->
                <label class="cursor-pointer">
                    <input type="radio" name="appearance_theme_mode" value="system" class="peer sr-only" x-model="theme">
                    <div class="rounded-lg border-2 border-muted hover:border-indigo-500 peer-checked:border-indigo-600 peer-checked:ring-2 peer-checked:ring-indigo-600 transition-all p-1 bg-slate-950">
                        <div class="flex h-full items-center justify-center rounded bg-zinc-950">
                            <div class="relative w-full p-2 space-y-2">
                                <div class="flex items-center space-x-2 rounded-md bg-zinc-800 p-2 shadow-sm">
                                    <div class="h-4 w-4 rounded-full bg-slate-400"></div>
                                    <div class="h-2 w-[100px] rounded-lg bg-slate-400"></div>
                                </div>
                                <div class="flex items-center space-x-2 rounded-md bg-white p-2 shadow-sm">
                                    <div class="h-4 w-4 rounded-full bg-[#ecedef]"></div>
                                    <div class="h-2 w-[100px] rounded-lg bg-[#ecedef]"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="block w-full text-center text-sm font-medium mt-2 text-gray-900 dark:text-gray-100">{{ __('System') }}</span>
                </label>
            </div>
        </div>

        <!-- Sidebar Layout -->
        <div>
            <x-input-label for="appearance_sidebar_layout" :value="__('Sidebar Layout')" />
            <select id="appearance_sidebar_layout" name="appearance_sidebar_layout" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="default" {{ setting('appearance_sidebar_layout') == 'default' ? 'selected' : '' }}>Default (Vertical)</option>
                <option value="collapsed" {{ setting('appearance_sidebar_layout') == 'collapsed' ? 'selected' : '' }}>Collapsed</option>
                <option value="horizontal" {{ setting('appearance_sidebar_layout') == 'horizontal' ? 'selected' : '' }}>Horizontal (Top)</option>
            </select>
        </div>

        <!-- Fonts -->
        <div>
            <x-input-label for="appearance_font" :value="__('Font Family')" />
            <select id="appearance_font" name="appearance_font" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="Inter" {{ setting('appearance_font') == 'Inter' ? 'selected' : '' }}>Inter</option>
                <option value="Roboto" {{ setting('appearance_font') == 'Roboto' ? 'selected' : '' }}>Roboto</option>
                <option value="Open Sans" {{ setting('appearance_font') == 'Open Sans' ? 'selected' : '' }}>Open Sans</option>
                <option value="Lato" {{ setting('appearance_font') == 'Lato' ? 'selected' : '' }}>Lato</option>
            </select>
        </div>

        <!-- Customization Section -->
        <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
            <h4 class="text-md font-medium text-gray-900 dark:text-gray-100 mb-4">Customization</h4>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Button Customization -->
                <div x-data="{ 
                    open: false, 
                    bgColor: '{{ setting('appearance_primary_color', '#4f46e5') }}', 
                    textColor: '{{ setting('appearance_button_text_color', '#ffffff') }}' 
                }">
                    <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 flex flex-col items-center justify-between h-full bg-white dark:bg-gray-900">
                        <div class="mb-4 w-full flex-1 flex items-center justify-center bg-gray-50 dark:bg-gray-800 rounded-md p-6">
                            <button type="button" class="px-4 py-2 rounded-md font-medium shadow-sm" x-bind:style="'background-color: ' + bgColor + '; color: ' + textColor + ';'">
                                Primary Button
                            </button>
                        </div>
                        <div class="w-full">
                            <h5 class="text-sm font-medium text-gray-900 dark:text-gray-100">Buttons</h5>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mb-3">Customize button style.</p>
                            <x-secondary-button x-on:click="open = true" class="w-full justify-center">
                                Customize
                            </x-secondary-button>
                        </div>
                    </div>

                    <!-- Button Modal -->
                    <div x-show="open" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" role="dialog" aria-modal="true">
                        <div class="flex min-h-screen items-center justify-center p-4">
                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" x-on:click="open = false"></div>

                            <div class="relative transform overflow-hidden rounded-lg bg-white dark:bg-gray-800 px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:w-full sm:max-w-lg sm:p-6">
                                <div>
                                    <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Customize Buttons</h3>
                                    <div class="mt-4 flex flex-col gap-6">
                                        <!-- Live Preview -->
                                        <div class="flex items-center justify-center p-8 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                                            <button type="button" class="px-6 py-2.5 rounded-md font-medium shadow-sm transition-all"
                                                x-bind:style="'background-color: ' + bgColor + '; color: ' + textColor + ';'">
                                                Button Preview
                                            </button>
                                        </div>

                                        <!-- Inputs -->
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <x-input-label :value="__('Background Color')" />
                                                <div class="flex gap-2 mt-1">
                                                    <input type="color" x-model="bgColor" class="h-9 w-9 p-0 border-0 rounded cursor-pointer">
                                                    <x-text-input type="text" x-model="bgColor" class="flex-1" />
                                                </div>
                                                <!-- Hidden real inputs -->
                                                <input type="hidden" name="appearance_primary_color" x-model="bgColor">
                                            </div>
                                            <div>
                                                <x-input-label :value="__('Text Color')" />
                                                <div class="flex gap-2 mt-1">
                                                    <input type="color" x-model="textColor" class="h-9 w-9 p-0 border-0 rounded cursor-pointer">
                                                    <x-text-input type="text" x-model="textColor" class="flex-1" />
                                                </div>
                                                <input type="hidden" name="appearance_button_text_color" x-model="textColor">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 sm:mt-6 flex justify-end gap-2">
                                    <x-secondary-button x-on:click="open = false">
                                        {{ __('Done') }}
                                    </x-secondary-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Secondary Button Customization -->
                <div x-data="{ 
                    open: false, 
                    bgColor: '{{ setting('appearance_secondary_color', '#6b7280') }}', 
                    textColor: '{{ setting('appearance_secondary_button_text_color', '#ffffff') }}' 
                }">
                    <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 flex flex-col items-center justify-between h-full bg-white dark:bg-gray-900">
                        <div class="mb-4 w-full flex-1 flex items-center justify-center bg-gray-50 dark:bg-gray-800 rounded-md p-6">
                            <button type="button" class="px-4 py-2 rounded-md font-medium shadow-sm border" x-bind:style="'background-color: ' + bgColor + '; color: ' + textColor + '; border-color: ' + bgColor + ';'">
                                Secondary Button
                            </button>
                        </div>
                        <div class="w-full">
                            <h5 class="text-sm font-medium text-gray-900 dark:text-gray-100">Secondary Buttons</h5>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mb-3">Customize secondary button style.</p>
                            <x-secondary-button x-on:click="open = true" class="w-full justify-center">
                                Customize
                            </x-secondary-button>
                        </div>
                    </div>

                    <!-- Secondary Button Modal -->
                    <div x-show="open" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" role="dialog" aria-modal="true">
                        <div class="flex min-h-screen items-center justify-center p-4">
                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" x-on:click="open = false"></div>

                            <div class="relative transform overflow-hidden rounded-lg bg-white dark:bg-gray-800 px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:w-full sm:max-w-lg sm:p-6">
                                <div>
                                    <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Customize Secondary Buttons</h3>
                                    <div class="mt-4 flex flex-col gap-6">
                                        <!-- Live Preview -->
                                        <div class="flex items-center justify-center p-8 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                                            <button type="button" class="px-6 py-2.5 rounded-md font-medium shadow-sm border transition-all"
                                                x-bind:style="'background-color: ' + bgColor + '; color: ' + textColor + '; border-color: ' + bgColor + ';'">
                                                Secondary Button Preview
                                            </button>
                                        </div>

                                        <!-- Inputs -->
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <x-input-label :value="__('Background Color')" />
                                                <div class="flex gap-2 mt-1">
                                                    <input type="color" x-model="bgColor" class="h-9 w-9 p-0 border-0 rounded cursor-pointer">
                                                    <x-text-input type="text" x-model="bgColor" class="flex-1" />
                                                </div>
                                                <!-- Hidden real inputs -->
                                                <input type="hidden" name="appearance_secondary_color" x-model="bgColor">
                                            </div>
                                            <div>
                                                <x-input-label :value="__('Text Color')" />
                                                <div class="flex gap-2 mt-1">
                                                    <input type="color" x-model="textColor" class="h-9 w-9 p-0 border-0 rounded cursor-pointer">
                                                    <x-text-input type="text" x-model="textColor" class="flex-1" />
                                                </div>
                                                <input type="hidden" name="appearance_secondary_button_text_color" x-model="textColor">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 sm:mt-6 flex justify-end gap-2">
                                    <x-secondary-button x-on:click="open = false">
                                        {{ __('Done') }}
                                    </x-secondary-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Layout Customization -->
                <div x-data="{ 
                    open: false, 
                    sidebarColor: '{{ setting('appearance_sidebar_color', '#ffffff') }}', 
                    mainColor: '{{ setting('appearance_main_color', '#f3f4f6') }}' 
                }">
                    <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 flex flex-col items-center justify-between h-full bg-white dark:bg-gray-900">
                        <div class="mb-4 w-full flex-1 flex items-center justify-center bg-gray-200 dark:bg-gray-800 rounded-md p-6 overflow-hidden">
                            <!-- Mini Layout Preview -->
                            <div class="flex w-32 h-20 rounded shadow-sm overflow-hidden border border-gray-300 dark:border-gray-600">
                                <div class="w-1/3 h-full" x-bind:style="'background-color: ' + sidebarColor + ';'"></div>
                                <div class="w-2/3 h-full flex flex-col" x-bind:style="'background-color: ' + mainColor + ';'">
                                    <div class="h-1/3 w-full border-b border-gray-300/20"></div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full">
                            <h5 class="text-sm font-medium text-gray-900 dark:text-gray-100">Layout</h5>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mb-3">Customize styles for sidebar & main area.</p>
                            <x-secondary-button x-on:click="open = true" class="w-full justify-center">
                                Customize
                            </x-secondary-button>
                        </div>
                    </div>

                    <!-- Layout Modal -->
                    <div x-show="open" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" role="dialog" aria-modal="true">
                        <div class="flex min-h-screen items-center justify-center p-4">
                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" x-on:click="open = false"></div>

                            <div class="relative transform overflow-hidden rounded-lg bg-white dark:bg-gray-800 px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:w-full sm:max-w-lg sm:p-6">
                                <div>
                                    <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Customize Layout</h3>
                                    <div class="mt-4 flex flex-col gap-6">
                                        <!-- Live Wireframe Preview -->
                                        <div class="relative flex h-48 w-full rounded-lg shadow-inner overflow-hidden border border-gray-200 dark:border-gray-600">
                                            <!-- Sidebar -->
                                            <div class="w-1/4 h-full border-r border-gray-200 dark:border-gray-700 flex flex-col gap-2 p-2 transition-colors duration-200"
                                                x-bind:style="'background-color: ' + sidebarColor + ';'">
                                                <div class="h-4 w-3/4 bg-gray-300/50 rounded"></div>
                                                <div class="h-2 w-full bg-gray-300/30 rounded mt-4"></div>
                                                <div class="h-2 w-full bg-gray-300/30 rounded"></div>
                                                <div class="h-2 w-2/3 bg-gray-300/30 rounded"></div>
                                            </div>
                                            <!-- Main Content -->
                                            <div class="flex-1 h-full flex flex-col transition-colors duration-200 rounded-tl-3xl overflow-hidden"
                                                x-bind:style="'background-color: ' + mainColor + ';'">
                                                <!-- Header -->
                                                <div class="h-10 w-full border-b border-gray-200 dark:border-gray-700 bg-white/50 backdrop-blur-sm"></div>
                                                <!-- Body -->
                                                <div class="p-4 gap-2 flex flex-col">
                                                    <div class="flex gap-4">
                                                        <div class="h-20 w-1/3 bg-white/60 rounded shadow-sm"></div>
                                                        <div class="h-20 w-1/3 bg-white/60 rounded shadow-sm"></div>
                                                        <div class="h-20 w-1/3 bg-white/60 rounded shadow-sm"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Inputs -->
                                        <div class="grid grid-cols-1 gap-4">
                                            <div>
                                                <x-input-label :value="__('Sidebar Background Color')" />
                                                <div class="flex gap-2 mt-1">
                                                    <input type="color" x-model="sidebarColor" class="h-9 w-9 p-0 border-0 rounded cursor-pointer">
                                                    <x-text-input type="text" x-model="sidebarColor" class="flex-1" />
                                                </div>
                                                <input type="hidden" name="appearance_sidebar_color" x-model="sidebarColor">
                                            </div>
                                            <div>
                                                <x-input-label :value="__('Main Section Background Color')" />
                                                <div class="flex gap-2 mt-1">
                                                    <input type="color" x-model="mainColor" class="h-9 w-9 p-0 border-0 rounded cursor-pointer">
                                                    <x-text-input type="text" x-model="mainColor" class="flex-1" />
                                                </div>
                                                <input type="hidden" name="appearance_main_color" x-model="mainColor">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 sm:mt-6 flex justify-end gap-2">
                                    <x-secondary-button x-on:click="open = false">
                                        {{ __('Done') }}
                                    </x-secondary-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>