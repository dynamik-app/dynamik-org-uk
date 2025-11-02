<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Knowledge Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8 border-b border-gray-100">
                    <h3 class="text-2xl font-semibold text-gray-900">{{ __('Compose article') }}</h3>
                    <p class="mt-1 text-gray-600">{{ __('Assign the article to a topic and decide whether to keep it as a draft or publish it now.') }}</p>
                </div>

                <form method="POST" action="{{ route('admin.knowledge-base.articles.store') }}" class="p-8 space-y-6">
                    @csrf

                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <x-label for="category_id" value="{{ __('Category') }}" />
                            <select id="category_id" name="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                <option value="">{{ __('Select a category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error for="category_id" class="mt-2" />
                        </div>

                        <div>
                            <x-label for="topic_id" value="{{ __('Topic') }}" />
                            <select id="topic_id" name="topic_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                <option value="">{{ __('Select a topic') }}</option>
                                @foreach ($categories as $category)
                                    @if ($category->topics->isNotEmpty())
                                        <optgroup label="{{ $category->name }}">
                                            @foreach ($category->topics as $topic)
                                                <option value="{{ $topic->id }}" @selected(old('topic_id') == $topic->id)>{{ $topic->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endif
                                @endforeach
                            </select>
                            <x-input-error for="topic_id" class="mt-2" />
                        </div>
                    </div>

                    <div>
                        <x-label for="title" value="{{ __('Title') }}" />
                        <x-input id="title" name="title" type="text" class="mt-1 block w-full" required value="{{ old('title') }}" />
                        <x-input-error for="title" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="slug" value="{{ __('Slug (optional)') }}" />
                        <x-input id="slug" name="slug" type="text" class="mt-1 block w-full" value="{{ old('slug') }}" />
                        <p class="mt-1 text-xs text-gray-500">{{ __('Leave empty to generate automatically from the title.') }}</p>
                        <x-input-error for="slug" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="summary" value="{{ __('Summary (optional)') }}" />
                        <textarea id="summary" name="summary" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('summary') }}</textarea>
                        <x-input-error for="summary" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="content" value="{{ __('Content') }}" />
                        <textarea id="content" name="content" rows="10" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('content') }}</textarea>
                        <x-input-error for="content" class="mt-2" />
                    </div>

                    <div class="md:flex md:items-center md:justify-between md:gap-6">
                        <div class="md:w-1/3">
                            <x-label for="status" value="{{ __('Status') }}" />
                            <select id="status" name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="draft" @selected(old('status') === 'draft')>{{ __('Draft') }}</option>
                                <option value="published" @selected(old('status') === 'published')>{{ __('Published') }}</option>
                            </select>
                            <x-input-error for="status" class="mt-2" />
                        </div>
                        <div class="mt-6 md:mt-0 md:flex-1 md:text-right">
                            <a href="{{ route('admin.knowledge-base.articles.index') }}" class="text-gray-600 hover:text-gray-800">{{ __('Cancel') }}</a>
                            <x-button class="ml-4">{{ __('Save article') }}</x-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
