<div class="max-w-6xl mx-auto py-10 space-y-8">
    @if (session('status'))
        <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded" role="alert">
            <p class="font-semibold">{{ session('status') }}</p>
        </div>
    @endif

    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">
            {{ $editingId ? __('Edit Product') : __('Create Product') }}
        </h2>

        @if ($categories->isEmpty())
            <p class="text-sm text-yellow-700 bg-yellow-50 border border-yellow-300 rounded p-4">
                {{ __('Create a product category before adding products.') }}
            </p>
        @else
            <form wire:submit="save" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="product_category_id" class="block text-sm font-medium text-gray-700">{{ __('Category') }}</label>
                        <select wire:model.defer="product_category_id" id="product_category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">{{ __('Select a category') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('product_category_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                        <input wire:model.defer="name" id="name" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700">{{ __('Price') }}</label>
                        <input wire:model.defer="price" id="price" type="number" step="0.01" min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                        @error('price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="stock" class="block text-sm font-medium text-gray-700">{{ __('Stock') }}</label>
                        <input wire:model.defer="stock" id="stock" type="number" min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                        @error('stock')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="image_url" class="block text-sm font-medium text-gray-700">{{ __('Image URL') }}</label>
                    <input wire:model.defer="image_url" id="image_url" type="url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="https://example.com/image.jpg" />
                    @error('image_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">{{ __('Description') }}</label>
                    <textarea wire:model.defer="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center space-x-3">
                    <x-button class="bg-indigo-600 hover:bg-indigo-500 focus:bg-indigo-500 active:bg-indigo-700">
                        {{ $editingId ? __('Update') : __('Create') }}
                    </x-button>
                    @if ($editingId)
                        <x-secondary-button type="button" wire:click="cancelEdit">{{ __('Cancel') }}</x-secondary-button>
                    @endif
                </div>
            </form>
        @endif
    </div>

    <div class="bg-white shadow rounded-lg">
        <div class="p-6">
            <h2 class="text-lg font-semibold text-gray-900">{{ __('Products') }}</h2>
        </div>

        <div class="border-t border-gray-200">
            @if ($products->isEmpty())
                <p class="p-6 text-gray-600">{{ __('No products found.') }}</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Name') }}</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Category') }}</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Price') }}</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Stock') }}</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Updated') }}</th>
                                <th class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($products as $product)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->category?->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->price }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->stock }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->updated_at->diffForHumans() }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                        <x-secondary-button type="button" wire:click="edit({{ $product->id }})">{{ __('Edit') }}</x-secondary-button>
                                        <x-danger-button type="button" wire:click="delete({{ $product->id }})" wire:confirm="{{ __('Delete this product?') }}">{{ __('Delete') }}</x-danger-button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="p-6 border-t border-gray-200">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
