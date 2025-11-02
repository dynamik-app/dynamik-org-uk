<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KnowledgeBaseCategory;
use App\Models\KnowledgeBaseTopic;
use App\Support\GeneratesSlugs;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KnowledgeBaseTopicController extends Controller
{
    use GeneratesSlugs;

    public function index(): View
    {
        $topics = KnowledgeBaseTopic::with(['category'])->withCount('articles')
            ->orderBy('name')
            ->paginate(10);

        return view('admin.knowledge-base.topics.index', compact('topics'));
    }

    public function create(): View
    {
        $categories = KnowledgeBaseCategory::orderBy('name')->pluck('name', 'id');

        return view('admin.knowledge-base.topics.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'category_id' => ['required', 'exists:knowledge_base_categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:knowledge_base_topics,slug'],
            'description' => ['nullable', 'string'],
        ]);

        $data['slug'] = $data['slug'] ?: $this->generateUniqueSlug(KnowledgeBaseTopic::class, $data['name']);

        KnowledgeBaseTopic::create($data);

        return redirect()
            ->route('admin.knowledge-base.topics.index')
            ->with('status', __('Topic created successfully.'));
    }

    public function edit(KnowledgeBaseTopic $topic): View
    {
        $categories = KnowledgeBaseCategory::orderBy('name')->pluck('name', 'id');

        return view('admin.knowledge-base.topics.edit', compact('topic', 'categories'));
    }

    public function update(Request $request, KnowledgeBaseTopic $topic): RedirectResponse
    {
        $data = $request->validate([
            'category_id' => ['required', 'exists:knowledge_base_categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:knowledge_base_topics,slug,' . $topic->id],
            'description' => ['nullable', 'string'],
        ]);

        $data['slug'] = $data['slug'] ?: $this->generateUniqueSlug(KnowledgeBaseTopic::class, $data['name'], $topic->id);

        $topic->update($data);

        return redirect()
            ->route('admin.knowledge-base.topics.index')
            ->with('status', __('Topic updated successfully.'));
    }

    public function destroy(KnowledgeBaseTopic $topic): RedirectResponse
    {
        if ($topic->articles()->exists()) {
            return redirect()
                ->route('admin.knowledge-base.topics.index')
                ->with('error', __('You must remove all articles before deleting this topic.'));
        }

        $topic->delete();

        return redirect()
            ->route('admin.knowledge-base.topics.index')
            ->with('status', __('Topic deleted successfully.'));
    }
}
