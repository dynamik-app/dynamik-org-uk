<?php

namespace App\Livewire\Admin\Quizzes;

use App\Models\Question;
use App\Models\Section;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Manage extends Component
{
    public Question $question;
    public $sections;

    public $selectedSectionId;
    public $questionText;
    public $explanation;
    public $options = [];
    public $correctOptionIndex;

    protected function rules()
    {
        return [
            'selectedSectionId' => 'required|exists:sections,id',
            'questionText' => 'required|string|min:5',
            'explanation' => 'nullable|string',
            'options' => 'required|array|min:2',
            'options.*.text' => 'required|string|min:1',
            'correctOptionIndex' => 'required|numeric',
        ];
    }

    public function mount(Question $question)
    {
        $this->question = $question;
        $this->sections = Section::all();

        if ($this->question->exists) {
            $this->selectedSectionId = $this->question->section_id;
            $this->questionText = $this->question->text;
            $this->explanation = $this->question->explanation;

            foreach ($this->question->options as $index => $option) {
                $this->options[] = ['text' => $option->text];
                if ($option->is_correct) {
                    $this->correctOptionIndex = $index;
                }
            }
        } else {
            // Start with 4 empty options for a new question
            $this->options = [['text' => ''], ['text' => ''], ['text' => ''], ['text' => '']];
        }
    }

    public function addOption()
    {
        $this->options[] = ['text' => ''];
    }

    public function removeOption($index)
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options); // Re-index the array
    }

    public function save()
    {
        $this->validate();

        DB::transaction(function () {
            $this->question->section_id = $this->selectedSectionId;
            $this->question->text = $this->questionText;
            $this->question->explanation = $this->explanation;
            $this->question->save();

            // Delete old options before creating new ones
            $this->question->options()->delete();

            foreach ($this->options as $index => $optionData) {
                $this->question->options()->create([
                    'text' => $optionData['text'],
                    'is_correct' => ($index == $this->correctOptionIndex),
                ]);
            }
        });

        session()->flash('success', 'Question saved successfully!');
        return redirect()->route('admin.quizzes.index');
    }

    public function render()
    {
        $title = $this->question->exists ? 'Edit Quiz Question' : 'Create Quiz Question';

        return view('livewire.admin.quizzes.manage')
            ->layout('layouts.app', [
                'title' => $title,
            ]);
    }
}
