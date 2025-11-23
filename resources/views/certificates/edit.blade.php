<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">{{ $certificate->company->registered_name }}</p>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Edit Certificate #') . $certificate->id }}</h2>
            </div>
            <a href="{{ route('certificates.show', $certificate) }}" class="text-sm text-blue-600 hover:text-blue-800">Back to summary</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:certificates.edit-certificate :certificate="$certificate" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
