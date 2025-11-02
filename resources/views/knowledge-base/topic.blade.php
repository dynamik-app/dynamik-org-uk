<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $topic->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <x-breadcrumb :links="[
                ['label' => __('Knowledge Base'), 'url' => route('knowledge-base.index')],
                ['label' => $topic->category->name, 'url' => route('knowledge-base.categories.show', $topic->category)],
                ['label' => $topic->name],
            ]" />

            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="p-8 border-b border-gray-100">
                    <h1 class="text-3xl font-semibold text-gray-900">{{ $topic->name }}</h1>
                    <p class="mt-2 text-gray-600">{{ $topic->description ?? __('Find tutorials, FAQs and troubleshooting advice for this topic.') }}</p>
                </div>

                <div class="divide-y divide-gray-100">
                    @forelse ($topic->articles as $article)
                        <a href="{{ route('knowledge-base.show', $article) }}" class="block px-8 py-6 hover:bg-gray-50">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <h2 class="text-lg font-semibold text-gray-900">{{ $article->title }}</h2>
                                    <p class="mt-2 text-sm text-gray-600 line-clamp-2">{{ $article->summary ?? \Illuminate\Support\Str::limit(strip_tags($article->content), 160) }}</p>
                                </div>
                                <div class="text-right text-xs text-gray-400">
                                    <p>{{ $article->published_at?->format('j M Y') }}</p>
                                    <p>{{ $article->author?->name }}</p>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p class="px-8 py-10 text-center text-sm text-gray-500">{{ __('No articles have been published for this topic yet.') }}</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
