<?php

namespace App\Livewire\Shop;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'tailwind';

    #[Url(as: 'category')]
    public ?int $selectedCategory = null;

    #[Url(as: 'search')]
    public string $search = '';

    public function getCartCountProperty(): int
    {
        $cart = Session::get('cart.items', []);

        return array_sum($cart);
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingSelectedCategory(): void
    {
        $this->resetPage();
    }

    public function updatedSelectedCategory($value): void
    {
        $this->selectedCategory = $value ? (int) $value : null;
    }

    public function addToCart(int $productId): void
    {
        $product = Product::findOrFail($productId);

        $cart = Session::get('cart.items', []);
        $cart[$productId] = ($cart[$productId] ?? 0) + 1;

        Session::put('cart.items', $cart);

        $this->dispatch('cart-updated');
        session()->flash('status', __(':name added to cart.', ['name' => $product->name]));
    }

    public function render()
    {
        $products = $this->queryProducts();

        return view('livewire.shop.product-list', [
            'categories' => ProductCategory::orderBy('name')->get(),
            'products' => $products,
        ])->layout('layouts.app', [
            'header' => __('Shop'),
        ]);
    }

    protected function queryProducts(): LengthAwarePaginator
    {
        return Product::query()
            ->with('category')
            ->when($this->selectedCategory, fn ($query) => $query->where('product_category_id', $this->selectedCategory))
            ->when($this->search !== '', function ($query) {
                $query->where(function ($innerQuery) {
                    $innerQuery
                        ->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('name')
            ->paginate(12);
    }
}
