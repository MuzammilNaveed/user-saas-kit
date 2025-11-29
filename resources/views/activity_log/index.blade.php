@section('headerTitle')
    {{ __('activity.activity_log') }} {{ $activityLogs->total() > 0 ? "({$activityLogs->total()})" : '' }}
@endsection

<x-app-layout>
    <div class="space-y-4">
        <div>
            @if ($activityLogs->isEmpty())
                @include('components.empty');
            @else
                <div class="-mx-4 mt-3 ring-1 ring-gray-300 sm:mx-0 rounded-lg overflow-hidden">
                    <table class="relative min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="py-3.5 pr-3 pl-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Description
                                </th>
                                <th scope="col"
                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Caused By
                                </th>
                                <th scope="col"
                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">IP Address
                                </th>
                                <th scope="col"
                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Created At
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activityLogs as $log)
                                <tr class="hover:bg-gray-50/50 border-b border-gray-200">
                                    <td class="relative py-4 pr-3 pl-4 text-sm sm:pl-6">
                                        <div class="font-medium text-gray-900"> {{ $log->description }} </div>
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500">
                                        {{ $log->causer?->name ?? 'System' }}
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500">
                                        {{ $log->properties['ip'] ?? 'N/A' }}
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500">
                                        {{ $log->created_at->format('M d, Y H:i:s') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        @include('components.pagination', ['paginator' => $activityLogs])
    </div>
</x-app-layout>
