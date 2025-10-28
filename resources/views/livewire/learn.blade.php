<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Learning: {{ $section->title }}
            </h2>
            <a href="{{ route('learn.dashboard') }}" class="text-sm text-gray-600 hover:text-gray-900">
                &larr; Back to Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if($question)
                    {{-- Progress --}}
                    <div class="mb-6">
                        <p class="text-sm text-gray-600 text-right">Question {{ $currentQuestionIndex + 1 }} of {{ count($questionIds) }}</p>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ (($currentQuestionIndex + 1) / count($questionIds)) * 100 }}%"></div>
                        </div>
                    </div>

                    {{-- Question --}}
                    <h3 class="text-xl font-semibold mb-6">{{ $question->text }}</h3>

                    {{-- Options --}}
                    <div class="space-y-4">
                        @foreach($question->options as $option)
                            @php
                                $baseClasses = 'flex items-center p-4 border rounded-md transition-colors';
                                $interactionClasses = $isAnswered ? '' : 'cursor-pointer hover:bg-gray-100';

                                $feedbackClasses = '';
                                if ($isAnswered) {
                                    if ($option->is_correct) {
                                        $feedbackClasses = 'bg-green-100 border-green-400 text-green-800'; // Correct answer
                                    } elseif ($selectedOptionId == $option->id && !$isCorrect) {
                                        $feedbackClasses = 'bg-red-100 border-red-400 text-red-800'; // User's wrong choice
                                    } else {
                                        $feedbackClasses = 'border-gray-300 text-gray-500'; // Other incorrect options
                                    }
                                }
                            @endphp
                            <div wire:click="selectAnswer({{ $option->id }})" class="{{ $baseClasses }} {{ $interactionClasses }} {{ $feedbackClasses }}">
                                <span>{{ $option->text }}</span>
                            </div>
                        @endforeach
                    </div>

                    {{-- Feedback and Next Button --}}
                    @if($isAnswered)
                        <div class="mt-6 p-4 rounded-lg @if($isCorrect) bg-green-50 @else bg-red-50 @endif">
                            <h4 class="font-bold text-lg @if($isCorrect) text-green-800 @else text-red-800 @endif">
                                {{ $isCorrect ? 'Correct!' : 'Incorrect.' }}
                            </h4>
                            @if($question->explanation)
                                <p class="mt-2 text-gray-700">{{ $question->explanation }}</p>
                            @endif
                        </div>
                        <div class="mt-6 text-right">
                            <button wire:click="nextQuestion" class="px-6 py-2 bg-blue-600 text-white font-bold rounded-md hover:bg-blue-700">Next Question &rarr;</button>
                        </div>
                    @endif

                @else
                    <p>You have completed all questions in this section!</p>
                    <div class="mt-6">
                        <a href="{{ route('learn.dashboard') }}" class="px-4 py-2 bg-blue-600 text-white text-sm rounded-md hover:bg-blue-700">
                            Back to Dashboard
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>