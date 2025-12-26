@section('headerTitle')
{{ __('Plan Details') }}
@endsection

<x-app-layout>
    <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
        <div class="space-y-6 sm:px-6 lg:col-span-12 lg:px-0">
            <div class="bg-white shadow-xs sm:rounded-lg">
                <!-- Header Actions -->
                <div class="flex items-center justify-between p-5 border-b border-gray-200">
                    <div class="flex items-center gap-4">
                        @if($plan->logo)
                        <img src="{{ Storage::url($plan->logo) }}" alt="{{ $plan->name }}" class="h-16 w-16 rounded-lg object-cover border border-gray-200">
                        @else
                        <div class="h-16 w-16 rounded-lg bg-gradient-to-br from-primary to-purple-600 flex items-center justify-center text-white font-bold text-2xl">
                            {{ substr($plan->name, 0, 1) }}
                        </div>
                        @endif
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">{{ $plan->name }}</h2>
                            <p class="mt-1 text-sm text-gray-500">{{ $plan->slug }}</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('plans.edit', $plan) }}"
                            class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                            <x-lucide-pencil class="w-4 h-4 mr-2" />
                            Edit
                        </a>
                        <a href="{{ route('plans.index') }}"
                            class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                            <x-lucide-arrow-left class="w-4 h-4 mr-2" />
                            Back
                        </a>
                    </div>
                </div>

                <!-- Plan Details -->
                <div class="flex flex-col md:flex-row gap-6 p-5">
                    <div class="md:w-1/3">
                        <h3 class="text-base font-semibold leading-6 text-gray-900">Plan Information</h3>
                        <p class="mt-1 text-sm text-gray-500">Basic details about this subscription plan.</p>
                    </div>
                    <div class="mt-5 space-y-6 md:mt-0 md:w-2/3">
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Plan Name</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $plan->name }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Slug</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $plan->slug }}</dd>
                            </div>
                            <div class="sm:col-span-2">
                                <dt class="text-sm font-medium text-gray-500">Description</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $plan->description ?? 'No description provided' }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Status</dt>
                                <dd class="mt-1 flex gap-2">
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
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <hr class="border-gray-200">

                <!-- Pricing -->
                <div class="flex flex-col md:flex-row gap-6 p-5">
                    <div class="md:w-1/3">
                        <h3 class="text-base font-semibold leading-6 text-gray-900">Pricing & Credits</h3>
                        <p class="mt-1 text-sm text-gray-500">Cost and credit allocation details.</p>
                    </div>
                    <div class="mt-5 space-y-6 md:mt-0 md:w-2/3">
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Price</dt>
                                <dd class="mt-1">
                                    <span class="text-2xl font-bold text-gray-900">${{ number_format($plan->price, 2) }}</span>
                                    <span class="text-sm text-gray-500">/ {{ $plan->billing_period }}</span>
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Billing Period</dt>
                                <dd class="mt-1">
                                    <span class="inline-flex items-center rounded-md bg-purple-50 px-2 py-1 text-xs font-medium text-purple-700 ring-1 ring-inset ring-purple-700/10">
                                        {{ ucfirst($plan->billing_period) }}
                                    </span>
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Monthly Credits</dt>
                                <dd class="mt-1">
                                    <span class="inline-flex items-center rounded-md bg-blue-50 px-3 py-1.5 text-sm font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                        {{ number_format($plan->monthly_credits) }} credits
                                    </span>
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <hr class="border-gray-200">

                <!-- Stripe Integration -->
                <div class="flex flex-col md:flex-row gap-6 p-5">
                    <div class="md:w-1/3">
                        <h3 class="text-base font-semibold leading-6 text-gray-900">Stripe Integration</h3>
                        <p class="mt-1 text-sm text-gray-500">Stripe connectivity details.</p>
                    </div>
                    <div class="mt-5 space-y-6 md:mt-0 md:w-2/3">
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-6">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Stripe Price ID</dt>
                                <dd class="mt-1 text-sm font-mono text-gray-900 bg-gray-50 px-3 py-2 rounded border border-gray-200">{{ $plan->stripe_price_id }}</dd>
                            </div>
                            @if($plan->stripe_product_id)
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Stripe Product ID</dt>
                                <dd class="mt-1 text-sm font-mono text-gray-900 bg-gray-50 px-3 py-2 rounded border border-gray-200">{{ $plan->stripe_product_id }}</dd>
                            </div>
                            @endif
                        </dl>
                    </div>
                </div>

                <hr class="border-gray-200">

                <!-- Features -->
                <div class="flex flex-col md:flex-row gap-6 p-5">
                    <div class="md:w-1/3">
                        <h3 class="text-base font-semibold leading-6 text-gray-900">Plan Features</h3>
                        <p class="mt-1 text-sm text-gray-500">What's included in this plan.</p>
                    </div>
                    <div class="mt-5 space-y-6 md:mt-0 md:w-2/3">
                        @if($plan->features && count($plan->features) > 0)
                        <ul class="space-y-2">
                            @foreach($plan->features as $feature)
                            <li class="flex items-start">
                                <x-lucide-check class="w-5 h-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" />
                                <span class="text-sm text-gray-700">{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                        @else
                        <p class="text-sm text-gray-500 italic">No features defined</p>
                        @endif
                    </div>
                </div>

                <hr class="border-gray-200">

                <!-- Subscriptions Stats -->
                <div class="flex flex-col md:flex-row gap-6 p-5">
                    <div class="md:w-1/3">
                        <h3 class="text-base font-semibold leading-6 text-gray-900">Subscription Statistics</h3>
                        <p class="mt-1 text-sm text-gray-500">Usage and subscription data.</p>
                    </div>
                    <div class="mt-5 space-y-6 md:mt-0 md:w-2/3">
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Total Subscriptions</dt>
                                <dd class="mt-1 text-2xl font-semibold text-gray-900">{{ $plan->subscriptions->count() }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Active Subscriptions</dt>
                                <dd class="mt-1 text-2xl font-semibold text-green-600">{{ $plan->activeSubscriptions->count() }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Timestamps -->
                <div class="bg-gray-50 px-5 py-4 border-t border-gray-200">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-2 sm:grid-cols-2 text-xs text-gray-500">
                        <div>
                            <dt class="inline font-medium">Created:</dt>
                            <dd class="inline ml-1">{{ $plan->created_at->format('M d, Y h:i A') }}</dd>
                        </div>
                        <div>
                            <dt class="inline font-medium">Last Updated:</dt>
                            <dd class="inline ml-1">{{ $plan->updated_at->format('M d, Y h:i A') }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>