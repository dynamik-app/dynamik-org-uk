<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Solution;

class Homepage extends Component
{
    public $solutions;

    public function mount()
    {
        $this->solutions = Solution::where('is_published', true)->latest()->take(6)->get();
    }

    public function render()
    {
        return view('livewire.homepage')
            ->layout('layouts.app');
    }
}
