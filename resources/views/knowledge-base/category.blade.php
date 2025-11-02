<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $category->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <x-breadcrumb :links="[
                ['label' => __('Knowledge Base'), 'url' => route('knowledge-base.index')],
                ['label' => $category->name],
            ]" />

            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="p-8 border-b border-gray-100">
                    <h1 class="text-3xl font-semibold text-gray-900">{{ $category->name }}</h1>
                    <p class="mt-2 text-gray-600">{{ $category->description ?? __('Explore every topic we cover inside this category.') }}</p>
                </div>

                <div class="p-8">
                    <div class="grid gap-6 md:grid-cols-2">
                        @forelse ($category->topics as $topic)
                            <a href="{{ route('knowledge-base.topics.show', $topic) }}" class="block rounded-lg border border-gray-100 p-5 hover:border-indigo-200 hover:shadow">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <h3 class="text-base font-semibold text-gray-900">{{ $topic->name }}</h3>
                                        <p class="mt-2 text-sm text-gray-600 line-clamp-3">{{ $topic->description ?? __('Read guides, FAQs and best practices for this topic.') }}</p>
                                    </div>
                                    <span class="inline-flex items-center rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700">{{ trans_choice(':count article|:count articles', $topic->articles_count, ['count' => $topic->articles_count]) }}</span>
                                </div>
                            </a>
                        @empty
                            <p class="text-sm text-gray-500">{{ __('No topics have been added to this category yet.') }}</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
