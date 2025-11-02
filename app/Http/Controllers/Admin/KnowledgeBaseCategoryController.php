<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KnowledgeBaseCategory;
use App\Support\GeneratesSlugs;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KnowledgeBaseCategoryController extends Controller
{
    use GeneratesSlugs;

    public function index(Request $request): View
    {
        $categories = KnowledgeBaseCategory::withCount(['topics', 'articles'])
            ->orderBy('name')
            ->paginate(10);

        return view('admin.knowledge-base.categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.knowledge-base.categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:knowledge_base_categories,slug'],
            'description' => ['nullable', 'string'],
        ]);

        $data['slug'] = $data['slug'] ?: $this->generateUniqueSlug(KnowledgeBaseCategory::class, $data['name']);

        KnowledgeBaseCategory::create($data);

        return redirect()
            ->route('admin.knowledge-base.categories.index')
            ->with('status', __('Category created successfully.'));
    }

    public function edit(KnowledgeBaseCategory $category): View
    {
        return view('admin.knowledge-base.categories.edit', compact('category'));
    }

    public function update(Request $request, KnowledgeBaseCategory $category): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:knowledge_base_categories,slug,' . $category->id],
            'description' => ['nullable', 'string'],
        ]);

        $data['slug'] = $data['slug'] ?: $this->generateUniqueSlug(KnowledgeBaseCategory::class, $data['name'], $category->id);

        $category->update($data);

        return redirect()
            ->route('admin.knowledge-base.categories.index')
            ->with('status', __('Category updated successfully.'));
    }

    public function destroy(KnowledgeBaseCategory $category): RedirectResponse
    {
        if ($category->topics()->exists() || $category->articles()->exists()) {
            return redirect()
                ->route('admin.knowledge-base.categories.index')
                ->with('error', __('You must remove all topics and articles before deleting this category.'));
        }

        $category->delete();

        return redirect()
            ->route('admin.knowledge-base.categories.index')
            ->with('status', __('Category deleted successfully.'));
    }
}
