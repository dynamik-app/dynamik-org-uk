<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
                <div class="bg-white shadow rounded-lg p-6 flex flex-col justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Learning Progress</p>
                        <h3 class="text-2xl font-semibold text-gray-900 mt-1">
                            {{ $learnProgress['completed'] }} / {{ $learnProgress['total'] }} sections
                        </h3>
                        <p class="text-sm text-gray-600 mt-2">Track how many learning sections you've completed.</p>
                    </div>
                    <div class="mt-4">
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $learnCompletionPercentage }}%"></div>
                        </div>
                        <p class="text-sm text-gray-600 mt-2">{{ $learnCompletionPercentage }}% complete</p>
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <p class="text-sm text-gray-500">Placeholder</p>
                    <h3 class="text-xl font-semibold text-gray-900 mt-1">Coming soon</h3>
                    <p class="text-sm text-gray-600 mt-2">Additional dashboard insights will appear here.</p>
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <p class="text-sm text-gray-500">Placeholder</p>
                    <h3 class="text-xl font-semibold text-gray-900 mt-1">Coming soon</h3>
                    <p class="text-sm text-gray-600 mt-2">Additional dashboard insights will appear here.</p>
                </div>

                <div class="bg-white shadow rounded-lg p-6">
                    <p class="text-sm text-gray-500">Placeholder</p>
                    <h3 class="text-xl font-semibold text-gray-900 mt-1">Coming soon</h3>
                    <p class="text-sm text-gray-600 mt-2">Additional dashboard insights will appear here.</p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
