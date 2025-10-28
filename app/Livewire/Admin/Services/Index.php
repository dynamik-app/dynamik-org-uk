<?php

namespace App\Livewire\Admin\Services;

use Livewire\Component;
use App\Models\Service;
use Livewire\Attributes\Title;

#[Title('Services')]
class Index extends Component
{
    public $services;

    public function mount()
    {
        $this->services = Service::latest()->get();
    }

    public function deleteService($id)
    {
        Service::find($id)->delete();
        $this->services = Service::latest()->get();
        session()->flash('success', 'Service deleted successfully!');
    }

    public function render()
    {
        return view('livewire.admin.services.index')
            ->layout('layouts.app'); // Or your admin layout
    }
}