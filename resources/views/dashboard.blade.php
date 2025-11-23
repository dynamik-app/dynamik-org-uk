<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-8">
                <div class="bg-white shadow rounded-lg p-6 xl:col-span-1">
                    <p class="text-sm text-gray-500">Quick access</p>
                    <h3 class="text-xl font-semibold text-gray-900 mt-1">Common operations</h3>
                    <p class="text-sm text-gray-600 mt-2">Jump straight into company onboarding tasks.</p>

                    <div class="mt-4 space-y-3">
                        <a href="{{ route('companies.index') }}" class="flex items-center justify-between p-3 border border-gray-200 rounded-md hover:bg-gray-50">
                            <div>
                                <p class="text-sm font-medium text-gray-900">Manage companies</p>
                                <p class="text-xs text-gray-600">Review your companies and choose a default for quick actions.</p>
                            </div>
                            <span class="text-blue-600 text-sm">Open</span>
                        </a>

                        <a href="{{ route('companies.create') }}" class="flex items-center justify-between p-3 border border-gray-200 rounded-md hover:bg-gray-50">
                            <div>
                                <p class="text-sm font-medium text-gray-900">Create a company</p>
                                <p class="text-xs text-gray-600">Capture a new company profile for your organisation.</p>
                            </div>
                            <span class="text-blue-600 text-sm">Start</span>
                        </a>

                        <a href="{{ route('companies.invitations.create') }}" class="flex items-center justify-between p-3 border border-gray-200 rounded-md hover:bg-gray-50">
                            <div>
                                <p class="text-sm font-medium text-gray-900">Invite a manager</p>
                                <p class="text-xs text-gray-600">Send an invitation to collaborate on a company.</p>
                            </div>
                            <span class="text-blue-600 text-sm">Send</span>
                        </a>

                        <a href="{{ route('companies.invitations.accept') }}" class="flex items-center justify-between p-3 border border-gray-200 rounded-md hover:bg-gray-50">
                            <div>
                                <p class="text-sm font-medium text-gray-900">Accept an invitation</p>
                                <p class="text-xs text-gray-600">Enter the token from your invite to get access.</p>
                            </div>
                            <span class="text-blue-600 text-sm">Open</span>
                        </a>
                    </div>
                </div>

                <div class="xl:col-span-2">
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
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
