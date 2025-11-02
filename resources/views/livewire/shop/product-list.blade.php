@php
    use Illuminate\Support\Str;
@endphp

<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        @if (session('status'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded" role="alert">
                <p class="font-semibold">{{ session('status') }}</p>
            </div>
        @endif

        <div class="bg-white shadow sm:rounded-lg p-6 space-y-6">
            <div class="space-y-6">
                <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">{{ __('Shop') }}</h1>
                        <p class="mt-1 text-sm text-gray-600">{{ __('Discover our latest products and add them straight to your cart.') }}</p>
                    </div>

                    <a href="{{ route('shop.cart') }}" class="inline-flex items-center self-start lg:self-auto px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        {{ __('Cart') }}
                        <span class="ml-2 inline-flex items-center justify-center w-6 h-6 text-xs font-semibold bg-white text-indigo-600 rounded-full">{{ $this->cartCount }}</span>
                    </a>
                </div>

                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3 lg:items-end">
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700">{{ __('Filter by Category') }}</label>
                        <select wire:model.live="selectedCategory" id="category" class="mt-1 block w-full sm:w-64 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">{{ __('All categories') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="lg:col-span-2">
                        <label for="search" class="block text-sm font-medium text-gray-700">{{ __('Search') }}</label>
                        <input wire:model.debounce.400ms="search" id="search" type="search" placeholder="{{ __('Search products...') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                    </div>
                </div>
            </div>

            @if ($products->isEmpty())
                <div class="text-center py-16 border border-dashed border-gray-200 rounded-lg">
                    <h2 class="text-lg font-semibold text-gray-900">{{ __('No products available right now') }}</h2>
                    <p class="mt-2 text-gray-600">{{ __('Please check back soon for new products.') }}</p>
                </div>
            @else
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($products as $product)
                        <div class="border border-gray-200 rounded-lg overflow-hidden flex flex-col">
                            @if ($product->image_url)
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="h-48 w-full object-cover">
                            @else
                                <div class="h-48 w-full bg-gray-100 flex items-center justify-center text-gray-400">
                                    <span class="text-sm">{{ __('No image') }}</span>
                                </div>
                            @endif

                            <div class="p-5 flex flex-col flex-1 space-y-3">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">{{ $product->name }}</h3>
                                    <p class="mt-1 text-sm text-gray-600">{{ Str::limit($product->description, 120) }}</p>
                                </div>

                                <div class="mt-auto flex items-center justify-between">
                                    <span class="text-xl font-semibold text-gray-900">${{ number_format($product->price, 2) }}</span>
                                    <span class="text-sm text-gray-500">{{ $product->category?->name }}</span>
                                </div>

                                <div>
                                    <x-button type="button" wire:click="addToCart({{ $product->id }})" wire:loading.attr="disabled"
                                        class="w-full justify-center bg-indigo-600 hover:bg-indigo-500 focus:bg-indigo-500 active:bg-indigo-700">
                                        <span wire:loading.remove wire:target="addToCart({{ $product->id }})">{{ __('Add to Cart') }}</span>
                                        <span wire:loading wire:target="addToCart({{ $product->id }})">{{ __('Adding...') }}</span>
                                    </x-button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="pt-6">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
