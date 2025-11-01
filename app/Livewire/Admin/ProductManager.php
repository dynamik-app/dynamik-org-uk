<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class ProductManager extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'tailwind';

    #[Validate('required|exists:product_categories,id')]
    public ?int $product_category_id = null;

    #[Validate('required|string|max:255')]
    public string $name = '';

    #[Validate('nullable|string|max:5000')]
    public ?string $description = null;

    #[Validate('required|numeric|min:0')]
    public string $price = '';

    #[Validate('nullable|integer|min:0')]
    public ?int $stock = 0;

    #[Validate('nullable|url|max:2048')]
    public ?string $image_url = null;

    public ?int $editingId = null;

    public function mount(): void
    {
        abort_unless(Auth::check() && Auth::user()->hasRole('admin'), 403);

        $this->product_category_id = ProductCategory::query()->value('id');
    }

    public function render()
    {
        return view('livewire.admin.product-manager', [
            'categories' => ProductCategory::orderBy('name')->get(),
            'products' => Product::with('category')->latest()->paginate(10),
        ])->layout('layouts.app', [
            'header' => __('Products'),
        ]);
    }

    public function edit(int $productId): void
    {
        $product = Product::findOrFail($productId);

        $this->editingId = $product->id;
        $this->product_category_id = $product->product_category_id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = (string) $product->price;
        $this->stock = $product->stock;
        $this->image_url = $product->image_url;
    }

    public function cancelEdit(): void
    {
        $this->resetForm();
    }

    public function save(): void
    {
        $this->validate();

        $product = Product::updateOrCreate(
            ['id' => $this->editingId],
            [
                'product_category_id' => $this->product_category_id,
                'name' => $this->name,
                'slug' => $this->generateUniqueSlug($this->name, $this->editingId),
                'description' => $this->description,
                'price' => number_format((float) $this->price, 2, '.', ''),
                'stock' => $this->stock ?? 0,
                'image_url' => $this->image_url,
            ]
        );

        session()->flash('status', $this->editingId ? __('Product updated.') : __('Product created.'));

        $this->resetForm();
        $this->dispatch('product-saved', id: $product->id);
    }

    public function delete(int $productId): void
    {
        Product::findOrFail($productId)->delete();

        session()->flash('status', __('Product deleted.'));

        if ($this->editingId === $productId) {
            $this->resetForm();
        }
    }

    protected function resetForm(): void
    {
        $this->reset(['editingId', 'name', 'description', 'price', 'stock', 'image_url']);
        $this->product_category_id = ProductCategory::query()->value('id');
    }

    protected function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($name);
        $slug = $baseSlug;
        $counter = 1;

        while (
            Product::where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->whereKeyNot($ignoreId))
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter++;
        }

        return $slug;
    }
}
