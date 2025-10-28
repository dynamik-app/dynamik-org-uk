<?php

namespace App\Livewire\Admin\Quizzes;

use App\Models\Question;
use App\Models\Section;
use Livewire\Component;

class Index extends Component
{
    public $sections;

    public function mount()
    {
        // Fetch all sections and eager load their questions to prevent N+1 issues
        $this->sections = Section::with('questions')->get();
    }

    public function deleteQuestion(Question $question)
    {
        $question->delete();
        // Refresh the data after deletion
        $this->sections = Section::with('questions')->get();
        session()->flash('success', 'Question deleted successfully!');
    }

    public function render()
    {
        return view('livewire.admin.quizzes.index')
            ->layout('layouts.app');
    }
}