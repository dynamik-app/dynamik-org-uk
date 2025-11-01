<?php

namespace App\Livewire\Admin;

use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProductCategoriesManager extends Component
{
    #[Validate('required|string|max:255')]
    public string $name = '';

    #[Validate('nullable|string|max:2000')]
    public ?string $description = null;

    public ?int $editingId = null;

    public function mount(): void
    {
        abort_unless(Auth::check() && Auth::user()->hasRole('admin'), 403);
    }

    public function render()
    {
        return view('livewire.admin.product-categories-manager', [
            'categories' => ProductCategory::orderBy('name')->get(),
        ])->layout('layouts.app', [
            'header' => __('Product Categories'),
        ]);
    }

    public function edit(int $categoryId): void
    {
        $category = ProductCategory::findOrFail($categoryId);

        $this->editingId = $category->id;
        $this->name = $category->name;
        $this->description = $category->description;
    }

    public function cancelEdit(): void
    {
        $this->resetForm();
    }

    public function save(): void
    {
        $this->validate();

        $attributes = [
            'name' => $this->name,
            'description' => $this->description,
            'slug' => $this->generateUniqueSlug($this->name, $this->editingId),
        ];

        ProductCategory::updateOrCreate([
            'id' => $this->editingId,
        ], $attributes);

        session()->flash('status', $this->editingId ? __('Category updated.') : __('Category created.'));

        $this->resetForm();
    }

    public function delete(int $categoryId): void
    {
        $category = ProductCategory::findOrFail($categoryId);
        $category->delete();

        session()->flash('status', __('Category deleted.'));

        if ($this->editingId === $categoryId) {
            $this->resetForm();
        }
    }

    protected function resetForm(): void
    {
        $this->reset(['name', 'description', 'editingId']);
    }

    protected function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($name);
        $slug = $baseSlug;
        $counter = 1;

        while (
            ProductCategory::where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->whereKeyNot($ignoreId))
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter++;
        }

        return $slug;
    }
}
