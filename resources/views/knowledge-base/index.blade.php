<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Knowledge Base') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-[2fr,1fr]">
                <div class="space-y-8">
                    <div class="bg-white shadow-xl sm:rounded-lg">
                        <div class="p-8 border-b border-gray-100">
                            <h1 class="text-3xl font-semibold text-gray-900">{{ __('How can we help?') }}</h1>
                            <p class="mt-2 text-gray-600">{{ __('Browse topics or search for keywords to discover step-by-step answers from our team.') }}</p>
                        </div>
                        <div class="p-8">
                            <form action="{{ route('knowledge-base.index') }}" method="GET" class="space-y-4">
                                <div>
                                    <label for="knowledge-search" class="sr-only">{{ __('Search articles') }}</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 18a7.5 7.5 0 006.15-3.35z" />
                                            </svg>
                                        </span>
                                        <input id="knowledge-search" type="search" name="q" value="{{ $query }}" class="block w-full rounded-lg border border-gray-200 py-3 pl-11 pr-4 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500" placeholder="{{ __('Search by question, keyword or feature...') }}">
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <x-button type="submit">{{ __('Search') }}</x-button>
                                    @if ($hasQuery)
                                        <a href="{{ route('knowledge-base.index') }}" class="text-sm text-gray-600 hover:text-gray-800">{{ __('Clear search') }}</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="space-y-6">
                        @if ($hasQuery)
                            <div class="bg-white shadow-xl sm:rounded-lg">
                                <div class="p-6 border-b border-gray-100">
                                    <h2 class="text-lg font-semibold text-gray-900">{{ __('Search results') }}</h2>
                                    <p class="text-sm text-gray-500">{{ __('Showing the most relevant articles for ":query"', ['query' => $query]) }}</p>
                                </div>
                                <div class="divide-y divide-gray-100">
                                    @forelse ($articles as $article)
                                        <a href="{{ route('knowledge-base.show', $article) }}" class="block px-6 py-5 hover:bg-gray-50">
                                            <div class="flex items-start justify-between gap-4">
                                                <div>
                                                    <h3 class="text-lg font-medium text-gray-900">{{ $article->title }}</h3>
                                                    <p class="mt-2 text-sm text-gray-600 line-clamp-2">{{ $article->summary ?? \Illuminate\Support\Str::limit(strip_tags($article->content), 140) }}</p>
                                                </div>
                                                <span class="inline-flex items-center rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700">{{ $article->topic?->name }}</span>
                                            </div>
                                        </a>
                                    @empty
                                        <div class="px-6 py-10 text-center text-sm text-gray-500">
                                            {{ __('No articles matched your search. Try different keywords or browse by topic.') }}
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        @else
                            <div class="bg-white shadow-xl sm:rounded-lg">
                                <div class="p-6 border-b border-gray-100">
                                    <h2 class="text-lg font-semibold text-gray-900">{{ __('Popular categories') }}</h2>
                                    <p class="text-sm text-gray-500">{{ __('Start with the areas where we answer the most questions.') }}</p>
                                </div>
                                <div class="grid gap-6 p-6 md:grid-cols-2">
                                    @forelse ($categories as $category)
                                        <a href="{{ route('knowledge-base.categories.show', $category) }}" class="block rounded-lg border border-gray-100 p-5 hover:border-indigo-200 hover:shadow">
                                            <h3 class="text-base font-semibold text-gray-900">{{ $category->name }}</h3>
                                            <p class="mt-2 text-sm text-gray-600 line-clamp-3">{{ $category->description ?? __('Explore the topics and guides that sit within this category.') }}</p>
                                            <div class="mt-4 inline-flex items-center rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700">
                                                {{ trans_choice(':count published article|:count published articles', $category->articles_count, ['count' => $category->articles_count]) }}
                                            </div>
                                        </a>
                                    @empty
                                        <p class="text-sm text-gray-500">{{ __('No categories available yet. Check back soon!') }}</p>
                                    @endforelse
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <aside class="space-y-6">
                    <div class="bg-white shadow-xl sm:rounded-lg">
                        <div class="p-6 border-b border-gray-100">
                            <h2 class="text-lg font-semibold text-gray-900">{{ __('Browse topics') }}</h2>
                            <p class="mt-1 text-sm text-gray-500">{{ __('Navigate by category to find detailed walkthroughs.') }}</p>
                        </div>
                        <div class="p-6 space-y-4">
                            @foreach ($categories as $category)
                                <div>
                                    <h3 class="text-sm font-semibold text-gray-700">{{ $category->name }}</h3>
                                    <ul class="mt-2 space-y-2">
                                        @forelse ($category->topics as $topic)
                                            <li>
                                                <a href="{{ route('knowledge-base.topics.show', $topic) }}" class="flex items-center justify-between text-sm text-gray-600 hover:text-indigo-600">
                                                    <span>{{ $topic->name }}</span>
                                                    <span class="text-xs text-gray-400">{{ $topic->articles_count }}</span>
                                                </a>
                                            </li>
                                        @empty
                                            <li class="text-xs text-gray-400">{{ __('No topics yet') }}</li>
                                        @endforelse
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    @php($supportUrl = Route::has('support') ? route('support') : 'mailto:' . config('mail.from.address', 'support@example.com'))
                    <div class="bg-gray-900 text-white rounded-lg p-6">
                        <h2 class="text-lg font-semibold">{{ __('Still need help?') }}</h2>
                        <p class="mt-2 text-sm text-gray-200">{{ __('Raise a ticket with our support team and we will get back to you within one business day.') }}</p>
                        <a href="{{ $supportUrl }}" class="mt-4 inline-flex items-center rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-900 hover:bg-gray-100">{{ __('Contact support') }}</a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</x-app-layout>
