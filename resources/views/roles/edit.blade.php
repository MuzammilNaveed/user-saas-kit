@section('headerTitle')
{{ __('roles.edit') }}
@endsection

<x-app-layout>
    <div class="p-5"
        x-data="{
            isLoading: false,
            name: '{{ old('name', $role->name) }}',
            nameError: false,
            selectAll(checked) {
                document.querySelectorAll('input[name=\'permission_ids[]\']').forEach(el => {
                    el.checked = checked;
                });
            }
         }">
        <form action="{{ route('roles.update', $role->id) }}" method="POST" @submit="if(!name.trim()) { $event.preventDefault(); nameError = true; $refs.nameInput.focus(); return; } isLoading = true">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-3">
                <div class="px-4 sm:px-0">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">{{ __('roles.role_details') }}</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">{{ __('roles.update_role_desc') }}</p>
                </div>

                <div class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                    <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="col-span-full">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">
                                    {{ __('roles.role_name') }} <span class="text-red-500">*</span>
                                </label>
                                <div class="mt-2">
                                    <input type="text" name="name" id="name"
                                        x-model="name"
                                        x-ref="nameInput"
                                        @input="nameError = false"
                                        autofocus
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                        :class="nameError ? 'ring-red-500 focus:ring-red-500' : 'ring-gray-300 focus:ring-indigo-600'">
                                    <p x-show="nameError" class="text-red-500 text-xs mt-1" style="display: none;">{{ __('roles.role_name') }} {{ __('is required') }}</p>
                                    @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-span-full">
                                <div class="flex items-center justify-between mb-2">
                                    <label class="block text-sm font-medium leading-6 text-gray-900">{{ __('roles.permissions') }}</label>
                                    <div class="flex gap-4 text-sm">
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="radio" name="selection_type" class="text-indigo-600 focus:ring-indigo-500" @change="selectAll(true)">
                                            <span class="ml-2">{{ __('roles.select_all') }}</span>
                                        </label>
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="radio" name="selection_type" class="text-indigo-600 focus:ring-indigo-500" @change="selectAll(false)">
                                            <span class="ml-2">{{ __('roles.unselect_all') }}</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-2 flex flex-wrap gap-2">
                                    @foreach($permissions as $permission)
                                    <label class="cursor-pointer">
                                        <input type="checkbox" name="permission_ids[]" value="{{ $permission->id }}" class="hidden peer"
                                            @if(in_array($permission->id, old('permission_ids', $role->permissions->pluck('id')->toArray()))) checked @endif>
                                        <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800 hover:bg-gray-200 peer-checked:bg-indigo-100 peer-checked:text-indigo-700 peer-checked:ring-2 peer-checked:ring-indigo-500 transition-all select-none">
                                            {{ $permission->name }}
                                        </div>
                                    </label>
                                    @endforeach
                                </div>
                                @error('permission_ids')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                        <a href="{{ route('roles.index') }}" class="text-sm font-semibold leading-6 text-gray-900">{{ __('roles.cancel') }}</a>
                        <button type="submit" :disabled="isLoading" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:opacity-50 disabled:cursor-not-allowed flex items-center gap-2">
                            <span x-show="!isLoading">{{ __('roles.save_changes') }}</span>
                            <span x-show="isLoading" class="animate-spin h-4 w-4 text-white" style="display: none;">
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>