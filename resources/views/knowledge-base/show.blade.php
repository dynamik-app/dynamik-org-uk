<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Knowledge Base') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <x-breadcrumb :links="[
                ['label' => __('Knowledge Base'), 'url' => route('knowledge-base.index')],
                ['label' => $article->category?->name, 'url' => $article->category ? route('knowledge-base.categories.show', $article->category) : null],
                ['label' => $article->topic?->name, 'url' => $article->topic ? route('knowledge-base.topics.show', $article->topic) : null],
                ['label' => $article->title],
            ]" />

            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="p-8 border-b border-gray-100">
                    <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                        <div>
                            <h1 class="text-3xl font-semibold text-gray-900">{{ $article->title }}</h1>
                            <div class="mt-3 flex flex-wrap items-center gap-3 text-sm text-gray-500">
                                @if ($article->category)
                                    <span class="inline-flex items-center rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700">{{ $article->category->name }}</span>
                                @endif
                                @if ($article->topic)
                                    <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700">{{ $article->topic->name }}</span>
                                @endif
                                <span>{{ __('Updated :date', ['date' => $article->updated_at?->format('j M Y') ?? __('n/a')]) }}</span>
                                <span>{{ __('Written by :author', ['author' => $article->author?->name ?? __('Support team')]) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="prose prose-indigo max-w-none p-8">
                    {!! $article->content !!}
                </div>
            </div>

            @if ($related->isNotEmpty())
                <div class="bg-white shadow-xl sm:rounded-lg">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-lg font-semibold text-gray-900">{{ __('Related articles') }}</h2>
                        <p class="text-sm text-gray-500">{{ __('Continue learning with more guides from this topic.') }}</p>
                    </div>
                    <div class="divide-y divide-gray-100">
                        @foreach ($related as $relatedArticle)
                            <a href="{{ route('knowledge-base.show', $relatedArticle) }}" class="block px-6 py-5 hover:bg-gray-50">
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <h3 class="text-base font-semibold text-gray-900">{{ $relatedArticle->title }}</h3>
                                        <p class="mt-1 text-sm text-gray-600 line-clamp-2">{{ $relatedArticle->summary ?? \Illuminate\Support\Str::limit(strip_tags($relatedArticle->content), 140) }}</p>
                                    </div>
                                    <span class="text-xs text-gray-400">{{ $relatedArticle->published_at?->format('j M Y') }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
