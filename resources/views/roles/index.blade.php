@section('headerTitle')
{{ __('roles.roles') }} {{ $roles->total() > 0 ? "({$roles->total()})" : '' }}
@endsection

<x-app-layout>
    <div class="flex flex-col gap-4"
        x-data="{
            showDeleteModal: false,
            roleIdToDelete: null,
            isLoading: false,
            openDeleteModal(id) {
                this.roleIdToDelete = id;
                this.showDeleteModal = true;
            },
            closeDeleteModal() {
                this.showDeleteModal = false;
                this.roleIdToDelete = null;
            }
         }">
        <div class="space-y-2">
            <div class="flex items-center justify-between lg:hidden">
                <h1 class="me-4 text-xl font-bold tracking-tight lg:text-2xl">{{ __('roles.roles') }}</h1>
                <a href="{{ route('roles.create') }}"
                    class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 shrink-0 outline-none focus-visible:ring-2 focus-visible:ring-ring/50 bg-primary text-white shadow-xs hover:bg-primary/90 h-8 rounded-md gap-1.5 px-3">
                    {{ __('roles.add_role') }}
                </a>
            </div>
            <div class="flex flex-col justify-between md:flex-row lg:items-center">
                <div class="flex flex-1 flex-wrap items-center gap-2">
                    <!-- Search could be added here if needed -->
                </div>

                <div class="hidden items-center gap-2 lg:flex">
                    <a href="{{ route('roles.create') }}"
                        class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 shrink-0 outline-none focus-visible:ring-2 focus-visible:ring-ring/50 bg-primary text-white shadow-xs hover:bg-primary/90 h-8 rounded-md gap-1.5 px-3">
                        {{ __('roles.add_role') }}
                    </a>
                </div>
            </div>
        </div>

        @if ($roles->isEmpty())
        @include('components.empty', [
        'title' => 'No Roles Found',
        'description' => 'Get started by creating a new role.',
        'actionUrl' => route('roles.create'),
        'actionLabel' => __('roles.add_role')
        ])
        @else
        <div class="-mx-4 mt-3 ring-1 ring-gray-300 sm:mx-0 rounded-lg overflow-hidden">
            <table class="relative min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3.5 pr-3 pl-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">{{ __('roles.name') }}</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">{{ __('roles.permissions') }}</th>
                        <th scope="col" class="relative py-3.5 pr-4 pl-3 text-right text-sm font-medium sm:pr-6">{{ __('roles.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr class="hover:bg-gray-50/50 border-b border-gray-200">
                        <td class="relative py-4 pr-3 pl-4 text-sm sm:pl-6">
                            <div class="font-normal text-gray-900"> {{ $role->name }} </div>
                        </td>
                        <td class="px-3 py-4 text-sm text-gray-500">
                            <div class="flex flex-wrap gap-1">
                                @foreach($role->permissions->take(5) as $permission)
                                <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">{{ $permission->name }}</span>
                                @endforeach
                                @if($role->permissions->count() > 5)
                                <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">+{{ $role->permissions->count() - 5 }}</span>
                                @endif
                            </div>
                        </td>
                        <td class="relative py-3.5 pr-4 pl-3 text-right text-sm font-medium sm:pr-6">
                            <x-tooltip text="{{ __('roles.edit') }}">
                                <a href="{{ route('roles.edit', $role->id) }}"
                                    class="inline-flex items-center justify-center rounded-full border border-gray-300 bg-white p-2 text-sm font-semibold text-gray-900 shadow-xs hover:bg-gray-200 disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:bg-white">
                                    <x-lucide-pencil class="w-4 h-4 text-gray-600" />
                                </a>
                            </x-tooltip>
                            <div class="inline-block ml-2">
                                <x-tooltip text="{{ __('roles.delete') }}">
                                    <button type="button" @click="openDeleteModal({{ $role->id }})"
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

        @include('components.pagination', ['paginator' => $roles])

        <!-- Delete Confirmation Modal -->
        <div x-show="showDeleteModal"
            class="relative z-50"
            aria-labelledby="modal-title"
            role="dialog"
            aria-modal="true"
            style="display: none;">

            <div x-show="showDeleteModal"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div x-show="showDeleteModal"
                        x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">

                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">{{ __('roles.delete_role_title') }}</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">{{ __('roles.delete_role_desc') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <form :action="`{{ url('roles') }}/${roleIdToDelete}`" method="POST" @submit="isLoading = true">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    :disabled="isLoading"
                                    class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto disabled:opacity-50 disabled:cursor-not-allowed flex items-center gap-2">
                                    <span x-show="!isLoading">{{ __('roles.confirm_delete') }}</span>
                                    <span x-show="isLoading" class="animate-spin h-4 w-4 text-white" style="display: none;">
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                    </span>
                                </button>
                            </form>
                            <button type="button"
                                @click="closeDeleteModal"
                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                {{ __('roles.cancel') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>