<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Knowledge Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8 border-b border-gray-100">
                    <h3 class="text-2xl font-semibold text-gray-900">{{ __('Create category') }}</h3>
                    <p class="mt-1 text-gray-600">{{ __('Provide a clear name and optional description to help users understand what belongs here.') }}</p>
                </div>

                <form method="POST" action="{{ route('admin.knowledge-base.categories.store') }}" class="p-8 space-y-6">
                    @csrf

                    <div>
                        <x-label for="name" value="{{ __('Category name') }}" />
                        <x-input id="name" name="name" type="text" class="mt-1 block w-full" required value="{{ old('name') }}" />
                        <x-input-error for="name" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="slug" value="{{ __('Slug (optional)') }}" />
                        <x-input id="slug" name="slug" type="text" class="mt-1 block w-full" value="{{ old('slug') }}" />
                        <p class="mt-1 text-xs text-gray-500">{{ __('Leave empty to generate automatically from the name.') }}</p>
                        <x-input-error for="slug" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="description" value="{{ __('Description') }}" />
                        <textarea id="description" name="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description') }}</textarea>
                        <x-input-error for="description" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end gap-4">
                        <a href="{{ route('admin.knowledge-base.categories.index') }}" class="text-gray-600 hover:text-gray-800">{{ __('Cancel') }}</a>
                        <x-button>{{ __('Create category') }}</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
