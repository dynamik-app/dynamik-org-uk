<?php

namespace App\Livewire\Articles;

use Livewire\Component;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Create extends Component
{
    public $title;
    public $content;
    public $status = 'draft';

    protected $rules = [
        'title' => 'required|string|min:3',
        'content' => 'required|string|min:10',
    ];

    public function saveArticle()
    {
        $this->validate();

        Article::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'content' => $this->content,
            'status' => $this->status,
        ]);

        session()->flash('success', 'Article created successfully!');
        return redirect()->route('dashboard'); // Redirect to a different page if you prefer
    }

    public function render()
    {
        return view('livewire.articles.create')
            ->layout('layouts.app', [
                'title' => 'Create Article',
            ]);
    }
}
