@section('headerTitle')
Plans
@endsection

<x-app-layout>
    <div x-data="{
        isOpen: false,
    }" class="flex flex-col gap-4 p-5">
        <div class="space-y-2">
            <div class="flex items-center justify-between lg:hidden">
                <h1 class="me-4 text-xl font-bold tracking-tight lg:text-2xl">Plans</h1>
                <a href="{{ route('plans.create') }}"
                    class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 shrink-0 outline-none focus-visible:ring-2 focus-visible:ring-ring/50 bg-primary text-white shadow-xs hover:bg-primary/90 h-8 rounded-md gap-1.5 px-3">
                    Add Plan
                </a>
            </div>
            <div class="flex flex-col justify-between md:flex-row lg:items-center">
                <div class="flex flex-1 flex-wrap items-center gap-2">
                    <form method="GET" action="{{ route('plans.index') }}" class="flex items-center gap-2">
                        <input name="search" value="{{ request('search') }}"
                            class="flex min-w-0 h-8 w-[150px] lg:w-[250px] rounded-md border border-input bg-transparent px-3 py-1 text-base md:text-sm shadow-xs transition-colors outline-none placeholder:text-muted-foreground selection:bg-primary focus-visible:ring-2 focus-visible:ring-ring/50 disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50"
                            placeholder="{{ __('Search plans...') }}" />

                        <select name="billing_period"
                            class="flex h-8 rounded-md border border-input bg-transparent px-3 py-1 text-base md:text-sm shadow-xs transition-colors outline-none focus-visible:ring-2 focus-visible:ring-ring/50"
                            onchange="this.form.submit()">
                            <option value="">All Periods</option>
                            <option value="monthly" {{ request('billing_period') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                            <option value="yearly" {{ request('billing_period') == 'yearly' ? 'selected' : '' }}>Yearly</option>
                        </select>

                        <select name="is_active"
                            class="flex h-8 rounded-md border border-input bg-transparent px-3 py-1 text-base md:text-sm shadow-xs transition-colors outline-none focus-visible:ring-2 focus-visible:ring-ring/50"
                            onchange="this.form.submit()">
                            <option value="">All Status</option>
                            <option value="1" {{ request('is_active') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ request('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </form>
                </div>

                <div class="hidden items-center gap-2 lg:flex">
                    <a href="{{ route('plans.create') }}"
                        class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 shrink-0 outline-none focus-visible:ring-2 focus-visible:ring-ring/50 bg-primary text-white shadow-xs hover:bg-primary/90 h-8 rounded-md gap-1.5 px-3">
                        Add Plan
                    </a>
                </div>
            </div>

        </div>

        @if ($plans->isEmpty())
        @include('components.empty', [
        'title' => 'No Plans Found',
        'description' => 'Get started by creating a new subscription plan.',
        'actionUrl' => route('plans.create'),
        ])
        @else
        <div class="-mx-4 mt-3 ring-1 ring-gray-300 sm:mx-0 rounded-lg overflow-hidden">
            <table class="relative min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3.5 pr-3 pl-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                        <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Price</th>
                        <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">Credits</th>
                        <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Period</th>
                        <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Status</th>
                        <th scope="col" class="relative py-3.5 pr-4 pl-3 text-right text-sm font-medium sm:pr-6">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($plans as $plan)
                    <tr class="hover:bg-gray-50/50">
                        <td class="w-full max-w-0 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-6">
                            <div class="flex items-center gap-3">
                                @if($plan->logo)
                                <img src="{{ Storage::url($plan->logo) }}" alt="{{ $plan->name }}" class="h-10 w-10 rounded-lg object-cover border border-gray-200">
                                @else
                                <div class="h-10 w-10 rounded-lg bg-gradient-to-br from-primary to-purple-600 flex items-center justify-center text-white font-semibold">
                                    {{ substr($plan->name, 0, 1) }}
                                </div>
                                @endif
                                <div>
                                    <div class="font-medium text-gray-900">{{ $plan->name }}</div>
                                    <div class="text-gray-500 lg:hidden">${{ number_format($plan->price, 2) }}/{{ $plan->billing_period }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">
                            <span class="font-semibold text-gray-900">${{ number_format($plan->price, 2) }}</span>
                            <span class="text-gray-500">/ {{ $plan->billing_period }}</span>
                        </td>
                        <td class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell">
                            <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                {{ number_format($plan->monthly_credits) }} credits
                            </span>
                        </td>
                        <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">
                            <span class="inline-flex items-center rounded-md bg-purple-50 px-2 py-1 text-xs font-medium text-purple-700 ring-1 ring-inset ring-purple-700/10">
                                {{ ucfirst($plan->billing_period) }}
                            </span>
                        </td>
                        <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">
                            <div class="flex gap-2">
                                <span @class([ 'inline-flex items-center rounded-md px-2 py-1 text-xs font-medium' , 'bg-green-100 text-green-700 ring-1 ring-inset ring-green-700/10'=> $plan->is_active,
                                    'bg-gray-100 text-gray-700 ring-1 ring-inset ring-gray-700/10' => !$plan->is_active,
                                    ])>
                                    {{ $plan->is_active ? 'Active' : 'Inactive' }}
                                </span>
                                @if($plan->hidden)
                                <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium bg-orange-100 text-orange-700 ring-1 ring-inset ring-orange-700/10">
                                    Hidden
                                </span>
                                @endif
                            </div>
                        </td>
                        <td class="relative py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <x-tooltip text="{{ __('View') }}">
                                <a href="{{ route('plans.show', $plan->id) }}"
                                    class="inline-flex items-center justify-center rounded-full border border-gray-300 bg-white p-2 text-sm font-semibold text-gray-900 shadow-xs hover:bg-gray-200 disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:bg-white mr-2">
                                    <x-lucide-eye class="w-4 h-4 text-gray-600" />
                                </a>
                            </x-tooltip>
                            <x-tooltip text="{{ __('Edit') }}">
                                <a href="{{ route('plans.edit', $plan->id) }}"
                                    class="inline-flex items-center justify-center rounded-full border border-gray-300 bg-white p-2 text-sm font-semibold text-gray-900 shadow-xs hover:bg-gray-200 disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:bg-white">
                                    <x-lucide-pencil class="w-4 h-4 text-gray-600" />
                                </a>
                            </x-tooltip>
                            <div class="inline-block ml-2">
                                <form action="{{ route('plans.destroy', $plan->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this plan?');">
                                    @csrf
                                    @method('DELETE')
                                    <x-tooltip text="{{ __('Delete') }}">
                                        <button type="submit"
                                            class="inline-flex items-center justify-center rounded-full border border-red-300 bg-red-50 p-2 text-sm font-semibold text-red-600 shadow-xs hover:bg-red-500 hover:text-white disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:bg-red-50">
                                            <x-lucide-trash class="w-4 h-4" />
                                        </button>
                                    </x-tooltip>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

        @include('components.pagination', ['paginator' => $plans])
    </div>
</x-app-layout>