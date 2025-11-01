@php
    use Illuminate\Support\Facades\Storage;
@endphp

<div class="py-12" x-data="{ open: @entangle('showForm') }">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @if (session('status'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded" role="alert">
                <p class="font-semibold">{{ session('status') }}</p>
            </div>
        @endif

        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-gray-900">{{ __('Products') }}</h2>
                    <p class="text-sm text-gray-500">{{ __('Create and manage the products available in your shop.') }}</p>
                </div>

                <x-button
                    type="button"
                    wire:click="openCreateForm"
                    class="bg-indigo-600 hover:bg-indigo-500 focus:bg-indigo-500 active:bg-indigo-700 {{ $categories->isEmpty() ? 'opacity-50 cursor-not-allowed' : '' }}"
                    :disabled="$categories->isEmpty()"
                >
                    {{ __('New Product') }}
                </x-button>
            </div>

            <div class="divide-y divide-gray-200">
                @if ($products->isEmpty())
                    <p class="px-6 py-10 text-center text-gray-600">{{ __('No products found. Create one to get started.') }}</p>
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
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${{ number_format($product->price, 2) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->stock }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->updated_at->diffForHumans() }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                            <x-secondary-button type="button" wire:click="edit({{ $product->id }})">
                                                {{ __('Edit') }}
                                            </x-secondary-button>
                                            <x-danger-button
                                                type="button"
                                                wire:click="delete({{ $product->id }})"
                                                wire:confirm="{{ __('Delete this product?') }}"
                                            >
                                                {{ __('Delete') }}
                                            </x-danger-button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="px-6 py-4 border-t border-gray-200">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>
        </div>

        @if ($categories->isEmpty())
            <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 p-4 rounded">
                {{ __('Create a product category before adding products.') }}
            </div>
        @endif
    </div>

    <div
        x-cloak
        x-show="open"
        class="fixed inset-0 z-40 flex"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        wire:keydown.escape.window="closeForm"
    >
        <div class="absolute inset-0 bg-gray-900/50" aria-hidden="true" @click="open = false; $wire.closeForm()"></div>

        <div
            class="relative ml-auto flex h-full w-full max-w-2xl flex-col bg-white shadow-xl"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
        >
            <div class="px-6 py-4 border-b border-gray-200 flex items-start justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">
                        {{ $editingId ? __('Edit Product') : __('New Product') }}
                    </h3>
                    <p class="text-sm text-gray-500">
                        {{ $editingId ? __('Update the product details and availability.') : __('Add a new product to your catalog.') }}
                    </p>
                </div>

                <button type="button" class="text-gray-400 hover:text-gray-600" @click="open = false; $wire.closeForm()">
                    <span class="sr-only">{{ __('Close') }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form wire:submit.prevent="save" class="flex-1 overflow-y-auto px-6 py-6 space-y-5">
                <div>
                    <label for="product_category_id" class="block text-sm font-medium text-gray-700">{{ __('Category') }}</label>
                    <select
                        wire:model.defer="product_category_id"
                        id="product_category_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    >
                        <option value="">{{ __('Select a category') }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('product_category_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                        <input
                            wire:model.defer="name"
                            id="name"
                            type="text"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        />
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700">{{ __('Price') }}</label>
                        <input
                            wire:model.defer="price"
                            id="price"
                            type="number"
                            step="0.01"
                            min="0"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        />
                        @error('price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="stock" class="block text-sm font-medium text-gray-700">{{ __('Stock') }}</label>
                        <input
                            wire:model.defer="stock"
                            id="stock"
                            type="number"
                            min="0"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        />
                        @error('stock')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">{{ __('Product Image') }}</label>
                    <input wire:model="image" type="file" accept="image/*" class="mt-1 block w-full text-sm text-gray-700" />
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                    <div class="mt-4">
                        @if ($image)
                            <p class="text-sm text-gray-500 mb-2">{{ __('Preview') }}</p>
                            <img src="{{ $image->temporaryUrl() }}" alt="{{ __('Image preview') }}" class="h-40 w-full object-cover rounded-md border">
                        @elseif ($currentImagePath)
                            <p class="text-sm text-gray-500 mb-2">{{ __('Current image') }}</p>
                            <img src="{{ Storage::disk('public')->url($currentImagePath) }}" alt="{{ $name }}" class="h-40 w-full object-cover rounded-md border">
                        @else
                            <p class="text-sm text-gray-500">{{ __('No image selected.') }}</p>
                        @endif
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">{{ __('Description') }}</label>
                    <textarea
                        wire:model.defer="description"
                        id="description"
                        rows="4"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    ></textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end space-x-3">
                    <x-secondary-button type="button" @click="open = false; $wire.closeForm()">
                        {{ __('Cancel') }}
                    </x-secondary-button>
                    <x-button
                        class="bg-indigo-600 hover:bg-indigo-500 focus:bg-indigo-500 active:bg-indigo-700"
                        wire:loading.attr="disabled"
                    >
                        <span wire:loading.remove>{{ $editingId ? __('Update Product') : __('Create Product') }}</span>
                        <span wire:loading>{{ __('Saving...') }}</span>
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>
