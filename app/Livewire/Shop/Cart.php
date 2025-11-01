<?php

namespace App\Livewire\Shop;

use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Cart extends Component
{
    /** @var array<int, array<string, mixed>> */
    public array $items = [];

    public string $total = '0.00';

    public ?string $checkoutError = null;

    public function mount(): void
    {
        $this->loadCart();
    }

    public function render()
    {
        return view('livewire.shop.cart')->layout('layouts.app', [
            'header' => __('Your Cart'),
        ]);
    }

    public function increment(int $productId): void
    {
        $cart = Session::get('cart.items', []);
        $cart[$productId] = ($cart[$productId] ?? 0) + 1;
        Session::put('cart.items', $cart);

        $this->loadCart();
    }

    public function decrement(int $productId): void
    {
        $cart = Session::get('cart.items', []);

        if (! isset($cart[$productId])) {
            return;
        }

        $cart[$productId]--;

        if ($cart[$productId] <= 0) {
            unset($cart[$productId]);
        }

        Session::put('cart.items', $cart);

        $this->loadCart();
    }

    public function remove(int $productId): void
    {
        $cart = Session::get('cart.items', []);
        unset($cart[$productId]);
        Session::put('cart.items', $cart);

        $this->loadCart();
    }

    public function clear(): void
    {
        Session::forget('cart.items');
        $this->loadCart();
    }

    public function checkout()
    {
        $this->checkoutError = null;

        if (empty($this->items)) {
            $this->checkoutError = __('Your cart is empty.');
            return;
        }

        $secretKey = config('services.stripe.secret');
        $publicKey = config('services.stripe.key');

        if (! $secretKey || ! $publicKey) {
            $this->checkoutError = __('Stripe is not configured. Please contact support.');
            return;
        }

        $payload = [
            'mode' => 'payment',
            'success_url' => route('shop.success'),
            'cancel_url' => route('shop.cart'),
        ];

        foreach (array_values($this->items) as $index => $item) {
            $amount = (int) round(((float) $item['price']) * 100);

            $payload["line_items[$index][price_data][currency]"] = config('app.currency', 'usd');
            $payload["line_items[$index][price_data][product_data][name]"] = $item['name'];
            $payload["line_items[$index][price_data][unit_amount]"] = $amount;
            $payload["line_items[$index][quantity]"] = $item['quantity'];
        }

        try {
            $response = Http::withToken($secretKey)
                ->asForm()
                ->post('https://api.stripe.com/v1/checkout/sessions', $payload);

            if (! $response->successful()) {
                Log::warning('Stripe checkout creation failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                $this->checkoutError = __('Unable to start checkout. Please try again later.');

                return;
            }

            $sessionUrl = $response->json('url');

            if (! $sessionUrl) {
                Log::warning('Stripe checkout response missing URL', [
                    'response' => $response->json(),
                ]);
                $this->checkoutError = __('Unable to start checkout. Please try again later.');

                return;
            }

            return redirect()->away($sessionUrl);
        } catch (\Throwable $exception) {
            Log::error('Stripe checkout failed', [
                'message' => $exception->getMessage(),
            ]);

            $this->checkoutError = __('Unable to start checkout. Please try again later.');
        }
    }

    protected function loadCart(): void
    {
        $cart = Session::get('cart.items', []);
        $productIds = array_keys($cart);

        $products = Product::whereIn('id', $productIds)
            ->get()
            ->keyBy('id');

        $items = [];
        $total = 0.0;

        foreach ($productIds as $productId) {
            $product = $products->get($productId);

            if (! $product) {
                continue;
            }

            $quantity = max(1, (int) ($cart[$productId] ?? 1));
            $price = (float) $product->price;
            $subtotal = $quantity * $price;

            $items[] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => number_format($price, 2, '.', ''),
                'quantity' => $quantity,
                'subtotal' => number_format($subtotal, 2, '.', ''),
                'image_url' => $product->image_url,
            ];

            $total += $subtotal;
        }

        Session::put('cart.items', Arr::pluck($items, 'quantity', 'id'));

        $this->items = $items;
        $this->total = number_format($total, 2, '.', '');
    }
}
