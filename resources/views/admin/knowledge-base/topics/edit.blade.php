<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Knowledge Topic') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8 border-b border-gray-100">
                    <h3 class="text-2xl font-semibold text-gray-900">{{ $topic->name }}</h3>
                    <p class="mt-1 text-gray-600">{{ __('Adjust the category, slug or description for this topic.') }}</p>
                </div>

                <form method="POST" action="{{ route('admin.knowledge-base.topics.update', $topic) }}" class="p-8 space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-label for="category_id" value="{{ __('Category') }}" />
                        <select id="category_id" name="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            @foreach ($categories as $id => $name)
                                <option value="{{ $id }}" @selected(old('category_id', $topic->category_id) == $id)>{{ $name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="category_id" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="name" value="{{ __('Topic name') }}" />
                        <x-input id="name" name="name" type="text" class="mt-1 block w-full" required value="{{ old('name', $topic->name) }}" />
                        <x-input-error for="name" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="slug" value="{{ __('Slug (optional)') }}" />
                        <x-input id="slug" name="slug" type="text" class="mt-1 block w-full" value="{{ old('slug', $topic->slug) }}" />
                        <p class="mt-1 text-xs text-gray-500">{{ __('Leave empty to regenerate from the name.') }}</p>
                        <x-input-error for="slug" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="description" value="{{ __('Description') }}" />
                        <textarea id="description" name="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $topic->description) }}</textarea>
                        <x-input-error for="description" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="{{ route('admin.knowledge-base.topics.index') }}" class="text-gray-600 hover:text-gray-800">{{ __('Back to topics') }}</a>
                        <x-button>{{ __('Save changes') }}</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
