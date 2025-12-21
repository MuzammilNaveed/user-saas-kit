@section('headerTitle')
Users
@endsection

<x-app-layout>
    <div x-data="{
        isOpen: false,
    }" class="flex flex-col gap-4 p-5">
        <div class="space-y-2">
            <div class="flex items-center justify-between lg:hidden">
                <h1 class="me-4 text-xl font-bold tracking-tight lg:text-2xl">Users</h1>
                <a href="{{ route('users.create') }}"
                    class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 shrink-0 outline-none focus-visible:ring-2 focus-visible:ring-ring/50 bg-primary text-white shadow-xs hover:bg-primary/90 h-8 rounded-md gap-1.5 px-3">
                    Add User
                </a>
            </div>
            <div class="flex flex-col justify-between md:flex-row lg:items-center">
                <div class="flex flex-1 flex-wrap items-center gap-2">
                    <form method="GET" action="{{ route('users.index') }}" class="flex items-center">
                        <input name="search" value="{{ request('search') }}"
                            class="flex min-w-0 h-8 w-[150px] lg:w-[250px] rounded-md border border-input bg-transparent px-3 py-1 text-base md:text-sm shadow-xs transition-colors outline-none placeholder:text-muted-foreground selection:bg-primary focus-visible:ring-2 focus-visible:ring-ring/50 disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50"
                            placeholder="{{ __('Search by name, email, phone...') }}" />
                    </form>
                </div>

                <div class="hidden items-center gap-2 lg:flex">
                    <a href="{{ route('users.create') }}"
                        class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 shrink-0 outline-none focus-visible:ring-2 focus-visible:ring-ring/50 bg-primary text-white shadow-xs hover:bg-primary/90 h-8 rounded-md gap-1.5 px-3">
                        Add User
                    </a>
                </div>
            </div>

        </div>

        @if ($users->isEmpty())
        @include('components.empty', [
        'title' => 'No Users Found',
        'description' => 'Get started by creating a new user.',
        'actionUrl' => route('users.create'),
        ])
        @else
        <div class="-mx-4 mt-3 ring-1 ring-gray-300 sm:mx-0 rounded-lg overflow-hidden">
            <table class="relative min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3.5 pr-3 pl-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                        <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Email</th>
                        <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">Role</th>
                        <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Status</th>
                        <th scope="col" class="relative py-3.5 pr-4 pl-3 text-right text-sm font-medium sm:pr-6">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($users as $user)
                    <tr class="hover:bg-gray-50/50">
                        <td class="w-full max-w-0 py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-6">
                            <div class="flex items-center">
                                <div class="h-10 w-10 flex-shrink-0">
                                    @php
                                    // Try to find image media
                                    $avatar = $user->media->first(function($media) {
                                    return str_starts_with($media->mime_type, 'image/');
                                    });
                                    @endphp
                                    @if($avatar)
                                    <img class="h-10 w-10 rounded-full object-cover" src="{{ $avatar->url }}" alt="">
                                    @else
                                    <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="font-medium text-gray-900">{{ $user->name }}</div>
                                    <div class="text-gray-500 lg:hidden">{{ $user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $user->email }}</td>
                        <td class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell">
                            @forelse($user->roles as $role)
                            <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">{{ $role->name }}</span>
                            @empty
                            <span class="text-gray-400 italic">No Role</span>
                            @endforelse
                        </td>
                        <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">
                            <span @class([ 'inline-flex items-center rounded-md  px-2 py-1 text-xs font-medium' , 'bg-slate-100 text-slate-400'=> $user->status == 'pending',
                                'bg-green-100 text-green-400' => $user->status == 'approved',
                                'bg-rose-100 text-rose-400' => $user->status == 'blocked',
                                ])> {{ __("messages.". $user->status) }} </span>
                        </td>
                        <td class="relative py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <x-tooltip text="{{ __('Edit') }}">
                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="inline-flex items-center justify-center rounded-full border border-gray-300 bg-white p-2 text-sm font-semibold text-gray-900 shadow-xs hover:bg-gray-200 disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:bg-white">
                                    <x-lucide-pencil class="w-4 h-4 text-gray-600" />
                                </a>
                            </x-tooltip>
                            <div class="inline-block ml-2">
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
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

        @include('components.pagination', ['paginator' => $users])
    </div>
</x-app-layout>