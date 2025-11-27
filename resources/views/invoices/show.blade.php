<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">{{ $invoice->company->registered_name }}</p>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Invoice {{ $invoice->number }}</h2>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('invoices.download', $invoice) }}" class="px-4 py-2 bg-green-600 text-white rounded-md shadow hover:bg-green-700">Download PDF</a>
                <a href="{{ route('invoices.edit', $invoice) }}" class="px-4 py-2 bg-gray-800 text-white rounded-md shadow hover:bg-gray-900">Edit</a>
                <a href="{{ route('invoices.index') }}" class="text-sm text-gray-600 hover:text-gray-900">&larr; Back</a>
            </div>
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
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Billing to</h3>
                            <p class="text-gray-900">{{ $invoice->client->name }}</p>
                            @if ($invoice->client->contact_name)
                                <p class="text-gray-700">{{ $invoice->client->contact_name }}</p>
                            @endif
                            @if ($invoice->client->email)
                                <p class="text-gray-600">{{ $invoice->client->email }}</p>
                            @endif
                            @if ($invoice->client->phone)
                                <p class="text-gray-600">{{ $invoice->client->phone }}</p>
                            @endif
                        </div>
                        <div class="md:text-right space-y-1">
                            <p class="text-sm text-gray-600">Status</p>
                            <p class="text-lg font-semibold text-gray-900">{{ ucfirst($invoice->status) }}</p>
                            <p class="text-sm text-gray-600">Issued {{ $invoice->issue_date?->format('Y-m-d') }}</p>
                            <p class="text-sm text-gray-600">Due {{ $invoice->due_date?->format('Y-m-d') ?? 'Not set' }}</p>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <div class="bg-gray-50 px-4 py-2 text-sm font-semibold text-gray-700">Line items</div>
                        <div class="divide-y divide-gray-200">
                            @foreach ($invoice->items as $item)
                                <div class="grid grid-cols-1 md:grid-cols-6 gap-4 px-4 py-3 text-sm">
                                    <div class="md:col-span-2">
                                        <p class="font-semibold text-gray-900">{{ $item->name }}</p>
                                        <p class="text-xs uppercase tracking-wide text-gray-500">{{ ucfirst($item->item_type) }}</p>
                                        @if ($item->description)
                                            <p class="text-gray-600 mt-1">{{ $item->description }}</p>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="text-gray-600">Qty</p>
                                        <p class="font-semibold text-gray-900">{{ $item->quantity }}</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-600">Unit price</p>
                                        <p class="font-semibold text-gray-900">£{{ number_format($item->unit_price, 2) }}</p>
                                    </div>
                                    <div class="md:col-span-2 md:text-right">
                                        <p class="text-gray-600">Line total</p>
                                        <p class="font-semibold text-gray-900">£{{ number_format($item->line_total, 2) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex flex-col items-end space-y-2">
                        <div class="text-lg font-semibold text-gray-900">Subtotal: £{{ number_format($invoice->subtotal, 2) }}</div>
                        <div class="text-2xl font-bold text-gray-900">Total: £{{ number_format($invoice->total, 2) }}</div>
                    </div>

                    @if ($invoice->notes)
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                            <h4 class="text-sm font-semibold text-gray-900 mb-2">Notes</h4>
                            <p class="text-gray-700 whitespace-pre-line">{{ $invoice->notes }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
