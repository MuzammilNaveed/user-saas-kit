@section('headerTitle')
{{ __("navigation.dashboard") }}
@endsection

<x-app-layout>
    <div class="p-5">
        <div class="overflow-hidden rounded-md border">
            <div
                class="grid divide-y-1! md:grid-cols-2 md:divide-x-1! lg:grid-cols-4 lg:divide-y-0! [&*:nth-child(2)]:border-e-0! md:[&*:nth-child(2)]:border-e-0! lg:[&*:nth-child(2)]:border-e-1!">
                @foreach (range(0, 3) as $item)
                <div class="flex flex-col gap-6 py-6 hover:bg-muted border-r hover:bg-gray-50 transition-colors">
                    <div
                        class="auto-rows-min gap-1.5 px-6 relative flex flex-row items-center justify-between space-y-0">
                        <div class="leading-none font-semibold">Total Appointments</div>
                        <div
                            class="absolute end-4 top-0 flex size-12 items-center justify-center rounded-full bg-indigo-200 p-4 dark:bg-indigo-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-calendar size-5" aria-hidden="true">
                                <path d="M8 2v4"></path>
                                <path d="M16 2v4"></path>
                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                <path d="M3 10h18"></path>
                            </svg>
                        </div>
                    </div>
                    <div data-slot="card-content" class="px-6 space-y-1">
                        <div class="font-display text-3xl"><span class="">2350</span></div>
                        <p class="text-muted-foreground text-xs"><span class="text-green-600">+20.1%</span> from last
                            month
                        </p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>