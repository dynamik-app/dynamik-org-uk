<?php

namespace App\Livewire;

use Livewire\Component;

class Solutions extends Component
{
    public function render()
    {
        return view('livewire.solutions')
            ->layout('layouts.app', [
                'title' => 'Solutions',
            ]);
    }
}
