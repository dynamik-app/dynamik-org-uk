<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Service;

class Homepage extends Component
{
    public $services;
    protected $layout = 'layouts.app';

    public function mount()
    {
        $this->services = Service::all();
    }

    public function render()
    {
        return view('livewire.homepage');
    }
}
