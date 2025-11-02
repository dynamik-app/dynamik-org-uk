<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Role') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8 border-b border-gray-100 flex items-start justify-between gap-4">
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900">{{ $role->name }}</h3>
                        <p class="mt-1 text-gray-600">{{ __('Update the role details and permissions granted to members.') }}</p>
                    </div>
                    <a href="{{ route('admin.roles.show', $role) }}" class="inline-flex items-center rounded-md border border-transparent bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2">
                        {{ __('View role') }}
                    </a>
                </div>

                <form action="{{ route('admin.roles.update', $role) }}" method="POST" class="p-8 space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-label for="name" value="{{ __('Role name') }}" />
                        <x-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name', $role->name) }}" required />
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <x-label value="{{ __('Assign permissions') }}" />
                        <div class="mt-3 grid gap-3 sm:grid-cols-2">
                            @forelse ($permissions as $permission)
                                <label class="flex items-start gap-3 rounded-lg border border-gray-200 p-4 hover:border-indigo-400">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" class="mt-1 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" {{ in_array($permission->name, old('permissions', $role->permissions->pluck('name')->all())) ? 'checked' : '' }}>
                                    <span class="text-sm text-gray-700">{{ $permission->name }}</span>
                                </label>
                            @empty
                                <p class="text-sm text-gray-500">{{ __('No permissions available yet.') }}</p>
                            @endforelse
                        </div>
                        @error('permissions')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        @error('permissions.*')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end gap-3">
                        <a href="{{ route('admin.roles.index') }}" class="inline-flex items-center rounded-md border border-transparent bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2">
                            {{ __('Cancel') }}
                        </a>
                        <x-button>
                            {{ __('Save changes') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
