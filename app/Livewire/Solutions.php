<?php

namespace App\Livewire;

use App\Models\Solution;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Solutions')]
class Solutions extends Component
{
    public function render()
    {
        $solutions = Solution::where('is_published', true)->latest()->get();

        return view('livewire.solutions', [
            'solutions' => $solutions,
        ])->layout('layouts.app', [
            'title' => 'Solutions',
        ]);
    }
}
