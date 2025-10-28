<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $supplier->exists ? 'Edit Supplier' : 'Add New Supplier' }}
            </h2>
            <a href="{{ route('suppliers.index') }}" class="text-sm text-gray-600 hover:text-gray-900"> {{-- UPDATED --}}
                &larr; Back to Suppliers
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form wire:submit.prevent="save">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- Left Column --}}
                        <div class="space-y-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Supplier Name</label>
                                <input type="text" wire:model.lazy="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="account_number" class="block text-sm font-medium text-gray-700">Account Number</label>
                                <input type="text" wire:model.lazy="account_number" id="account_number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('account_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                                <input type="email" wire:model.lazy="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                <input type="text" wire:model.lazy="phone" id="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                                <input type="url" wire:model.lazy="website" id="website" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="https://example.com">
                                @error('website') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        {{-- Right Column --}}
                        <div class="space-y-6">
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                <textarea wire:model.lazy="address" id="address" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                                @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                <input type="text" wire:model.lazy="city" id="city" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('city') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="postcode" class="block text-sm font-medium text-gray-700">Postcode</label>
                                <input type="text" wire:model.lazy="postcode" id="postcode" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @error('postcode') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="credit_limit" class="block text-sm font-medium text-gray-700">Credit Limit (£)</label>
                                <input type="number" step="0.01" wire:model.lazy="credit_limit" id="credit_limit" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="e.g., 5000.00">
                                @error('credit_limit') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 border-t border-gray-200 pt-5">
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Save Supplier</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>