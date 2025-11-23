@php use Illuminate\Support\Str; @endphp

<div class="space-y-8">
    <div class="flex flex-wrap gap-3">
        @foreach($steps as $index => $slug)
            <div class="flex items-center space-x-2">
                <span class="flex h-8 w-8 items-center justify-center rounded-full text-sm font-semibold {{ $index === $currentStep ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700' }}">
                    {{ $index + 1 }}
                </span>
                <span class="text-sm font-medium {{ $index === $currentStep ? 'text-indigo-700' : 'text-gray-500' }}">
                    {{ Str::of($slug)->replace('-', ' ')->headline() }}
                </span>
            </div>
        @endforeach
    </div>

    <div class="bg-white shadow rounded-lg p-6 space-y-6">
        @switch($currentStepSlug)
            @case('select-type')
                <div class="space-y-4">
                    <h2 class="text-lg font-semibold text-gray-900">Select certificate type</h2>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Certificate Type</label>
                        <select wire:model="certificateTypeId" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Choose a type</option>
                            @foreach($certificateTypes as $type)
                                <option value="{{ $type['id'] }}">{{ $type['name'] }}</option>
                            @endforeach
                        </select>
                        @error('certificateTypeId')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                @break

            @case('client-details')
                <div class="space-y-4">
                    <h2 class="text-lg font-semibold text-gray-900">Client details</h2>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Client</label>
                        <select wire:model="clientId" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Select client</option>
                            @foreach($clients as $client)
                                <option value="{{ $client['id'] }}">{{ $client['name'] }}</option>
                            @endforeach
                        </select>
                        @error('clientId')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                @break

            @case('installation-details')
                <div class="space-y-4">
                    <h2 class="text-lg font-semibold text-gray-900">Installation details</h2>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Project</label>
                        <select wire:model="projectSelection" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Select a project</option>
                            @foreach($projects as $project)
                                <option value="{{ $project['id'] }}">{{ $project['name'] }}</option>
                            @endforeach
                            <option value="create">Create a new project</option>
                        </select>
                        @error('projectId')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    @if($creatingProject)
                        <div class="border border-dashed border-gray-300 rounded-md p-4 space-y-3 bg-gray-50">
                            <h3 class="text-md font-semibold text-gray-800">New project</h3>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Project name</label>
                                <input type="text" wire:model="projectForm.name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @error('projectForm.name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Address</label>
                                    <input type="text" wire:model="projectForm.address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    @error('projectForm.address')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">City</label>
                                    <input type="text" wire:model="projectForm.city" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    @error('projectForm.city')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Postcode</label>
                                    <input type="text" wire:model="projectForm.postcode" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    @error('projectForm.postcode')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Notes</label>
                                <textarea wire:model="projectForm.notes" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                                @error('projectForm.notes')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    @endif
                </div>
                @break

            @case('review')
                <div class="space-y-4">
                    <h2 class="text-lg font-semibold text-gray-900">Review</h2>
                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-gray-50 rounded p-4">
                            <dt class="text-sm text-gray-600">Certificate type</dt>
                            <dd class="text-base font-medium text-gray-900">
                                {{ collect($certificateTypes)->firstWhere('id', $certificateTypeId)['name'] ?? 'Not selected' }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 rounded p-4">
                            <dt class="text-sm text-gray-600">Client</dt>
                            <dd class="text-base font-medium text-gray-900">
                                {{ collect($clients)->firstWhere('id', $clientId)['name'] ?? 'Not selected' }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 rounded p-4">
                            <dt class="text-sm text-gray-600">Project</dt>
                            <dd class="text-base font-medium text-gray-900">
                                {{ collect($projects)->firstWhere('id', $projectId)['name'] ?? 'Not selected' }}
                            </dd>
                        </div>
                    </dl>
                </div>
                @break

            @default
                @php
                    $template = collect($sectionTemplates)->firstWhere('slug', $currentStepSlug);
                @endphp
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-900">{{ $template['name'] ?? 'Certificate section' }}</h2>
                        <p class="text-sm text-gray-500">Sections follow the selected certificate type.</p>
                    </div>
                    @if($template && view()->exists($template['view']))
                        @include($template['view'], ['formState' => $formState])
                    @else
                        <div class="rounded-md border border-dashed border-gray-300 bg-gray-50 p-4 text-sm text-gray-600">
                            Define a view at <code class="font-mono">resources/views/{{ $template['view'] ?? 'livewire/certificates/sections/...' }}.blade.php</code> to customise this section.
                        </div>
                    @endif
                </div>
        @endswitch
    </div>

    <div class="flex items-center justify-between">
        <button type="button" wire:click="previousStep" class="inline-flex items-center px-4 py-2 rounded-md border border-gray-300 text-gray-700 bg-white shadow-sm disabled:opacity-50" {{ $currentStep === 0 ? 'disabled' : '' }}>
            Back
        </button>

        @if($currentStepSlug === 'review')
            <button type="button" wire:click="saveCertificate" class="inline-flex items-center px-4 py-2 rounded-md border border-transparent text-white bg-indigo-600 hover:bg-indigo-700 shadow-sm">
                Save draft
            </button>
        @else
            <button type="button" wire:click="nextStep" class="inline-flex items-center px-4 py-2 rounded-md border border-transparent text-white bg-indigo-600 hover:bg-indigo-700 shadow-sm">
                Next
            </button>
        @endif
    </div>
</div>
