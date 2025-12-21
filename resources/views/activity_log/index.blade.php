@section('headerTitle')
{{ __('activity.activity_log') }} {{ $activityLogs->total() > 0 ? "({$activityLogs->total()})" : '' }}
@endsection

<x-app-layout>
    <div class="space-y-4 p-5" x-data="{ showDrawer: false, selectedLog: {} }">
        <div>
            @if ($activityLogs->isEmpty())
            @include('components.empty', [
            'title' => 'No Activity Logs',
            'description' => 'There are no activity logs to display.',
            'actionUrl' => null,
            ])
            @else
            <div class="-mx-4 mt-3 ring-1 ring-gray-300 sm:mx-0 rounded-lg overflow-hidden">
                <table class="relative min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="py-3.5 pr-3 pl-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Description
                            </th>
                            <th scope="col"
                                class="py-3.5 pr-3 pl-4 text-left text-sm font-semibold text-gray-900 sm:pl-6 hidden md:table-cell">Caused By
                            </th>
                            <th scope="col"
                                class="py-3.5 pr-3 pl-4 text-left text-sm font-semibold text-gray-900 sm:pl-6 hidden md:table-cell">Ip Address
                            </th>
                            <th scope="col"
                                class="py-3.5 pr-3 pl-4 text-left text-sm font-semibold text-gray-900 sm:pl-6 hidden md:table-cell">Created at
                            </th>
                            <th scope="col"
                                class="relative py-3.5 pr-4 pl-3 text-right text-sm font-medium sm:pr-6">Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activityLogs as $log)
                        <tr class="hover:bg-gray-50/50 border-b border-gray-200">
                            <td class="relative py-4 pr-3 pl-4 text-sm sm:pl-6">
                                <div class="font-medium text-gray-900"> {{ $log->description }} </div>
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-500 hidden md:table-cell">
                                {{ $log->causer?->name ?? 'System' }}
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-500 hidden md:table-cell">
                                {{ $log->properties['ip'] ?? 'N/A' }}
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-500 hidden md:table-cell">
                                {{ $log->created_at->format('M d, Y H:i:s') }}
                            </td>
                            <td class="relative py-3.5 pr-4 pl-3 text-right text-sm font-medium sm:pr-6">
                                <button type="button"
                                    @click="selectedLog = {{ \Illuminate\Support\Js::from($log) }}; showDrawer = true"
                                    class="inline-flex items-center rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-xs inset-ring inset-ring-gray-300 hover:bg-gray-50 disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:bg-white">View Details</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>

        @include('components.pagination', ['paginator' => $activityLogs])

        <!-- Drawer -->
        <div x-show="showDrawer" class="relative z-50" aria-labelledby="slide-over-title" role="dialog" aria-modal="true" style="display: none;">
            <!-- Background backdrop -->
            <div x-show="showDrawer" x-transition:enter="ease-in-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                        <!-- Slide-over panel -->
                        <div x-show="showDrawer" x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="pointer-events-auto w-screen max-w-md" @click.away="showDrawer = false">
                            <div class="flex h-full flex-col overflow-y-scroll bg-white py-6 shadow-xl">
                                <div class="px-4 sm:px-6">
                                    <div class="flex items-start justify-between">
                                        <h2 class="text-base font-semibold leading-6 text-gray-900" id="slide-over-title" x-text="selectedLog.description"></h2>
                                        <div class="ml-3 flex h-7 items-center">
                                            <button type="button" @click="showDrawer = false" class="relative rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                                <span class="absolute -inset-2.5"></span>
                                                <span class="sr-only">Close panel</span>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative mt-6 flex-1 px-4 sm:px-6">
                                    <!-- Content -->
                                    <div class="text-sm text-gray-500 text-left space-y-4">
                                        <div>
                                            <p class="font-medium text-gray-900">Caused By</p>
                                            <p x-text="selectedLog?.causer?.name"></p>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">Date</p>
                                            <p x-text="new Date(selectedLog?.created_at).toLocaleString()"></p>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">Properties</p>
                                            <pre class="bg-gray-50 p-3 rounded-md mt-2 overflow-auto text-xs border border-gray-200" x-text="JSON.stringify(selectedLog?.properties, null, 2)"></pre>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>