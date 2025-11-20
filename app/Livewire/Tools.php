<?php

namespace App\Livewire;

use Livewire\Component;

class Tools extends Component
{
    public function render()
    {
        return view('livewire.tools')
            ->layout('layouts.app', [
                'title' => __('Tools'),
            ]);
    }
}
