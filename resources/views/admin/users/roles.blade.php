<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Role Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">{{ __('Organise user access') }}</h3>
                <p class="text-gray-600 leading-relaxed">
                    {{ __("Define and assign roles to control who can access different tools and features. Hook this page into your RBAC implementation when it is available.") }}
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
