<?php

namespace App\Livewire;

use App\Models\Solution;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;

class SolutionShow extends Component
{
    public Solution $solution;

    public function mount(string $slug): void
    {
        $this->solution = Solution::where('slug', $slug)
            ->where('is_published', true)
            ->first();

        if (! $this->solution) {
            throw new ModelNotFoundException();
        }
    }

    public function render()
    {
        return view('livewire.solution-show')
            ->layout('layouts.app', [
                'title' => $this->solution->name . ' Solution',
                'metaDescription' => $this->solution->description,
            ]);
    }
}
