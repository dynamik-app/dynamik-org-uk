<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @if ($checkoutError)
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded" role="alert">
                <p class="font-semibold">{{ $checkoutError }}</p>
            </div>
        @endif

        @if (empty($items))
            <div class="bg-white shadow sm:rounded-lg p-10 text-center space-y-4">
                <h2 class="text-lg font-semibold text-gray-900">{{ __('Your cart is empty') }}</h2>
                <p class="text-gray-600">{{ __('Browse our products to add items to your cart.') }}</p>
                <div>
                    <a href="{{ route('shop.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                        {{ __('Continue Shopping') }}
                    </a>
                </div>
            </div>
        @else
            <div class="bg-white shadow sm:rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-900">{{ __('Cart Summary') }}</h2>
                    <x-danger-button type="button" wire:click="clear">{{ __('Clear Cart') }}</x-danger-button>
                </div>

                <div class="divide-y divide-gray-200">
                    @foreach ($items as $item)
                        <div class="px-6 py-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <div class="flex items-center space-x-4">
                                @if ($item['image_url'])
                                    <img src="{{ $item['image_url'] }}" alt="{{ $item['name'] }}" class="w-20 h-20 object-cover rounded">
                                @else
                                    <div class="w-20 h-20 bg-gray-100 rounded flex items-center justify-center text-gray-400">
                                        <span class="text-xs">{{ __('No image') }}</span>
                                    </div>
                                @endif

                                <div>
                                    <h3 class="text-base font-semibold text-gray-900">{{ $item['name'] }}</h3>
                                    <p class="text-sm text-gray-500">${{ $item['price'] }} {{ __('each') }}</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-4">
                                <div class="flex items-center border rounded-md overflow-hidden">
                                    <button type="button" wire:click="decrement({{ $item['id'] }})" class="px-3 py-1 text-gray-600 hover:bg-gray-100">-</button>
                                    <span class="px-4 py-1 text-sm font-medium text-gray-700">{{ $item['quantity'] }}</span>
                                    <button type="button" wire:click="increment({{ $item['id'] }})" class="px-3 py-1 text-gray-600 hover:bg-gray-100">+</button>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-semibold text-gray-900">${{ $item['subtotal'] }}</p>
                                    <button type="button" wire:click="remove({{ $item['id'] }})" class="mt-1 text-sm text-red-600 hover:underline">{{ __('Remove') }}</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="px-6 py-4 border-t border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <p class="text-sm text-gray-500">{{ __('Total') }}</p>
                        <p class="text-2xl font-semibold text-gray-900">${{ $total }}</p>
                    </div>

                    <div class="flex items-center space-x-4">
                        <a href="{{ route('shop.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                            {{ __('Continue Shopping') }}
                        </a>
                        <x-button type="button" wire:click="checkout" wire:loading.attr="disabled"
                            class="bg-indigo-600 hover:bg-indigo-500 focus:bg-indigo-500 active:bg-indigo-700">
                            <span wire:loading.remove wire:target="checkout">{{ __('Checkout with Stripe') }}</span>
                            <span wire:loading wire:target="checkout">{{ __('Processing...') }}</span>
                        </x-button>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
