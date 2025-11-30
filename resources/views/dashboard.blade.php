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

            @php
                $companySections = [
                    [
                        'label' => 'Clients',
                        'description' => 'Manage customer records for your company.',
                        'route' => 'clients.index',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 20.25a7.5 7.5 0 0115 0" />',
                    ],
                    [
                        'label' => 'Projects',
                        'description' => 'Organise project work and milestones.',
                        'route' => 'projects.index',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 8.25l9-5.25 9 5.25v7.5l-9 5.25-9-5.25v-7.5z" /><path stroke-linecap="round" stroke-linejoin="round" d="M12 12l9-5.25M12 12v10.5M12 12L3 6.75" />',
                    ],
                    [
                        'label' => 'Invoices',
                        'description' => 'Create and track invoices.',
                        'route' => 'invoices.index',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25h6m-6 3h6m-6 3h3m6-10.5H6a1.5 1.5 0 00-1.5 1.5v12.75L8.25 15 12 18l3.75-3L19.5 18V6A1.5 1.5 0 0018 4.5z" />',
                    ],
                    [
                        'label' => 'Estimates',
                        'description' => 'Send professional estimates.',
                        'route' => 'estimates.index',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />',
                    ],
                    [
                        'label' => 'Tools',
                        'description' => 'Track tools and assignments.',
                        'route' => 'tools.index',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 9.75V7.5l4.5-4.5-3-3-4.5 4.5h-2.25L7.5 7.5 12 12l4.5-4.5zm0 0L21 3" /><path stroke-linecap="round" stroke-linejoin="round" d="M18.75 16.5l-1.5 1.5m-3 3l-1.5 1.5M15 21l-3-3m0 0l-6-6m6 6l3-3m-3 3l-3 3" />',
                    ],
                    [
                        'label' => 'Vehicles',
                        'description' => 'Manage fleet and maintenance.',
                        'route' => 'vehicles.index',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75h.008v.008H6.75v-.008zM17.25 15.75h.008v.008h-.008v-.008z" /><path stroke-linecap="round" stroke-linejoin="round" d="M5.25 7.5h13.5M4.5 12h15m-1.5 3.75a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm-9 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm-5.25 0v-6a1.5 1.5 0 011.5-1.5h11.972a1.5 1.5 0 011.468 1.188l.84 4.5A1.5 1.5 0 0116.5 15.75H4.5z" />',
                    ],
                    [
                        'label' => 'Purchase Orders',
                        'description' => 'Create and manage POs.',
                        'route' => 'purchase-orders.index',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m0 0l3-3m-3 3l-3-3" /><path stroke-linecap="round" stroke-linejoin="round" d="M6 9V6.75A1.875 1.875 0 017.875 4.875h8.25A1.875 1.875 0 0118 6.75V9m-12 0h12m-12 0v9.75A1.875 1.875 0 007.875 20.625h8.25A1.875 1.875 0 0018 18.75V9" />',
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">
                @foreach ($companySections as $section)
                    @php
                        $isDisabled = ! $defaultCompany;
                    @endphp
                    <a
                        href="{{ $isDisabled ? '#' : route($section['route']) }}"
                        @if($isDisabled) aria-disabled="true" @endif
                        class="card border border-base-200 shadow-sm hover:shadow-md transition bg-white {{ $isDisabled ? 'opacity-70 cursor-not-allowed' : '' }}"
                    >
                        <div class="card-body p-5">
                            <div class="flex items-center justify-between">
                                <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-700 flex items-center justify-center">
                                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                        {!! $section['icon'] !!}
                                    </svg>
                                </div>
                                <span class="badge badge-primary badge-outline">Access</span>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mt-4">{{ $section['label'] }}</h3>
                            <p class="text-sm text-gray-600 leading-relaxed">{{ $section['description'] }}</p>
                            <div class="mt-4 flex items-center gap-2 text-blue-700 font-medium">
                                <span>{{ $isDisabled ? 'Select a default company first' : 'Open section' }}</span>
                                @unless ($isDisabled)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5.25l6 6-6 6" />
                                    </svg>
                                @endunless
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mb-6 bg-blue-50 border border-blue-200 text-blue-900 px-4 py-4 rounded-lg">
                <div class="flex items-start gap-3">
                    <div class="mt-1">
                        <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
                        </svg>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm font-semibold">Clients, Invoices and Estimates belong to your selected company.</p>
                        @if ($defaultCompany)
                            <p class="text-sm">You're currently working with <span class="font-semibold">{{ $defaultCompany->name }}</span> as your default company. Add or switch companies from the <a class="text-blue-700 underline" href="{{ route('companies.index') }}">Companies</a> area to manage separate sets of clients, invoices and estimates for each one.</p>
                        @else
                            <p class="text-sm">To start using Clients, Invoices or Estimates, create a company and set it as your default. Each company keeps its own clients, invoices and estimates, and you can switch your default company anytime from the <a class="text-blue-700 underline" href="{{ route('companies.index') }}">Companies</a> area.</p>
                            <div class="flex flex-wrap gap-3">
                                <a href="{{ route('companies.create') }}" class="inline-flex items-center px-3 py-2 bg-blue-600 text-white text-xs font-semibold rounded-md hover:bg-blue-700">Create a company</a>
                                <a href="{{ route('companies.index') }}" class="inline-flex items-center px-3 py-2 border border-blue-600 text-blue-700 text-xs font-semibold rounded-md hover:bg-blue-50">Review companies</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

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

                        <a href="{{ route('clients.index') }}" class="flex items-center justify-between p-3 border border-gray-200 rounded-md hover:bg-gray-50">
                            <div>
                                <p class="text-sm font-medium text-gray-900">Manage clients</p>
                                <p class="text-xs text-gray-600">View clients for your default company and track their projects.</p>
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
