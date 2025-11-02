<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permission Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">{{ __('Fine-tune capabilities') }}</h3>
                <p class="text-gray-600 leading-relaxed">
                    {{ __("Assign granular permissions to complement your role structure. Replace this placeholder with your chosen permission management interface.") }}
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
