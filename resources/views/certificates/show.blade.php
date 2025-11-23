<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">{{ $certificate->company->registered_name }}</p>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Certificate #') . $certificate->id }}
                </h2>
            </div>
            <a href="{{ route('certificates.index') }}" class="text-sm text-blue-600 hover:text-blue-800">Back to certificates</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('status'))
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-6">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Certificate type</p>
                            <h3 class="text-lg font-semibold text-gray-900">{{ $certificate->type?->name ?? 'Certificate' }}</h3>
                        </div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-50 text-indigo-800">
                            {{ ucfirst($certificate->status ?? 'draft') }}
                        </span>
                    </div>

                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 rounded-lg p-4 space-y-1">
                            <dt class="text-sm text-gray-600">Client</dt>
                            <dd class="text-base font-medium text-gray-900">{{ $certificate->client?->name ?? 'Unassigned' }}</dd>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4 space-y-1">
                            <dt class="text-sm text-gray-600">Project</dt>
                            <dd class="text-base font-medium text-gray-900">{{ $certificate->project?->name ?? 'Unassigned' }}</dd>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4 space-y-1">
                            <dt class="text-sm text-gray-600">Created</dt>
                            <dd class="text-base font-medium text-gray-900">{{ optional($certificate->created_at)->format('d M Y, H:i') }}</dd>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4 space-y-1">
                            <dt class="text-sm text-gray-600">Company</dt>
                            <dd class="text-base font-medium text-gray-900">{{ $certificate->company->registered_name }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
