<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Quiz Questions') }}
            </h2>
            <a href="{{ route('admin.quizzes.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md text-sm">
                Add New Question
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if (session()->has('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <div class="space-y-8">
                    @foreach($sections as $section)
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 border-b pb-2 mb-3">{{ $section->title }}</h3>
                            <div class="space-y-2">
                                @forelse($section->questions as $question)
                                    <div class="flex justify-between items-center py-2 px-3 rounded-md hover:bg-gray-50">
                                        <p class="text-gray-700">{{ $question->text }}</p>
                                        <div class="space-x-4 flex-shrink-0">
                                            <a href="{{ route('admin.quizzes.edit', $question) }}" class="text-blue-600 hover:text-blue-900 text-sm">Edit</a>
                                            <button
                                                    wire:click="deleteQuestion({{ $question->id }})"
                                                    wire:confirm="Are you sure you want to delete this question?"
                                                    class="text-red-600 hover:text-red-900 text-sm"
                                            >
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-gray-500 text-sm px-3">No questions have been added for this section yet.</p>
                                @endforelse
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>