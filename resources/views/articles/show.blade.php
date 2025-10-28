<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Knowledge Base') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Breadcrumb Component -->
            <x-breadcrumb :links="[
                ['label' => 'Knowledge Base', 'url' => route('knowledge-base.index')],
                ['label' => $article->title]
            ]" />

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>
                <p class="text-sm text-gray-400 mb-6">Published on {{ $article->created_at->format('M d, Y') }}</p>
                <div class="prose max-w-none">
                    {{ $article->content }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
