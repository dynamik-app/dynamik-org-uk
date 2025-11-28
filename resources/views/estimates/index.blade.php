<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">{{ $company->registered_name }}</p>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Estimates</h2>
            </div>
            <a href="{{ route('estimates.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700">
                <span>New estimate</span>
            </a>
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
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Your estimates</h3>
                            <p class="text-sm text-gray-600">Draft, send, and download estimates for {{ $company->registered_name }}'s clients.</p>
                        </div>
                        <a href="{{ route('estimates.create') }}" class="text-blue-600 hover:text-blue-800">Create estimate</a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Number</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Issued</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Expires</th>
                                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @php
                                    $statusColors = [
                                        'draft' => 'bg-gray-100 text-gray-800',
                                        'sent' => 'bg-blue-100 text-blue-800',
                                        'accepted' => 'bg-green-100 text-green-800',
                                        'declined' => 'bg-red-100 text-red-800',
                                    ];
                                @endphp
                                @forelse ($estimates as $estimate)
                                    <tr>
                                        <td class="px-4 py-3 whitespace-nowrap font-semibold text-gray-900">{{ $estimate->number }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap">{{ $estimate->client->name }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $statusColors[$estimate->status] ?? 'bg-gray-100 text-gray-800' }}">
                                                {{ ucfirst($estimate->status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-gray-600">{{ $estimate->issue_date?->format('Y-m-d') }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-gray-600">{{ $estimate->due_date?->format('Y-m-d') ?? 'Not set' }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-right font-semibold text-gray-900">£{{ number_format($estimate->total, 2) }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap space-x-3">
                                            <a href="{{ route('estimates.show', $estimate) }}" class="text-blue-600 hover:text-blue-800">View</a>
                                            <a href="{{ route('estimates.edit', $estimate) }}" class="text-gray-700 hover:text-gray-900">Edit</a>
                                            <a href="{{ route('estimates.download', $estimate) }}" class="text-green-600 hover:text-green-800">Download</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-4 py-6 text-center text-gray-600">No estimates yet. Create your first one to start sending quotes.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
