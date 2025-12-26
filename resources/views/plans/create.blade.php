@section('headerTitle')
{{ __('Create Plan') }}
@endsection

<x-app-layout>
    <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
        <div class="space-y-6 sm:px-6 lg:col-span-12 lg:px-0">
            <form action="{{ route('plans.store') }}" method="POST" enctype="multipart/form-data" x-data="{
                featuresInput: '',
                features: [],
                addFeature() {
                    if (this.featuresInput.trim()) {
                        this.features.push(this.featuresInput.trim());
                        this.featuresInput = '';
                        this.updateHiddenInput();
                    }
                },
                removeFeature(index) {
                    this.features.splice(index, 1);
                    this.updateHiddenInput();
                },
                updateHiddenInput() {
                    document.getElementById('features_json').value = JSON.stringify(this.features);
                }
            }">
                @csrf

                <div class="bg-white shadow-xs sm:rounded-lg">
                    <!-- Plan Details -->
                    <div class="flex flex-col md:flex-row gap-6 p-5">
                        <div class="md:w-1/3">
                            <h3 class="text-base font-semibold leading-6 text-gray-900">Plan Details</h3>
                            <p class="mt-1 text-sm text-gray-500">Basic information about the subscription plan.</p>
                        </div>
                        <div class="mt-5 space-y-6 md:mt-0 md:w-2/3">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6">
                                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Plan Name <span class="text-red-500">*</span></label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder="e.g. Pro Plan"
                                        class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                                    @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                    <textarea name="description" id="description" rows="3" placeholder="Describe what this plan includes..."
                                        class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">{{ old('description') }}</textarea>
                                    @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div class="col-span-6">
                                    <label class="block text-sm font-medium leading-6 text-gray-900">Plan Logo</label>
                                    <div class="mt-2 flex items-center gap-x-3" x-data="{ 
                                            logoName: null, 
                                            logoPreview: null 
                                            }">
                                        <div class="relative">
                                            <div class="mt-2" x-show="! logoPreview">
                                                <div class="h-24 w-24 rounded-lg bg-gradient-to-br from-primary to-purple-600 flex items-center justify-center text-white font-bold text-2xl">
                                                    <x-lucide-image class="w-12 h-12 text-white/50" />
                                                </div>
                                            </div>
                                            <div class="mt-2" x-show="logoPreview" style="display: none;">
                                                <span class="block h-24 w-24 rounded-lg bg-cover bg-no-repeat bg-center border border-gray-200"
                                                    x-bind:style="'background-image: url(\'' + logoPreview + '\');'">
                                                </span>
                                                <!-- Cross icon to delete -->
                                                <button type="button" class="absolute -top-2 -right-2 bg-white rounded-full p-0.5 shadow-sm border border-gray-200 hover:bg-gray-100"
                                                    @click="logoPreview = null; document.getElementById('logo').value = null">
                                                    <x-lucide-x class="w-4 h-4 text-gray-500" />
                                                </button>
                                            </div>
                                        </div>

                                        <button type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                                            @click.prevent="$refs.logoFile.click()">
                                            Upload Logo
                                        </button>

                                        <input type="file" id="logo" name="logo" class="hidden" x-ref="logoFile" accept="image/*"
                                            x-on:change="
                                                    logoName = $refs.logoFile.files[0].name;
                                                    const reader = new FileReader();
                                                    reader.onload = (e) => {
                                                        logoPreview = e.target.result;
                                                    };
                                                    reader.readAsDataURL($refs.logoFile.files[0]);
                                                ">
                                    </div>
                                    <p class="mt-2 text-xs leading-5 text-gray-500">Allowed JPG, PNG or SVG. Max size of 2MB.</p>
                                    @error('logo') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-200">

                    <!-- Stripe Configuration -->
                    <div class="flex flex-col md:flex-row gap-6 p-5">
                        <div class="md:w-1/3">
                            <h3 class="text-base font-semibold leading-6 text-gray-900">Stripe Integration</h3>
                            <p class="mt-1 text-sm text-gray-500">Connect this plan with Stripe pricing.</p>
                        </div>
                        <div class="mt-5 space-y-6 md:mt-0 md:w-2/3">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6">
                                    <label for="stripe_price_id" class="block text-sm font-medium leading-6 text-gray-900">Stripe Price ID <span class="text-red-500">*</span></label>
                                    <input type="text" name="stripe_price_id" id="stripe_price_id" value="{{ old('stripe_price_id') }}" required placeholder="e.g. price_1234567890"
                                        class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                                    @error('stripe_price_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="stripe_product_id" class="block text-sm font-medium leading-6 text-gray-900">Stripe Product ID</label>
                                    <input type="text" name="stripe_product_id" id="stripe_product_id" value="{{ old('stripe_product_id') }}" placeholder="e.g. prod_1234567890"
                                        class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                                    @error('stripe_product_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-200">

                    <!-- Pricing & Credits -->
                    <div class="flex flex-col md:flex-row gap-6 p-5">
                        <div class="md:w-1/3">
                            <h3 class="text-base font-semibold leading-6 text-gray-900">Pricing & Credits</h3>
                            <p class="mt-1 text-sm text-gray-500">Set the price and credit allocation.</p>
                        </div>
                        <div class="mt-5 space-y-6 md:mt-0 md:w-2/3">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price <span class="text-red-500">*</span></label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                            <span class="text-gray-500 sm:text-sm">$</span>
                                        </div>
                                        <input type="number" name="price" id="price" step="0.01" min="0" value="{{ old('price') }}" required placeholder="0.00"
                                            class="block w-full rounded-md border-0 py-1.5 pl-7 pr-12 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                                    </div>
                                    @error('price') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="billing_period" class="block text-sm font-medium leading-6 text-gray-900">Billing Period <span class="text-red-500">*</span></label>
                                    <select id="billing_period" name="billing_period" required
                                        class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                                        <option value="">Select Period</option>
                                        <option value="monthly" {{ old('billing_period') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                        <option value="yearly" {{ old('billing_period') == 'yearly' ? 'selected' : '' }}>Yearly</option>
                                    </select>
                                    @error('billing_period') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="monthly_credits" class="block text-sm font-medium leading-6 text-gray-900">Monthly Credits <span class="text-red-500">*</span></label>
                                    <input type="number" name="monthly_credits" id="monthly_credits" min="0" value="{{ old('monthly_credits', 0) }}" required placeholder="e.g. 500"
                                        class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                                    @error('monthly_credits') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                    <p class="mt-1 text-xs text-gray-500">Credits allocated per billing cycle</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-200">

                    <!-- Features -->
                    <div class="flex flex-col md:flex-row gap-6 p-5">
                        <div class="md:w-1/3">
                            <h3 class="text-base font-semibold leading-6 text-gray-900">Plan Features</h3>
                            <p class="mt-1 text-sm text-gray-500">Add features included in this plan.</p>
                        </div>
                        <div class="mt-5 space-y-6 md:mt-0 md:w-2/3">
                            <div>
                                <label for="features_input" class="block text-sm font-medium leading-6 text-gray-900">Add Features</label>
                                <div class="mt-2 flex gap-2">
                                    <input type="text" x-model="featuresInput" @keydown.enter.prevent="addFeature()" id="features_input" placeholder="e.g. Unlimited storage"
                                        class="block flex-1 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                                    <button type="button" @click="addFeature()"
                                        class="inline-flex items-center rounded-md bg-primary px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary/90 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary">
                                        <x-lucide-plus class="w-4 h-4" />
                                    </button>
                                </div>

                                <!-- Features List -->
                                <div class="mt-4 space-y-2" x-show="features.length > 0">
                                    <template x-for="(feature, index) in features" :key="index">
                                        <div class="flex items-center justify-between p-2 bg-gray-50 rounded-md border border-gray-200">
                                            <span class="text-sm text-gray-700" x-text="feature"></span>
                                            <button type="button" @click="removeFeature(index)" class="text-red-500 hover:text-red-700">
                                                <x-lucide-x class="w-4 h-4" />
                                            </button>
                                        </div>
                                    </template>
                                </div>

                                <input type="hidden" name="features" id="features_json" value="{{ old('features', '[]') }}">
                                @error('features') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div class="col-span-6">
                                <div class="relative flex gap-x-3">
                                    <div class="flex h-6 items-center">
                                        <input id="is_active" name="is_active" type="checkbox" value="1" {{ old('is_active', 1) ? 'checked' : '' }}
                                            class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary">
                                    </div>
                                    <div class="text-sm leading-6">
                                        <label for="is_active" class="font-medium text-gray-900">Active Plan</label>
                                        <p class="text-gray-500">Make this plan available for subscription.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-6">
                                <div class="relative flex gap-x-3">
                                    <div class="flex h-6 items-center">
                                        <input id="hidden" name="hidden" type="checkbox" value="1" {{ old('hidden', 0) ? 'checked' : '' }}
                                            class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary">
                                    </div>
                                    <div class="text-sm leading-6">
                                        <label for="hidden" class="font-medium text-gray-900">Hidden Plan</label>
                                        <p class="text-gray-500">Hide this plan from public listing (useful for special offers).</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-x-6 px-4 py-4 sm:px-8">
                        <a href="{{ route('plans.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                        <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Create Plan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>