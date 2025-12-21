@section('headerTitle')
{{ __('permissions.permissions') }} {{ $permissions->total() > 0 ? "({$permissions->total()})" : '' }}
@endsection

<x-app-layout>
    <div x-data="{
        isOpen: {{ $errors->any() ? 'true' : 'false' }},
        isEdit: false,
        isDeleteOpen: false,
        formAction: '{{ route('permissions.store') }}',
        deleteAction: '',
        name: '{{ old('name') }}',
        isLoading: false,
        nameError: false,
    }" class="flex flex-col gap-4 p-5">
        <div class="space-y-2">
            <div class="flex items-center justify-between lg:hidden">
                <h1 class="me-4 text-xl font-bold tracking-tight lg:text-2xl">{{ __('permissions.permissions') }}</h1>
                <button @click="isOpen = true; isEdit = false; formAction = '{{ route('permissions.store') }}'; name = ''; isLoading = false; nameError = false; $nextTick(() => $refs.nameInput.focus())"
                    class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 shrink-0 outline-none focus-visible:ring-2 focus-visible:ring-ring/50 bg-primary text-white shadow-xs hover:bg-primary/90 h-8 rounded-md gap-1.5 px-3">
                    {{ __('permissions.add_permission') }}
                </button>

            </div>
            <div class="flex flex-col justify-between md:flex-row lg:items-center">
                <div class="flex flex-1 flex-wrap items-center gap-2">
                    <form method="GET" action="{{ route('permissions.index') }}" class="flex items-center">
                        <input name="search" value="{{ request('search') }}"
                            class="flex min-w-0 h-8 w-[150px] lg:w-[250px] rounded-md border border-input bg-transparent px-3 py-1 text-base md:text-sm shadow-xs transition-colors outline-none placeholder:text-muted-foreground selection:bg-primary focus-visible:ring-2 focus-visible:ring-ring/50 disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50"
                            placeholder="{{ __('permissions.search_placeholder') }}" />
                    </form>
                </div>

                <div class="hidden items-center gap-2 lg:flex">
                    <button @click="isOpen = true; isEdit = false; formAction = '{{ route('permissions.store') }}'; name = ''; isLoading = false; nameError = false; $nextTick(() => $refs.nameInput.focus())"
                        class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 shrink-0 outline-none focus-visible:ring-2 focus-visible:ring-ring/50 bg-primary text-white shadow-xs hover:bg-primary/90 h-8 rounded-md gap-1.5 px-3">
                        {{ __('permissions.add_permission') }}
                    </button>
                </div>
            </div>

        </div>

        @if ($permissions->isEmpty())
        @include('components.empty', [
        'title' => 'No Permissions Found',
        'description' => 'Get started by creating a new permission.',
        'actionUrl' => null,
        ])
        @else
        <div class="-mx-4 mt-3 ring-1 ring-gray-300 sm:mx-0 rounded-lg overflow-hidden">
            <table class="relative min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="py-3.5 pr-3 pl-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">{{ __('permissions.name') }}</th>
                        <th scope="col" class="relative py-3.5 pr-4 pl-3 text-right text-sm font-medium sm:pr-6">
                            {{ __('permissions.actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                    <tr class="hover:bg-gray-50/50 border-b border-gray-200">
                        <td class="relative py-4 pr-3 pl-4 text-sm sm:pl-6">
                            <div class="font-normal text-gray-900"> {{ $permission->name }} </div>
                        </td>
                        <td class="relative py-3.5 pr-4 pl-3 text-right text-sm font-medium sm:pr-6">
                            <x-tooltip text="{{ __('permissions.edit') }}">
                                <button type="button"
                                    @click="isOpen = true; isEdit = true; formAction = '{{ route('permissions.update', $permission->id) }}'; name = '{{ $permission->name }}'; isLoading = false; nameError = false; $nextTick(() => { $refs.nameInput.focus(); $refs.nameInput.setSelectionRange($refs.nameInput.value.length, $refs.nameInput.value.length); })"
                                    class="inline-flex items-center justify-center rounded-full border border-gray-300 bg-white p-2 text-sm font-semibold text-gray-900 shadow-xs hover:bg-gray-200 disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:bg-white">
                                    <x-lucide-pencil class="w-4 h-4 text-gray-600" />
                                </button>
                            </x-tooltip>
                            <div class="inline-block ml-2">
                                <x-tooltip text="{{ __('permissions.delete') }}">
                                    <button type="button"
                                        @click="isDeleteOpen = true; deleteAction = '{{ route('permissions.destroy', $permission->id) }}'"
                                        class="inline-flex items-center justify-center rounded-full border border-red-300 bg-red-50 p-2 text-sm font-semibold text-red-600 shadow-xs hover:bg-red-500 hover:text-white disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:bg-red-50">
                                        <x-lucide-trash class="w-4 h-4" />
                                    </button>
                                </x-tooltip>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

        @include('components.pagination', ['paginator' => $permissions])

        <!-- Modal -->
        <div x-show="isOpen" class="fixed inset-0 bg-black/80 backdrop-blur-[1px] flex items-center justify-center z-50" style="display: none;">
            <div x-show="isOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-100"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="bg-white rounded-2xl border border-gray-200 shadow-[0_8px_40px_rgba(0,0,0,0.12)] w-full max-w-lg overflow-hidden m-2.5">

                <form :action="formAction" method="POST" @submit="if(!name.trim()) { $event.preventDefault(); nameError = true; return; } isLoading = true">
                    @csrf
                    <template x-if="isEdit">
                        @method('PUT')
                    </template>

                    <div class="border-2 border-gray-200 m-[2px] rounded-2xl overflow-hidden">
                        <!-- Header with linear gradient -->
                        <div class="px-6 pt-3 pb-4 rounded-t-1xl"
                            style="background: linear-gradient(to bottom, rgb(229 231 235) 25%, rgb(243 244 246) 50%, rgb(255 255 255) 100%);">
                            <div class="flex items-start justify-between">
                                <h2 class="text-lg font-semibold text-gray-900" x-text="isEdit ? '{{ __('permissions.edit_permission') }}' : '{{ __('permissions.add_permission') }}'"></h2>
                                <button type="button" @click="isOpen = false" class="text-gray-400 hover:text-gray-600 transition">
                                    <x-lucide-x class="w-4 h-4 text-gray-600 hover:text-gray-800" />
                                </button>
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="px-6 py-5 space-y-5">
                            <div>
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">{{ __('permissions.name') }} <span class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <input type="text" name="name" id="name" x-model="name" x-ref="nameInput"
                                        @input="nameError = false"
                                        :class="nameError ? 'ring-red-500 focus:ring-red-500' : 'ring-gray-300 focus:ring-primary'"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                        placeholder="{{ __('permissions.name') }}">
                                    <p x-show="nameError" class="text-red-500 text-xs mt-1 text-left" style="display: none;">{{ __('permissions.name') }} {{ __('is required') }}</p>
                                    @error('name')
                                    <p class="text-red-500 text-xs mt-1 text-left">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="flex items-center justify-end bg-gray-50 px-6 py-4 border-t border-gray-200">
                            <div class="flex gap-2">
                                <button type="button" @click="isOpen = false"
                                    class="px-4 py-2 rounded-lg border border-gray-300 text-sm font-medium text-gray-700 hover:bg-gray-50 transition">
                                    {{ __('permissions.cancel') }}
                                </button>
                                <button type="submit" :disabled="isLoading"
                                    class="px-4 py-2 rounded-lg bg-indigo-600 text-sm font-medium text-white hover:bg-indigo-700 transition disabled:opacity-50 disabled:cursor-not-allowed flex items-center gap-2">
                                    <span x-show="!isLoading" x-text="isEdit ? '{{ __('permissions.update') }}' : '{{ __('permissions.save') }}'"></span>
                                    <span x-show="isLoading" class="animate-spin h-4 w-4 text-white">
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
        </div>

        <!-- Delete Confirmation Modal -->
        <div x-show="isDeleteOpen" class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="display: none;">
            <div x-show="isDeleteOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-100"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-black/80 backdrop-blur-[1px] transition-opacity"></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div x-show="isDeleteOpen" x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="ease-in duration-100"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">

                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">{{ __('permissions.confirm_delete') }}</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">{{ __('permissions.delete_confirmation') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                            <form :action="deleteAction" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                                    {{ __('permissions.delete') }}
                                </button>
                            </form>
                            <button type="button" @click="isDeleteOpen = false"
                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                {{ __('permissions.cancel') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>