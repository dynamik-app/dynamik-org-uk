<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">{{ $company->registered_name }}</p>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Create project') }}</h2>
            </div>
            <a href="{{ route('projects.index') }}" class="text-sm text-blue-600 hover:text-blue-800">Back to projects</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:projects.create-project-form :company="$company" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
