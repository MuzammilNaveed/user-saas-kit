@section('headerTitle')
{{ __('Create User') }}
@endsection

<x-app-layout>
    <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
        <div class="space-y-6 sm:px-6 lg:col-span-12 lg:px-0">
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="bg-white shadow-xs sm:rounded-lg">

                    <!-- Avatar Section Moved to Top -->
                    <div class="flex flex-col md:flex-row gap-6 p-5">
                        <div class="md:w-1/3">
                            <h3 class="text-base font-semibold leading-6 text-gray-900">Profile Picture</h3>
                            <p class="mt-1 text-sm text-gray-500">Upload user avatar.</p>
                        </div>
                        <div class="mt-5 space-y-6 md:mt-0 md:w-2/3">
                            <div class="col-span-6">
                                <div class="mt-2 flex items-center gap-x-3" x-data="{ 
                                        photoName: null, 
                                        photoPreview: null 
                                        }">
                                    <div class="relative">
                                        <div class="mt-2" x-show="! photoPreview">
                                            <span class="inline-block h-24 w-24 overflow-hidden rounded-full bg-gray-100">
                                                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="mt-2" x-show="photoPreview" style="display: none;">
                                            <span class="block h-24 w-24 rounded-full bg-cover bg-no-repeat bg-center"
                                                x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                            </span>
                                            <!-- Cross icon to delete -->
                                            <button type="button" class="absolute -top-2 -right-2 bg-white rounded-full p-0.5 shadow-sm border border-gray-200 hover:bg-gray-100"
                                                @click="photoPreview = null; document.getElementById('avatar').value = null">
                                                <x-lucide-x class="w-4 h-4 text-gray-500" />
                                            </button>
                                        </div>
                                    </div>

                                    <button type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                                        @click.prevent="$refs.photo.click()">
                                        Change
                                    </button>

                                    <input type="file" id="avatar" name="avatar" class="hidden" x-ref="photo"
                                        x-on:change="
                                                photoName = $refs.photo.files[0].name;
                                                const reader = new FileReader();
                                                reader.onload = (e) => {
                                                    photoPreview = e.target.result;
                                                };
                                                reader.readAsDataURL($refs.photo.files[0]);
                                            ">
                                </div>
                                <p class="mt-2 text-xs leading-5 text-gray-500">Allowed JPG, GIF or PNG. Max size of 5MB.</p>
                                @error('avatar') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-200">

                    <div class="flex flex-col md:flex-row gap-6 p-5">
                        <div class="md:w-1/3">
                            <h3 class="text-base font-semibold leading-6 text-gray-900">Personal Information</h3>
                            <p class="mt-1 text-sm text-gray-500">Essential details about the user.</p>
                        </div>
                        <div class="mt-5 space-y-6 md:mt-0 md:w-2/3">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6">
                                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name <span class="text-red-500">*</span></label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder="e.g. John Doe"
                                        class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                                    @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email Address <span class="text-red-500">*</span></label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" required placeholder="e.g. johndoe@example.com"
                                        class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                                    @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
                                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="e.g. +1 (555) 000-0000"
                                        class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                                    @error('phone') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="gender" class="block text-sm font-medium leading-6 text-gray-900">Gender <span class="text-red-500">*</span></label>
                                    <select id="gender" name="gender" required
                                        class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                                        <option value="">Select Gender</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('gender') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Country</label>
                                    <input type="text" name="country" id="country" value="{{ old('country') }}" placeholder="e.g. United States"
                                        class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                                    @error('country') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                                    <textarea name="address" id="address" rows="3" placeholder="e.g. 123 Main St, New York, NY 10001"
                                        class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">{{ old('address') }}</textarea>
                                    @error('address') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-200">

                    <div class="flex flex-col md:flex-row gap-6 p-5">
                        <div class="md:w-1/3">
                            <h3 class="text-base font-semibold leading-6 text-gray-900">Security & Role</h3>
                            <p class="mt-1 text-sm text-gray-500">Manage password and access level.</p>
                        </div>
                        <div class="mt-5 space-y-6 md:mt-0 md:w-2/3">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6">
                                    <label for="role" class="block text-sm font-medium leading-6 text-gray-900">Role <span class="text-red-500">*</span></label>
                                    <select id="role" name="role"
                                        class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                                        <option value="">Select Role</option>
                                        @foreach($roles as $role)
                                        <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div class="col-span-6" x-data="{ show: false }">
                                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password <span class="text-red-500">*</span></label>
                                    <div class="relative mt-2">
                                        <input :type="show ? 'text' : 'password'" name="password" id="password" required autocomplete="new-password" placeholder="Enter a strong password"
                                            class="block w-full rounded-md border-0 py-1.5 pr-10 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                                        <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-500 focus:outline-none">
                                            <x-lucide-eye x-show="!show" class="h-5 w-5" />
                                            <x-lucide-eye-off x-show="show" class="h-5 w-5" style="display: none;" />
                                        </button>
                                    </div>
                                    @error('password') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div class="col-span-6" x-data="{ show: false }">
                                    <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password <span class="text-red-500">*</span></label>
                                    <div class="relative mt-2">
                                        <input :type="show ? 'text' : 'password'" name="password_confirmation" id="password_confirmation" required autocomplete="new-password" placeholder="Re-enter password"
                                            class="block w-full rounded-md border-0 py-1.5 pr-10 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                                        <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-500 focus:outline-none">
                                            <x-lucide-eye x-show="!show" class="h-5 w-5" />
                                            <x-lucide-eye-off x-show="show" class="h-5 w-5" style="display: none;" />
                                        </button>
                                    </div>
                                </div>

                                <div class="col-span-6">
                                    <div class="relative flex gap-x-3">
                                        <div class="flex h-6 items-center">
                                            <input id="status" name="status" type="checkbox" value="1" {{ old('status', 1) ? 'checked' : '' }}
                                                class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary">
                                            <input type="hidden" name="status" value="0"> <!-- Fallback for unchecked checkbox -->
                                        </div>
                                        <div class="text-sm leading-6">
                                            <label for="status" class="font-medium text-gray-900">Mark as Active User</label>
                                            <p class="text-gray-500">Allow this user to log in and access the system.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-x-6 px-4 py-4 sm:px-8">
                        <a href="{{ route('users.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                        <button type="submit"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Create User
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Ensure checkbox sends 0 if unchecked. 
        // Actually, easiest way is hidden input with same name BEFORE the checkbox.
    </script>
</x-app-layout>