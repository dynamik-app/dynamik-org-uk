<?php

namespace App\Livewire;

use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LearnDashboard extends Component
{
    public $sections;

    public function mount()
    {
        $user = Auth::user();

        // Eager load the counts of questions and the user's answered questions for efficiency
        $this->sections = Section::withCount(['questions', 'questions as answered_questions_count' => function ($query) use ($user) {
            $query->whereHas('answeredByUsers', function ($subQuery) use ($user) {
                $subQuery->where('user_id', $user->id);
            });
        }])->get();
    }

    public function render()
    {
        return view('livewire.learn-dashboard')
            ->layout('layouts.app');
    }
}