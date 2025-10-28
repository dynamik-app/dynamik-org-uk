<?php

namespace App\Livewire\Articles;

use Livewire\Component;
use App\Models\Article;
use Livewire\Attributes\Title;

class Index extends Component
{
    #[Title('Knowledge Base')]

    public function render()
    {
        $articles = Article::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.articles.index', [
            'articles' => $articles,
        ])->layout('layouts.app', [
            'title' => 'Knowledge Base',
        ]);
    }
}
