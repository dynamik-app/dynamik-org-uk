<div class="space-y-6">
    <div class="flex items-start justify-between">
        <div class="space-y-1">
            <p class="text-sm text-gray-600">{{ $certificate->type?->name ?? 'Certificate' }} form</p>
            <h3 class="text-lg font-semibold text-gray-900">Update certificate sections</h3>
            <p class="text-sm text-gray-500">Switch between sections to complete the Electrical Installation Condition Report layout.</p>
        </div>
        <button
            type="button"
            wire:click="saveForm"
            wire:loading.attr="disabled"
            class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow hover:bg-indigo-500 disabled:opacity-50"
        >
            Save form
        </button>
    </div>

    @if (session('status'))
        <div class="rounded-md border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
            {{ session('status') }}
        </div>
    @endif

    @if(! empty($sectionTemplates))
        <div class="flex flex-wrap gap-2 border-b border-gray-200 pb-2">
            @foreach($sectionTemplates as $section)
                <button
                    type="button"
                    wire:click="setSection('{{ $section['slug'] }}')"
                    class="px-4 py-2 text-sm font-medium rounded-md"
                    @class([
                        'bg-indigo-100 text-indigo-700' => $currentSectionSlug === $section['slug'],
                        'text-gray-700 hover:bg-gray-100' => $currentSectionSlug !== $section['slug'],
                    ])
                >
                    {{ $section['name'] }}
                </button>
            @endforeach
        </div>

        <div class="bg-white rounded-lg">
            @if($currentTemplate && view()->exists($currentTemplate['view']))
                @include($currentTemplate['view'], ['formState' => $formState])
            @else
                <div class="rounded-md border border-dashed border-gray-300 bg-gray-50 p-4 text-sm text-gray-600">
                    This certificate section does not yet have a view defined.
                </div>
            @endif
        </div>
    @else
        <div class="rounded-md border border-dashed border-gray-300 bg-gray-50 p-4 text-sm text-gray-700">
            This certificate type does not currently have any section templates configured.
        </div>
    @endif
</div>
