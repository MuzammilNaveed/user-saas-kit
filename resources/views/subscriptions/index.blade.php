<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12" x-data="{ billingPeriod: 'monthly' }">
        <!-- Header with Toggle -->
        <div class="flex items-center justify-between mb-12">
            <h1 class="text-4xl font-bold text-gray-900">Choose Your Plan</h1>

            <!-- Billing Period Toggle -->
            <div class="flex items-center gap-3">
                <span class="text-sm font-medium text-gray-700" :class="{ 'text-gray-900': billingPeriod === 'monthly' }">Monthly</span>
                <button
                    type="button"
                    @click="billingPeriod = billingPeriod === 'monthly' ? 'yearly' : 'monthly'"
                    class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
                    :class="billingPeriod === 'yearly' ? 'bg-primary' : 'bg-gray-200'"
                    role="switch"
                    :aria-checked="billingPeriod === 'yearly'">
                    <span class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
                        :class="billingPeriod === 'yearly' ? 'translate-x-5' : 'translate-x-0'"></span>
                </button>
                <span class="text-sm font-medium text-gray-700" :class="{ 'text-gray-900': billingPeriod === 'yearly' }">Yearly</span>
            </div>
        </div>

        <!-- Pricing Cards -->
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            <!-- Monthly Plans -->
            <template x-if="billingPeriod === 'monthly'">
                <div class="contents">
                    @foreach($monthlyPlans as $plan)
                    <div class="relative flex flex-col rounded-2xl border border-gray-200 bg-white p-8 shadow-sm hover:shadow-md transition-shadow">
                        <!-- Plan Header -->
                        <div class="mb-6">
                            <h3 class="text-2xl font-semibold text-gray-900">{{ $plan->name }}</h3>
                            <p class="mt-2 text-sm text-gray-600">{{ $plan->description }}</p>
                        </div>

                        <!-- Price -->
                        <div class="mb-6">
                            <div class="flex items-baseline">
                                <span class="text-5xl font-bold tracking-tight text-gray-900">${{ number_format($plan->price, 2) }}</span>
                                <span class="ml-1 text-sm font-medium text-gray-600">/month</span>
                            </div>
                        </div>

                        <!-- Features -->
                        <ul class="mb-8 space-y-4 flex-1">
                            @if($plan->features)
                            @foreach($plan->features as $key => $value)
                            <li class="flex items-start">
                                <svg class="h-5 w-5 flex-shrink-0 text-green-500 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-sm text-gray-700">
                                    @if(is_bool($value))
                                    {{ ucwords(str_replace('_', ' ', $key)) }}
                                    @else
                                    {{ is_numeric($value) ? $value : ucfirst($value) }} {{ ucwords(str_replace('_', ' ', $key)) }}
                                    @endif
                                </span>
                            </li>
                            @endforeach
                            @endif
                        </ul>

                        <!-- CTA Button -->
                        <form action="{{ route('subscriptions.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                            <button type="submit" class="w-full rounded-lg bg-gray-900 px-4 py-3 text-center text-sm font-semibold text-white shadow-sm hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2 transition-colors">
                                Choose {{ $plan->name }}
                            </button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </template>

            <!-- Yearly Plans -->
            <template x-if="billingPeriod === 'yearly'">
                <div class="contents">
                    @foreach($yearlyPlans as $plan)
                    <div class="relative flex flex-col rounded-2xl border border-gray-200 bg-white p-8 shadow-sm hover:shadow-md transition-shadow">
                        <!-- Plan Header -->
                        <div class="mb-6">
                            <h3 class="text-2xl font-semibold text-gray-900">{{ str_replace(' (Yearly)', '', $plan->name) }}</h3>
                            <p class="mt-2 text-sm text-gray-600">{{ $plan->description }}</p>
                        </div>

                        <!-- Price -->
                        <div class="mb-6">
                            <div class="flex items-baseline">
                                <span class="text-5xl font-bold tracking-tight text-gray-900">${{ number_format($plan->price, 2) }}</span>
                                <span class="ml-1 text-sm font-medium text-gray-600">/year</span>
                            </div>
                            <p class="mt-1 text-xs text-green-600 font-medium">Save {{ round((1 - ($plan->price / 12) / ($monthlyPlans->firstWhere('name', str_replace(' (Yearly)', '', $plan->name))->price ?? 1)) * 100) }}%</p>
                        </div>

                        <!-- Features -->
                        <ul class="mb-8 space-y-4 flex-1">
                            @if($plan->features)
                            @foreach($plan->features as $key => $value)
                            <li class="flex items-start">
                                <svg class="h-5 w-5 flex-shrink-0 text-green-500 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-sm text-gray-700">
                                    @if(is_bool($value))
                                    {{ ucwords(str_replace('_', ' ', $key)) }}
                                    @else
                                    {{ is_numeric($value) ? $value : ucfirst($value) }} {{ ucwords(str_replace('_', ' ', $key)) }}
                                    @endif
                                </span>
                            </li>
                            @endforeach
                            @endif
                        </ul>

                        <!-- CTA Button -->
                        <form action="{{ route('subscriptions.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                            <button type="submit" class="w-full rounded-lg bg-gray-900 px-4 py-3 text-center text-sm font-semibold text-white shadow-sm hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2 transition-colors">
                                Choose {{ str_replace(' (Yearly)', '', $plan->name) }}
                            </button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </template>
        </div>

        <!-- Additional Info Section -->
        <div class="mt-12 text-center">
            <p class="text-sm text-gray-600">All plans include a 14-day free trial. No credit card required.</p>
        </div>
    </div>
</x-app-layout>