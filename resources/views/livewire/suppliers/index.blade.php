<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Suppliers') }}
            </h2>
            <a href="{{ route('suppliers.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md text-sm"> {{-- UPDATED --}}
                Add New Supplier
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if (session()->has('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <div class="space-y-4">
                    @forelse($suppliers as $supplier)
                        <div class="flex justify-between items-center p-3 rounded-md hover:bg-gray-50 border">
                            <div>
                                <p class="font-bold text-lg text-gray-800">{{ $supplier->name }}</p>
                                <p class="text-sm text-gray-600">Account No: {{ $supplier->account_number }}</p>
                                @if($supplier->credit_limit)
                                    <p class="text-sm text-gray-600">Credit Limit: £{{ number_format($supplier->credit_limit, 2) }}</p>
                                @endif
                            </div>
                            <div class="space-x-4 flex-shrink-0">
                                <a href="{{ route('suppliers.edit', $supplier) }}" class="text-blue-600 hover:text-blue-900 text-sm">Edit</a> {{-- UPDATED --}}
                                <button
                                        wire:click="deleteSupplier({{ $supplier->id }})"
                                        wire:confirm="Are you sure you want to delete this supplier?"
                                        class="text-red-600 hover:text-red-900 text-sm">
                                    Delete
                                </button>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">You haven't added any suppliers yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>