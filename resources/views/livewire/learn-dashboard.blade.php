<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Learning Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 space-y-8">

                {{-- CTA STARTS HERE --}}
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div class="mb-4 md:mb-0">
                            <h4 class="text-xl font-bold text-blue-900">Ready to Test Your Knowledge?</h4>
                            <p class="mt-1 text-blue-800">Take the full 50-question assessment with a 30-minute time limit. You'll need 43 correct answers to pass.</p>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="{{ route('quiz.take') }}" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-md hover:bg-blue-700 transition-colors">
                                Start Full Assessment
                            </a>
                        </div>
                    </div>
                </div>
                {{-- CTA ENDS HERE --}}
                <div>
                    <h3 class="text-2xl font-bold">Study Sections</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        @foreach($sections as $section)
                            <div class="border rounded-lg p-4 flex flex-col justify-between hover:shadow-md transition-shadow">
                                <div>
                                    <h4 class="text-lg font-bold">{{ $section->title }}</h4>
                                    <p class="text-sm text-gray-600 mt-2">
                                        Progress: {{ $section->answered_questions_count }} / {{ $section->questions_count }} questions answered.
                                    </p>
                                    @if($section->questions_count > 0)
                                        <div class="w-full bg-gray-200 rounded-full h-2.5 mt-2">
                                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ ($section->answered_questions_count / $section->questions_count) * 100 }}%"></div>
                                        </div>
                                    @endif
                                </div>
                                <div class="mt-4">
                                    <a href="{{ route('learn.section', $section) }}" class="px-4 py-2 bg-blue-600 text-white text-sm rounded-md hover:bg-blue-700">
                                        @if($section->answered_questions_count >= $section->questions_count && $section->questions_count > 0)
                                            Review Section
                                        @else
                                            Start Learning
                                        @endif
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>