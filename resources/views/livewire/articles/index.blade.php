<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Knowledge Base') }}
                </h2>
            </x-slot>
            <div class="space-y-6">
                @forelse($articles as $article)
                    <div class="border-b pb-4">
                        <a href="{{ route('knowledge-base.show', $article->slug) }}" class="text-xl font-semibold hover:text-blue-600 transition-colors duration-200">
                            {{ $article->title }}
                        </a>
                        <p class="text-gray-600 mt-2 line-clamp-2">
                            {{ Str::limit($article->content, 150) }}
                        </p>
                        <span class="text-sm text-gray-400 mt-2 block">
                            Published on {{ $article->created_at->format('M d, Y') }}
                        </span>
                    </div>
                @empty
                    <p class="text-gray-500">No articles have been published yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>