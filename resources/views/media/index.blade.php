@section('headerTitle')
    {{ __('navigation.media_manager') }}
@endsection

<x-app-layout>
    <div class="space-y-4">
        <div class="flex flex-row items-center justify-between">
            <h1 class="text-xl font-bold tracking-tight lg:text-2xl">File Manager</h1>
            <button
                class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive bg-primary text-primary-foreground shadow-xs hover:bg-primary/90 h-9 px-4 py-2 has-[&svg]:px-3"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-upload" aria-hidden="true">
                    <path d="M12 3v12"></path>
                    <path d="m17 8-5-5-5 5"></path>
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                </svg>Upload</button>
        </div>
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6">
                <div data-slot="card-header"
                    class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 has-[data-slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                    <div data-slot="card-title" class="leading-none font-semibold">Documents</div>
                    <div data-slot="card-action" class="col-start-2 row-span-2 row-start-1 self-start justify-self-end">
                        <span class="text-blue-500"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text size-6"
                                aria-hidden="true">
                                <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                <path d="M10 9H8"></path>
                                <path d="M16 13H8"></path>
                                <path d="M16 17H8"></path>
                            </svg></span>
                    </div>
                </div>
                <div data-slot="card-content" class="px-6 space-y-4">
                    <div class="font-display text-2xl lg:text-3xl"><span class="">1390</span></div>
                </div>
            </div>
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6">
                <div data-slot="card-header"
                    class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 has-[data-slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                    <div data-slot="card-title" class="leading-none font-semibold">Images</div>
                    <div data-slot="card-action" class="col-start-2 row-span-2 row-start-1 self-start justify-self-end">
                        <span class="text-green-500"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-image size-6"
                                aria-hidden="true">
                                <rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect>
                                <circle cx="9" cy="9" r="2"></circle>
                                <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path>
                            </svg></span>
                    </div>
                </div>
                <div data-slot="card-content" class="px-6 space-y-4">
                    <div class="font-display text-2xl lg:text-3xl"><span class="">5678</span></div>
                </div>
            </div>
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6">
                <div data-slot="card-header"
                    class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 has-[data-slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                    <div data-slot="card-title" class="leading-none font-semibold">Videos</div>
                    <div data-slot="card-action" class="col-start-2 row-span-2 row-start-1 self-start justify-self-end">
                        <span class="text-red-500"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-video size-6"
                                aria-hidden="true">
                                <path d="m16 13 5.223 3.482a.5.5 0 0 0 .777-.416V7.87a.5.5 0 0 0-.752-.432L16 10.5">
                                </path>
                                <rect x="2" y="6" width="14" height="12" rx="2"></rect>
                            </svg></span>
                    </div>
                </div>
                <div data-slot="card-content" class="px-6 space-y-4">
                    <div class="font-display text-2xl lg:text-3xl"><span class="">901</span></div>
                </div>
            </div>
            <div data-slot="card" class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6">
                <div data-slot="card-header"
                    class="grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 has-[data-slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                    <div data-slot="card-title" class="leading-none font-semibold">Others</div>
                    <div data-slot="card-action"
                        class="col-start-2 row-span-2 row-start-1 self-start justify-self-end">
                        <span class="text-yellow-500"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-file size-6" aria-hidden="true">
                                <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                            </svg></span>
                    </div>
                </div>
                <div data-slot="card-content" class="px-6 space-y-4">
                    <div class="font-display text-2xl lg:text-3xl"><span class="">234</span></div>
                </div>
            </div>
        </div>

        {{--  --}}
        <div class="border-border min-w-0 flex-1 space-y-4"
            x-data="{ allChecked: false }" >
            <div class="flex border-t">
                <div class="min-w-0 grow">
                    <div class="flex items-center justify-between border-b p-2 pe-1! lg:p-4">
                        <div class="flex grow items-center gap-2">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" x-model="allChecked" class="h-4 w-4 rounded focus:outline-none focus:ring-0 transition">
                            </label>
                            <input type="text" placeholder="Search for files..."
                                class="w-full h-9 rounded-md px-3 py-1 text-sm border-0 placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-gray-400 transition">

                        </div>
                        <button data-slot="dropdown-menu-trigger"
                            class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 h-9 px-4 py-2 has-[&gt;svg]:px-3"
                            type="button" id="radix-_r_vs_" aria-haspopup="menu" aria-expanded="false"
                            data-state="closed">Sort: Name ↑</button>
                    </div>
                    @foreach (range(0, 9) as $item)
                        <div
                            class="hover:bg-gray-100 flex cursor-pointer items-center justify-between border-b p-2 lg:p-4">
                            <div class="flex min-w-0 items-center space-x-4">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" :checked="allChecked"
                                        class="h-4 w-4 rounded focus:outline-none focus:ring-0 transition">
                                </label>

                                <div class="shrink-0">
                                    <div
                                        class="flex h-5 w-5 items-center justify-center rounded bg-yellow-500 text-xs font-bold text-white">
                                        S</div>
                                </div>
                                <div class="min-w-0 truncate">Arion – Admin Dashboard & UI Kit</div>
                            </div>
                            <div class="text-muted-foreground flex items-center space-x-4 text-sm">
                                <span class="hidden w-16 text-right lg:inline">12.09.20</span>
                                <span class="hidden w-16 text-right lg:inline">1.2 MB</span>
                                <span class="relative flex size-8 shrink-0 overflow-hidden rounded-full h-6 w-6">
                                    <span
                                        class="bg-muted flex size-full items-center justify-center rounded-full text-xs">U</span>
                                </span>
                                <button
                                    class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] hover:bg-gray-200 hover:text-accent-foreground dark:hover:bg-accent/50 size-9">
                                    <x-lucide-ellipsis class="w-4 h-4 text-gray-600" />
                                </button>
                            </div>
                        </div>
                    @endforeach

                    <div class="mt-4">
                        <div class="flex items-center justify-between gap-4 lg:gap-8">
                            <div class="flex items-center gap-3"></div>
                            <div class="text-muted-foreground flex grow justify-end text-sm whitespace-nowrap">
                                <p class="text-muted-foreground text-sm whitespace-nowrap" aria-live="polite">
                                    <span class="text-foreground">1-25</span> of <span
                                        class="text-foreground">100</span>
                                </p>
                            </div>
                            <div>
                                <nav role="navigation" aria-label="pagination" data-slot="pagination"
                                    class="mx-auto flex w-full justify-center">
                                    <ul data-slot="pagination-content" class="flex flex-row items-center gap-1">
                                        <li data-slot="pagination-item"><a data-slot="pagination-link"
                                                class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 size-9 aria-disabled:pointer-events-none aria-disabled:opacity-50"
                                                aria-label="Go to first page" aria-disabled="true"
                                                role="link"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="lucide lucide-chevron-first"
                                                    aria-hidden="true">
                                                    <path d="m17 18-6-6 6-6"></path>
                                                    <path d="M7 6v12"></path>
                                                </svg></a></li>
                                        <li data-slot="pagination-item"><a data-slot="pagination-link"
                                                class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 size-9 aria-disabled:pointer-events-none aria-disabled:opacity-50"
                                                aria-label="Go to previous page" aria-disabled="true"
                                                role="link"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="lucide lucide-chevron-left"
                                                    aria-hidden="true">
                                                    <path d="m15 18-6-6 6-6"></path>
                                                </svg></a></li>
                                        <li data-slot="pagination-item"><a data-slot="pagination-link"
                                                class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 size-9 aria-disabled:pointer-events-none aria-disabled:opacity-50"
                                                aria-label="Go to next page" aria-disabled="true" role="link"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-chevron-right" aria-hidden="true">
                                                    <path d="m9 18 6-6-6-6"></path>
                                                </svg></a></li>
                                        <li data-slot="pagination-item"><a data-slot="pagination-link"
                                                class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 size-9 aria-disabled:pointer-events-none aria-disabled:opacity-50"
                                                aria-label="Go to last page" aria-disabled="true" role="link"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-chevron-last" aria-hidden="true">
                                                    <path d="m7 18 6-6-6-6"></path>
                                                    <path d="M17 6v12"></path>
                                                </svg></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
