<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">{{ $company->registered_name }}</p>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Invoices</h2>
            </div>
            <a href="{{ route('invoices.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700">
                <span class="text-lg">+</span>
                <span>New invoice</span>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('status'))
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Your invoices</h3>
                            <p class="text-sm text-gray-600">View, download, and update invoices for clients of {{ $company->registered_name }}.</p>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    <th class="px-4 py-3">Number</th>
                                    <th class="px-4 py-3">Client</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3">Issue date</th>
                                    <th class="px-4 py-3">Due</th>
                                    <th class="px-4 py-3 text-right">Total</th>
                                    <th class="px-4 py-3 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 text-sm">
                                @forelse ($invoices as $invoice)
                                    <tr>
                                        <td class="px-4 py-3 whitespace-nowrap font-semibold text-gray-900">{{ $invoice->number }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap">{{ $invoice->client->name }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            @php
                                                $statusColors = [
                                                    'draft' => 'bg-gray-100 text-gray-800',
                                                    'sent' => 'bg-blue-100 text-blue-800',
                                                    'paid' => 'bg-green-100 text-green-800',
                                                    'cancelled' => 'bg-red-100 text-red-800',
                                                ];
                                            @endphp
                                            <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $statusColors[$invoice->status] ?? 'bg-gray-100 text-gray-800' }}">
                                                {{ ucfirst($invoice->status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-gray-600">{{ $invoice->issue_date?->format('Y-m-d') }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-gray-600">{{ $invoice->due_date?->format('Y-m-d') ?? 'Not set' }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-right font-semibold text-gray-900">£{{ number_format($invoice->total, 2) }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-right space-x-2">
                                            <a href="{{ route('invoices.show', $invoice) }}" class="text-blue-600 hover:text-blue-800">View</a>
                                            <a href="{{ route('invoices.edit', $invoice) }}" class="text-gray-700 hover:text-gray-900">Edit</a>
                                            <a href="{{ route('invoices.download', $invoice) }}" class="text-green-600 hover:text-green-800">Download</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-4 py-6 text-center text-gray-600">No invoices yet. Create your first one to start billing clients.</td>
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
