<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\KnowledgeBaseCategory;
use App\Models\KnowledgeBaseTopic;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KnowledgeBaseController extends Controller
{
    public function index(Request $request): View
    {
        $query = trim($request->input('q', ''));
        $hasQuery = $query !== '';
        $categories = KnowledgeBaseCategory::with(['topics' => function ($query) {
            $query->orderBy('name')->withCount(['articles' => fn ($articles) => $articles->published()]);
        }])->withCount(['articles' => fn ($query) => $query->published()])->orderBy('name')->get();

        $articles = collect();
        if ($hasQuery) {
            $articles = Article::published()
                ->with(['category', 'topic'])
                ->where(function ($builder) use ($query) {
                    $builder->where('title', 'like', '%' . $query . '%')
                        ->orWhere('summary', 'like', '%' . $query . '%')
                        ->orWhere('content', 'like', '%' . $query . '%');
                })
                ->orderByDesc('published_at')
                ->limit(20)
                ->get();
        }

        return view('knowledge-base.index', [
            'categories' => $categories,
            'query' => $query,
            'hasQuery' => $hasQuery,
            'articles' => $articles,
        ]);
    }

    public function category(KnowledgeBaseCategory $category): View
    {
        $category->load(['topics' => function ($query) {
            $query->withCount(['articles' => fn ($q) => $q->published()])->orderBy('name');
        }]);

        return view('knowledge-base.category', compact('category'));
    }

    public function topic(KnowledgeBaseTopic $topic): View
    {
        $topic->load(['category', 'articles' => fn ($query) => $query->published()->orderByDesc('published_at')->with(['category', 'topic', 'author'])]);

        return view('knowledge-base.topic', compact('topic'));
    }

    public function show(Article $article): View
    {
        abort_unless($article->status === 'published', 404);

        $article->load(['category', 'topic', 'author']);

        $related = Article::published()
            ->where('topic_id', $article->topic_id)
            ->whereKeyNot($article->getKey())
            ->orderByDesc('published_at')
            ->limit(4)
            ->get();

        return view('knowledge-base.show', [
            'article' => $article,
            'related' => $related,
        ]);
    }
}
