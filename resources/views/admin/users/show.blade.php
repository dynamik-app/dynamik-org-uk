<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User details') }}
            </h2>
            <a href="{{ route('admin.users.index') }}" class="text-sm text-indigo-600 hover:text-indigo-900">&larr; {{ __('Back to users') }}</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if (session('status'))
                    <div class="px-6 py-3 bg-green-50 text-green-700 border-b border-green-100">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="p-8 grid gap-8">
                    <div class="flex items-start gap-6">
                        <img class="h-20 w-20 rounded-full object-cover" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                        <div>
                            <h3 class="text-2xl font-semibold text-gray-900">{{ $user->name }}</h3>
                            <p class="text-gray-600">{{ $user->email }}</p>
                            <p class="text-sm text-gray-400 mt-2">{{ __('Member since :date', ['date' => $user->created_at?->format('j F Y')]) }}</p>
                        </div>
                    </div>

                    <div class="grid gap-4">
                        <h4 class="text-lg font-semibold text-gray-900">{{ __('Roles') }}</h4>
                        @if ($user->roles->isNotEmpty())
                            <div class="flex flex-wrap gap-2">
                                @foreach ($user->roles as $role)
                                    <span class="inline-flex items-center rounded-full bg-indigo-100 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-indigo-700">{{ $role->name }}</span>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500">{{ __('No roles assigned.') }}</p>
                        @endif
                    </div>

                    <div class="grid gap-4">
                        <h4 class="text-lg font-semibold text-gray-900">{{ __('Permissions') }}</h4>
                        @if ($user->permissions->isNotEmpty())
                            <div class="flex flex-wrap gap-2">
                                @foreach ($user->permissions as $permission)
                                    <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-slate-700">{{ $permission->name }}</span>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500">{{ __('No direct permissions assigned.') }}</p>
                        @endif
                    </div>
                </div>

                <div class="px-8 py-6 flex items-center justify-between border-t border-gray-100">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.users.edit', $user) }}" class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">{{ __('Edit user') }}</a>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this user?') }}');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">{{ __('Delete user') }}</button>
                        </form>
                    </div>
                    <a href="mailto:{{ $user->email }}" class="text-sm text-gray-500 hover:text-gray-700">{{ __('Send email') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
