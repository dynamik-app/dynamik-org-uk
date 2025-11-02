<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\KnowledgeBaseCategory;
use App\Support\GeneratesSlugs;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class KnowledgeBaseArticleController extends Controller
{
    use GeneratesSlugs;

    public function index(Request $request): View
    {
        $articles = Article::with(['category', 'topic', 'author'])
            ->latest('created_at')
            ->paginate(10);

        return view('admin.knowledge-base.articles.index', compact('articles'));
    }

    public function create(): View
    {
        $categories = KnowledgeBaseCategory::orderBy('name')->with('topics')->get();

        return view('admin.knowledge-base.articles.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateArticle($request);
        $data['slug'] = $data['slug'] ?: $this->generateUniqueSlug(Article::class, $data['title']);
        $data['user_id'] = Auth::id();
        $data['published_at'] = $data['status'] === 'published' ? now() : null;

        Article::create($data);

        return redirect()
            ->route('admin.knowledge-base.articles.index')
            ->with('status', __('Article created successfully.'));
    }

    public function edit(Article $article): View
    {
        $categories = KnowledgeBaseCategory::orderBy('name')->with('topics')->get();

        return view('admin.knowledge-base.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article): RedirectResponse
    {
        $data = $this->validateArticle($request, $article->id);
        $data['slug'] = $data['slug'] ?: $this->generateUniqueSlug(Article::class, $data['title'], $article->id);
        $data['published_at'] = $data['status'] === 'published'
            ? ($article->published_at ?? now())
            : null;

        $article->update($data);

        return redirect()
            ->route('admin.knowledge-base.articles.index')
            ->with('status', __('Article updated successfully.'));
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()
            ->route('admin.knowledge-base.articles.index')
            ->with('status', __('Article deleted successfully.'));
    }

    protected function validateArticle(Request $request, ?int $articleId = null): array
    {
        return $request->validate([
            'category_id' => ['required', 'exists:knowledge_base_categories,id'],
            'topic_id' => ['required', 'exists:knowledge_base_topics,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('articles', 'slug')->ignore($articleId)],
            'summary' => ['nullable', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'status' => ['required', 'in:draft,published'],
        ]);
    }
}
