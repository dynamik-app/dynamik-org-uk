<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class ProductManager extends Component
{
    use WithPagination;
    use WithFileUploads;

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

    #[Validate('nullable|image|max:4096')]
    public $image = null;

    public ?string $currentImagePath = null;

    public ?int $editingId = null;

    public bool $showForm = false;

    public function mount(): void
    {
        abort_unless(Auth::check() && Auth::user()->hasRole('admin'), 403);

        $this->product_category_id = ProductCategory::query()->value('id');
    }

    public function closeForm(): void
    {
        $this->resetForm();
        $this->showForm = false;
    }

    public function openCreateForm(): void
    {
        if (ProductCategory::count() === 0) {
            session()->flash('status', __('Create a category before adding products.'));

            return;
        }

        $this->resetForm();
        $this->showForm = true;
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
        $this->currentImagePath = $product->image_path;
        $this->image = null;
        $this->showForm = true;
    }

    public function save(): void
    {
        $this->validate();

        $imagePath = $this->currentImagePath;

        if ($this->image) {
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            $imagePath = $this->image->store('products', 'public');
        }

        $product = Product::updateOrCreate(
            ['id' => $this->editingId],
            [
                'product_category_id' => $this->product_category_id,
                'name' => $this->name,
                'slug' => $this->generateUniqueSlug($this->name, $this->editingId),
                'description' => $this->description,
                'price' => number_format((float) $this->price, 2, '.', ''),
                'stock' => $this->stock ?? 0,
                'image_path' => $imagePath,
            ]
        );

        session()->flash('status', $this->editingId ? __('Product updated.') : __('Product created.'));

        $this->dispatch('product-saved', id: $product->id);
        $this->closeForm();
    }

    public function delete(int $productId): void
    {
        $product = Product::findOrFail($productId);

        if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
            Storage::disk('public')->delete($product->image_path);
        }

        $product->delete();

        session()->flash('status', __('Product deleted.'));

        if ($this->editingId === $productId) {
            $this->closeForm();
        }
    }

    protected function resetForm(): void
    {
        $this->reset(['editingId', 'name', 'description', 'price', 'stock', 'image', 'currentImagePath']);
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
