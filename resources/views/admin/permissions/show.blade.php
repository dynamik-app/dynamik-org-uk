<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permission Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8 border-b border-gray-100 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <h3 class="text-3xl font-semibold text-gray-900">{{ $permission->name }}</h3>
                        <p class="mt-1 text-gray-600">{{ __('Assigned to :roles roles and :users users.', ['roles' => $permission->roles->count(), 'users' => $permission->users->count()]) }}</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.permissions.edit', $permission) }}" class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            {{ __('Edit permission') }}
                        </a>
                        <a href="{{ route('admin.permissions.index') }}" class="inline-flex items-center rounded-md border border-transparent bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2">
                            {{ __('Back to list') }}
                        </a>
                    </div>
                </div>

                @if (session('status'))
                    <div class="px-8 py-4 bg-green-50 text-green-700 border-b border-green-100">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="p-8 grid gap-10 lg:grid-cols-2">
                    <div>
                        <h4 class="text-lg font-semibold text-gray-900">{{ __('Roles with this permission') }}</h4>
                        <div class="mt-4 space-y-3">
                            @forelse ($permission->roles as $role)
                                <div class="flex items-center justify-between rounded-lg border border-gray-200 p-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $role->name }}</div>
                                    <a href="{{ route('admin.roles.show', $role) }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-900">{{ __('View role') }}</a>
                                </div>
                            @empty
                                <p class="text-sm text-gray-500">{{ __('No roles currently include this permission.') }}</p>
                            @endforelse
                        </div>
                    </div>

                    <div>
                        <h4 class="text-lg font-semibold text-gray-900">{{ __('Users with this permission') }}</h4>
                        <div class="mt-4 space-y-3">
                            @forelse ($permission->users as $user)
                                <div class="flex items-center justify-between rounded-lg border border-gray-200 p-4">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $user->email }}</div>
                                    </div>
                                    <a href="{{ route('admin.users.show', $user) }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-900">{{ __('View user') }}</a>
                                </div>
                            @empty
                                <p class="text-sm text-gray-500">{{ __('No users currently hold this permission.') }}</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
