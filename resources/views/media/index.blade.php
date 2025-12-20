@section('headerTitle')
{{ __('navigation.media_manager') }}
@endsection

<x-app-layout>
    <div class="space-y-4" x-data="{ isOpen: false, isUrlMode: false }">
        <div class="flex flex-row items-center justify-between">
            <h1 class="text-xl font-bold tracking-tight lg:text-2xl">File Manager</h1>
            <div class="flex items-center gap-2">
                <a href="{{ route('media.index', ['layout' => 'list'] + request()->except('layout')) }}" class="p-2 {{ request('layout') !== 'grid' ? 'bg-gray-200' : 'hover:bg-gray-100' }} rounded-md transition">
                    <x-lucide-list class="w-5 h-5 text-gray-600" />
                </a>
                <a href="{{ route('media.index', ['layout' => 'grid'] + request()->except('layout')) }}" class="p-2 {{ request('layout') === 'grid' ? 'bg-gray-200' : 'hover:bg-gray-100' }} rounded-md transition">
                    <x-lucide-layout-grid class="w-5 h-5 text-gray-600" />
                </a>
                <button @click="isOpen = true"
                    class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 shrink-0 outline-none focus-visible:ring-2 focus-visible:ring-ring/50 bg-primary text-white shadow-xs hover:bg-primary/90 h-8 rounded-md gap-1.5 px-3"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-upload" aria-hidden="true">
                        <path d="M12 3v12"></path>
                        <path d="m17 8-5-5-5 5"></path>
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                    </svg>Upload</button>
            </div>
        </div>

        <div class="flex flex-wrap md:flex-nowrap gap-3">
            <div class="flex flex-col gap-2 rounded-xl border py-3 w-full">
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
                    <div class="font-display text-2xl lg:text-3xl"><span class="">{{ $stats['documents'] }}</span></div>
                </div>
            </div>
            <div class="flex flex-col gap-2 rounded-xl border py-3 w-full">
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
                    <div class="font-display text-2xl lg:text-3xl"><span class="">{{ $stats['images'] }}</span></div>
                </div>
            </div>
            <div class="flex flex-col gap-2 rounded-xl border py-3 w-full">
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
                    <div class="font-display text-2xl lg:text-3xl"><span class="">{{ $stats['videos'] }}</span></div>
                </div>
            </div>
            <div class="flex flex-col gap-2 rounded-xl border py-3 w-full">
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
                    <div class="font-display text-2xl lg:text-3xl"><span class="">{{ $stats['others'] }}</span></div>
                </div>
            </div>
        </div>

        <div class="border-border min-w-0 flex-1 space-y-4"
            x-data="{ allChecked: false }">
            <div class="min-w-0 grow">
                @if($media->isEmpty())
                @include('components.empty', [
                'title' => 'No Media',
                'description' => 'There are no media to display.',
                'actionUrl' => null,
                ])
                @elseif(request('layout') === 'grid')
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 p-4">
                    @foreach ($media as $item)
                    <div class="group relative aspect-square bg-gray-100 rounded-lg overflow-hidden border border-gray-200 hover:shadow-md transition">
                        @if(str_starts_with($item->mime_type, 'image/'))
                        <img src="{{ $item->url }}" alt="{{ $item->name }}" class="w-full h-full object-cover">
                        @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400">
                            <x-lucide-file class="w-12 h-12" />
                        </div>
                        @endif

                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center gap-2">
                            <!-- Actions -->
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 bg-white/90 p-2 text-xs truncate">
                            {{ $item->name }}
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="-mx-4 mt-3 ring-1 ring-gray-300 sm:mx-0 rounded-lg overflow-hidden">
                    <table class="relative min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pr-3 pl-4 text-left text-sm font-semibold text-gray-900 sm:pl-6 w-12">
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" x-model="allChecked" class="h-4 w-4 rounded focus:outline-none focus:ring-0 transition">
                                    </label>
                                </th>
                                <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">{{ __('permissions.name') }}</th>
                                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Date</th>
                                <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Size</th>
                                <th scope="col" class="relative py-3.5 pr-4 pl-3 text-right text-sm font-medium sm:pr-6">
                                    {{ __('permissions.actions') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($media as $item)
                            <tr class="hover:bg-gray-50/50 border-b border-gray-200">
                                <td class="relative py-4 pr-3 pl-4 text-sm sm:pl-6">
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" :checked="allChecked" class="h-4 w-4 rounded focus:outline-none focus:ring-0 transition">
                                    </label>
                                </td>
                                <td class="relative py-4 pr-3 pl-4 text-sm sm:pl-6">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 shrink-0 mr-4 rounded overflow-hidden">
                                            @if(str_starts_with($item->mime_type, 'image/'))
                                            <img src="{{ $item->url }}" class="w-full h-full object-cover">
                                            @else
                                            <div class="flex h-10 w-10 items-center justify-center rounded bg-gray-100 text-gray-500">
                                                <x-lucide-file class="w-5 h-5" />
                                            </div>
                                            @endif
                                        </div>
                                        <div class="font-normal text-gray-900">{{ $item->name }}</div>
                                    </div>
                                </td>
                                <td class="hidden whitespace-nowrap px-3 py-4 text-sm text-gray-500 lg:table-cell">
                                    {{ $item->created_at->format('d.m.Y') }}
                                </td>
                                <td class="hidden whitespace-nowrap px-3 py-4 text-sm text-gray-500 lg:table-cell">
                                    {{ round($item->size / 1024, 1) }} KB
                                </td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <button
                                        class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] hover:bg-gray-200 hover:text-accent-foreground dark:hover:bg-accent/50 size-9">
                                        <x-lucide-ellipsis class="w-4 h-4 text-gray-600" />
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
                <div class="mt-4">
                    {{ $media->appends(['layout' => request('layout')])->links() }}
                </div>
            </div>
        </div>
        <!-- Upload Modal -->
        <div x-show="isOpen" class="fixed inset-0 bg-black/80 backdrop-blur-[1px] flex items-center justify-center z-50" style="display: none;">
            <div x-show="isOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-100"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="bg-white rounded-xl border border-gray-200 shadow-xl w-full max-w-2xl overflow-hidden m-4" @click.away="isOpen = false">

                <div class="p-6">
                    <!-- Header -->
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Upload Media</h3>
                        <div class="flex items-center gap-4">
                            <button type="button" class="text-sm font-medium text-gray-900 hover:text-primary transition-colors"
                                @click="isUrlMode = !isUrlMode" x-text="isUrlMode ? 'Switch to Upload' : 'Add media from URL'">
                            </button>
                        </div>
                    </div>

                    <!-- Main Content Area -->
                    <div class="">
                        <!-- URL Mode -->
                        <div x-show="isUrlMode" style="display: none;" class="mb-6">
                            <div class="flex gap-2">
                                <input type="url" id="media-url-input" class="flex h-10 w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-xs transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50" placeholder="https://example.com/image.jpg">
                                <button type="button" id="media-url-btn" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-secondary text-secondary-foreground shadow-xs hover:bg-secondary/80 h-10 px-4 py-2">
                                    Add
                                </button>
                            </div>
                        </div>

                        <div id="media-dropzone">
                            <!-- Empty State (Dropzone) -->
                            <div id="media-empty-state" class="border-[1.5px] border-dashed border-gray-200 rounded-lg p-10 flex flex-col items-center justify-center text-center hover:bg-gray-50/50 transition-colors" x-show="!isUrlMode">
                                <div class="w-12 h-12 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center mb-4">
                                    <x-lucide-image class="w-6 h-6 text-gray-400" />
                                </div>
                                <h4 class="text-base font-medium text-gray-900 mb-1">Drop your images here</h4>
                                <p class="text-sm text-gray-500 mb-6">PNG or JPG (max. 5MB)</p>

                                <button onclick="document.getElementById('media-file-input').click()" type="button"
                                    class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-gray-200 bg-white shadow-sm hover:bg-gray-50 h-10 px-4 py-2 text-gray-700">
                                    <x-lucide-upload class="w-4 h-4" />
                                    Select images
                                </button>
                                <input type="file" id="media-file-input" class="hidden" multiple accept="image/*,application/pdf,video/*">
                            </div>

                            <!-- Preview State -->
                            <div id="media-preview-state" style="display: none;" class="border-[1.5px] border-dashed border-gray-200 rounded-lg p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="text-sm font-medium text-gray-900">Uploaded Files (<span id="media-file-count-label">0</span>)</h4>
                                    <button onclick="document.getElementById('media-add-more-input').click()" type="button"
                                        class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-xs font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-gray-200 bg-white shadow-sm hover:bg-gray-50 h-8 px-3 text-gray-700">
                                        <x-lucide-upload class="w-3 h-3" />
                                        Add more
                                    </button>
                                    <input type="file" id="media-add-more-input" class="hidden" multiple accept="image/*,application/pdf,video/*">
                                </div>

                                <div id="media-preview-container" class="grid grid-cols-4 sm:grid-cols-5 gap-4">
                                    <!-- Previews injected here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 p-3 border-t border-gray-100 bg-gray-50/50">
                    <button type="button" @click="isOpen = false" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-gray-300 bg-white shadow-sm hover:bg-gray-50 h-9 px-4 py-2 text-gray-700">
                        Cancel
                    </button>
                    <button id="media-upload-action-btn" disabled class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-gray-900 text-white shadow hover:bg-gray-800 h-9 px-4 py-2 disabled:bg-gray-300 disabled:text-gray-500">
                        <span class="btn-text">Upload Files</span>
                        <span class="btn-loader" style="display: none;">
                            <x-lucide-loader-2 class="mr-2 h-4 w-4 animate-spin" /> Uploading...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>