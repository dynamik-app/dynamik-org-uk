<?php

namespace App\Livewire;

use App\Models\Option;
use App\Models\Question;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Learn extends Component
{
    public Section $section;
    public $questionIds = [];
    public $currentQuestionIndex = 0;

    public $selectedOptionId = null;
    public $isAnswered = false;
    public $isCorrect = false;

    public function mount(Section $section)
    {
        $this->section = $section;
        $this->questionIds = $this->section->questions()->pluck('id')->toArray();
    }

    public function getCurrentQuestionProperty()
    {
        if (isset($this->questionIds[$this->currentQuestionIndex])) {
            return Question::with('options')->find($this->questionIds[$this->currentQuestionIndex]);
        }
        return null;
    }

    public function selectAnswer(Option $option)
    {
        if ($this->isAnswered) return;

        $this->selectedOptionId = $option->id;
        $this->isCorrect = $option->is_correct;
        $this->isAnswered = true;

        // Track progress by attaching this question to the user
        Auth::user()->answeredQuestions()->syncWithoutDetaching($option->question_id);
    }

    public function nextQuestion()
    {
        if ($this->currentQuestionIndex < count($this->questionIds) - 1) {
            $this->currentQuestionIndex++;
            $this->resetState();
        } else {
            // All questions in the section are done
            session()->flash('success', 'You have completed the ' . $this->section->title . ' section!');
            return redirect()->route('learn.dashboard');
        }
    }

    private function resetState()
    {
        $this->selectedOptionId = null;
        $this->isAnswered = false;
        $this->isCorrect = false;
    }

    public function render()
    {
        return view('livewire.learn', [
            'question' => $this->currentQuestion
        ])->layout('layouts.app');
    }
}