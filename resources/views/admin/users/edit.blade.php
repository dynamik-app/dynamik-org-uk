<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit user') }}
            </h2>
            <a href="{{ route('admin.users.show', $user) }}" class="text-sm text-indigo-600 hover:text-indigo-900">&larr; {{ __('Back to profile') }}</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form method="POST" action="{{ route('admin.users.update', $user) }}" class="p-8 space-y-8">
                    @csrf
                    @method('PUT')

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">{{ __('Account details') }}</h3>
                        <p class="mt-1 text-sm text-gray-500">{{ __('Update the person’s name, email address and access level.') }}</p>
                    </div>

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name', $user->name) }}" required autofocus />
                            <x-input-error for="name" class="mt-2" />
                        </div>

                        <div>
                            <x-label for="email" value="{{ __('Email address') }}" />
                            <x-input id="email" name="email" type="email" class="mt-1 block w-full" value="{{ old('email', $user->email) }}" required />
                            <x-input-error for="email" class="mt-2" />
                        </div>
                    </div>

                    <div>
                        <h4 class="text-lg font-semibold text-gray-900">{{ __('Roles') }}</h4>
                        <p class="mt-1 text-sm text-gray-500">{{ __('Select the roles that determine this user’s permissions.') }}</p>

                        <div class="mt-4 grid gap-3 sm:grid-cols-2">
                            @forelse ($roles as $role)
                                <label class="flex items-start gap-3 rounded-lg border border-gray-200 p-4 hover:border-indigo-300">
                                    <input type="checkbox" name="roles[]" value="{{ $role->name }}" class="mt-1 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" @checked(in_array($role->name, old('roles', $user->roles->pluck('name')->toArray())))>
                                    <div>
                                        <span class="block text-sm font-medium text-gray-900">{{ \Illuminate\Support\Str::headline($role->name) }}</span>
                                        <span class="mt-1 block text-xs text-gray-500">{{ __('Role key: :role', ['role' => $role->name]) }}</span>
                                    </div>
                                </label>
                            @empty
                                <p class="text-sm text-gray-500">{{ __('No roles have been defined yet.') }}</p>
                            @endforelse
                        </div>
                        <x-input-error for="roles" class="mt-2" />
                        <x-input-error for="roles.*" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end gap-3">
                        <a href="{{ route('admin.users.show', $user) }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">{{ __('Cancel') }}</a>
                        <x-button>{{ __('Save changes') }}</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
