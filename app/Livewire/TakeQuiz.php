<?php

namespace App\Livewire;

use App\Models\Question;
use App\Models\QuizResult;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TakeQuiz extends Component
{
    public $questionIds = [];
    public $userAnswers = [];
    public $currentQuestionIndex = 0;
    public $quizStarted = false;
    public $quizFinished = false;
    public $timeRemaining = 1800; // 30 minutes in seconds
    public $finalScore = 0;
    public $finalResultId = null;

    // The exact rules for question distribution
    const QUESTION_DISTRIBUTION = [
        'General Health and Safety at Work' => 6,
        'Manual Handling Operations' => 4,
        'Reporting Accidents' => 3,
        'Personal Protective Equipment at Work' => 4,
        'Health and Hygiene' => 3,
        'Fire and Emergency' => 9,
        'Work at Height' => 5,
        'Work Equipment' => 4,
        'Special Site Hazards' => 3,
        'Electrotechnical' => 6,
        'Environmental' => 3,
    ];

    public function startQuiz()
    {
        $this->quizStarted = true;
        $this->generateQuestionList();
    }

    public function generateQuestionList()
    {
        $allIds = collect();
        $sections = Section::whereIn('title', array_keys(self::QUESTION_DISTRIBUTION))->get();

        foreach ($sections as $section) {
            $count = self::QUESTION_DISTRIBUTION[$section->title];
            $ids = $section->questions()->inRandomOrder()->limit($count)->pluck('id');
            $allIds = $allIds->merge($ids);
        }

        $this->questionIds = $allIds->shuffle()->toArray();
        $this->userAnswers = array_fill_keys($this->questionIds, null);
    }

    public function getCurrentQuestionProperty()
    {
        // Eager load options to avoid extra database queries
        return Question::with('options')->find($this->questionIds[$this->currentQuestionIndex]);
    }

    public function nextQuestion()
    {
        if ($this->currentQuestionIndex < 49) {
            $this->currentQuestionIndex++;
        }
    }

    public function previousQuestion()
    {
        if ($this->currentQuestionIndex > 0) {
            $this->currentQuestionIndex--;
        }
    }

    public function setAnswer($questionId, $optionId)
    {
        $this->userAnswers[$questionId] = $optionId;
    }

    public function decrementTime()
    {
        if ($this->timeRemaining > 0) {
            $this->timeRemaining--;
        } else {
            $this->finishQuiz();
        }
    }

    public function finishQuiz()
    {
        if ($this->quizFinished) {
            return;
        }

        // Calculate the score
        $correctAnswers = 0;
        $questions = Question::with('options')->findMany($this->questionIds);

        foreach ($questions as $question) {
            $correctOptionId = $question->options->where('is_correct', true)->first()->id;
            $userAnswerId = $this->userAnswers[$question->id] ?? null;

            if ($userAnswerId == $correctOptionId) {
                $correctAnswers++;
            }
        }

        $this->finalScore = $correctAnswers;
        $this->quizFinished = true;
        $this->quizStarted = false;

        // Save the result
        $result = QuizResult::create([
            'user_id' => Auth::id(),
            'score' => $this->finalScore,
            'total_questions' => 50,
            'passed' => $this->finalScore >= 43,
            'questions_and_answers' => $this->userAnswers,
        ]);
        $this->finalResultId = $result->id;
    }

    public function render()
    {
        return view('livewire.take-quiz')
            ->layout('layouts.app', [
                'title' => 'Assessment',
            ]);
    }
}
