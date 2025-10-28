<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ECS Health, Safety & Environmental Assessment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                {{-- Start Screen --}}
                @if(!$quizStarted && !$quizFinished)
                    <div class="text-center">
                        <h3 class="text-2xl font-bold mb-4">Assessment Rules</h3>
                        <ul class="list-disc list-inside text-left max-w-md mx-auto mb-6">
                            <li>The assessment contains <strong>50 multiple-choice questions</strong>.</li>
                            <li>You have <strong>30 minutes</strong> to complete the assessment.</li>
                            <li>You need <strong>43 correct answers</strong> to pass.</li>
                            <li>Questions are selected randomly from all 11 topics.</li>
                        </ul>
                        <button wire:click="startQuiz" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-md text-lg hover:bg-blue-700">
                            Start Assessment
                        </button>
                    </div>
                @endif

                {{-- Quiz In Progress --}}
                @if($quizStarted)
                    <div wire:poll.1s="decrementTime">
                        {{-- Header with Timer and Progress --}}
                        <div class="flex justify-between items-center border-b pb-4 mb-6">
                            <div class="text-lg">
                                Question <strong>{{ $currentQuestionIndex + 1 }}</strong> of 50
                            </div>
                            <div
                                    class="text-2xl font-bold px-4 py-2 rounded-md"
                                    :class="{ 'text-red-600': @js($timeRemaining) < 300, 'text-gray-800': @js($timeRemaining) >= 300 }"
                                    x-data="{
                                time: @js($timeRemaining),
                                formatTime() {
                                    const minutes = Math.floor(this.time / 60);
                                    const seconds = this.time % 60;
                                    return `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                                }
                            }"
                                    x-init="
                                let timer = setInterval(() => {
                                    if (time > 0) {
                                        time--;
                                    } else {
                                        clearInterval(timer);
                                    }
                                }, 1000);
                            "
                            >
                                <span x-text="formatTime()"></span>
                            </div>
                        </div>

                        {{-- Question and Options --}}
                        <div>
                            @if($this->currentQuestion)
                                <h3 class="text-xl font-semibold mb-6">{{ $this->currentQuestion->text }}</h3>
                                <div class="space-y-4">
                                    {{-- FIX #1: Added a wire:key to the label to help Livewire track each option --}}
                                    @foreach($this->currentQuestion->options as $option)
                                        <label
                                                wire:key="option-{{ $option->id }}"
                                                class="flex items-center p-4 border rounded-md cursor-pointer hover:bg-gray-100"
                                                :class="{'bg-blue-100 border-blue-400': @js($userAnswers[$this->currentQuestion->id] ?? null) == {{ $option->id }} }"
                                        >
                                            <input
                                                    type="radio"
                                                    {{-- FIX #1: Made the name unique to each question to prevent browser state issues --}}
                                                    name="option-{{ $this->currentQuestion->id }}"
                                                    value="{{ $option->id }}"
                                                    wire:click="setAnswer({{ $this->currentQuestion->id }}, {{ $option->id }})"
                                                    class="h-5 w-5"
                                            >
                                            <span class="ml-4 text-gray-700">{{ $option->text }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        {{-- Navigation --}}
                        <div class="flex justify-between mt-8 border-t pt-4">
                            <button wire:click="previousQuestion" @if($currentQuestionIndex == 0) disabled @endif class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md disabled:opacity-50">Previous</button>

                            {{-- FIX #2: Corrected the logic to show the "Finish" button on the last question --}}
                            @if($currentQuestionIndex == 49)
                                <button wire:click="finishQuiz" wire:confirm="Are you sure you want to finish the assessment?" class="px-6 py-2 bg-green-600 text-white font-bold rounded-md hover:bg-green-700">Finish Assessment</button>
                            @else
                                <button wire:click="nextQuestion" class="px-4 py-2 bg-blue-600 text-white rounded-md">Next</button>
                            @endif
                        </div>
                    </div>
                @endif

                {{-- Results Screen --}}
                @if($quizFinished)
                    <div class="text-center">
                        <h3 class="text-2xl font-bold mb-4">Assessment Complete</h3>
                        @if($finalScore >= 43)
                            <div class="p-6 bg-green-100 text-green-800 rounded-lg">
                                <h4 class="text-4xl font-extrabold">Congratulations! You Passed!</h4>
                            </div>
                        @else
                            <div class="p-6 bg-red-100 text-red-800 rounded-lg">
                                <h4 class="text-4xl font-extrabold">Unfortunately, you did not pass.</h4>
                            </div>
                        @endif
                        <div class="mt-6 text-2xl">
                            Your Score: <span class="font-bold">{{ $finalScore }}</span> / 50
                        </div>
                        <div class="mt-8">
                            {{-- You can change this route to whatever you prefer --}}
                            <a href="{{ url('/') }}" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-md text-lg hover:bg-blue-700">Return Home</a>
                        </div>
                    </div>
                @endif
 
            </div>
        </div>
    </div>
</div>