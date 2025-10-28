<?php

namespace App\Livewire\Suppliers; // <-- UPDATED

use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function deleteSupplier(Supplier $supplier)
    {
        // Authorization: Ensures a user can only delete their own suppliers
        if ($supplier->user_id !== Auth::id()) {
            abort(403);
        }
        $supplier->delete();
        session()->flash('success', 'Supplier deleted.');
    }

    public function render()
    {
        $suppliers = Auth::user()->suppliers()->orderBy('name')->get();

        return view('livewire.suppliers.index', ['suppliers' => $suppliers]) // <-- UPDATED
        ->layout('layouts.app');
    }
}