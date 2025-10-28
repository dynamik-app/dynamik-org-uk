<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $question->exists ? 'Edit Question' : 'Create New Question' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form wire:submit.prevent="save">
                    <div class="space-y-6">

                        {{-- Section Dropdown --}}
                        <div class="mb-4">
                            <label for="section" class="block text-sm font-medium text-gray-700">Section</label>
                            <select wire:model="selectedSectionId" id="section" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                <option value="">-- Choose a section --</option>
                                @foreach($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->title }}</option>
                                @endforeach
                            </select>
                            @error('selectedSectionId') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        {{-- Question Text --}}
                        <div class="mb-4">
                            <label for="questionText" class="block text-sm font-medium text-gray-700">Question</label>
                            <textarea wire:model.lazy="questionText" id="questionText" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                            @error('questionText') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        {{-- Explanation --}}
                        <div class="mb-4">
                            <label for="explanation" class="block text-sm font-medium text-gray-700">Explanation (Optional)</label>
                            <textarea wire:model.lazy="explanation" id="explanation" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                            @error('explanation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        {{-- Answer Options --}}
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Answer Options</label>
                            <p class="text-xs text-gray-500">Select the radio button for the correct answer.</p>
                            <div class="mt-2 space-y-4">
                                @foreach($options as $index => $option)
                                    <div class="flex items-center space-x-3" wire:key="option-{{ $index }}">
                                        <input type="radio" wire:model="correctOptionIndex" value="{{ $index }}" class="h-4 w-4 text-blue-600 border-gray-300">
                                        <input type="text" wire:model.lazy="options.{{ $index }}.text" class="block w-full rounded-md border-gray-300 shadow-sm" placeholder="Answer option {{ $index + 1 }}">
                                        <button type="button" wire:click="removeOption({{ $index }})" class="text-red-500 hover:text-red-700 text-sm">Remove</button>
                                    </div>
                                    @error('options.'.$index.'.text') <div class="text-red-500 text-sm ml-7">{{ $message }}</div> @enderror
                                @endforeach
                                @error('correctOptionIndex') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                            </div>
                            <button type="button" wire:click="addOption" class="mt-4 px-3 py-1.5 text-sm bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Add Option</button>
                        </div>

                    </div>

                    <div class="mt-8 border-t border-gray-200 pt-5">
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Save Question</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>