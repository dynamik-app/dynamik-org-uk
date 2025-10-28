<?php

namespace App\Livewire\Admin\Solutions;

use Livewire\Component;
use App\Models\Solution;
use Livewire\Attributes\Title;

#[Title('Solutions')]
class Index extends Component
{
    public $solutions;

    public function mount()
    {
        $this->solutions = Solution::latest()->get();
    }

    public function deleteSolution($id)
    {
        Solution::find($id)?->delete();
        $this->solutions = Solution::latest()->get();
        session()->flash('success', 'Solution deleted successfully!');
    }

    public function render()
    {
        return view('livewire.admin.solutions.index')
            ->layout('layouts.app', [
                'title' => 'Manage Solutions',
            ]);
    }
}
