<?php

namespace App\Livewire\Suppliers; // <-- UPDATED

use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Manage extends Component
{
    public Supplier $supplier;
    public $name = '', $email = '', $phone = '', $website = '', $address = '', $city = '', $postcode = '', $credit_limit = '', $account_number = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'account_number' => 'required|string|max:255',
        'email' => 'nullable|email|max:255',
        'phone' => 'nullable|string|max:20',
        'website' => 'nullable|url|max:255',
        'address' => 'nullable|string',
        'city' => 'nullable|string|max:255',
        'postcode' => 'nullable|string|max:10',
        'credit_limit' => 'nullable|numeric|min:0',
    ];

    public function mount(Supplier $supplier)
    {
        $this->supplier = $supplier;

        if ($this->supplier->exists && $this->supplier->user_id !== Auth::id()) {
            abort(403);
        }

        $this->name = $this->supplier->name;
        $this->email = $this->supplier->email;
        $this->phone = $this->supplier->phone;
        $this->website = $this->supplier->website;
        $this->address = $this->supplier->address;
        $this->city = $this->supplier->city;
        $this->postcode = $this->supplier->postcode;
        $this->credit_limit = $this->supplier->credit_limit;
        $this->account_number = $this->supplier->account_number;
    }

    public function save()
    {
        $validatedData = $this->validate();

        if (!$this->supplier->exists) {
            $validatedData['user_id'] = Auth::id();
        }

        $this->supplier->fill($validatedData)->save();

        session()->flash('success', 'Supplier saved successfully!');
        return redirect()->route('suppliers.index'); // <-- UPDATED
    }

    public function render()
    {
        $title = $this->supplier->exists ? 'Edit Supplier' : 'Add Supplier';

        return view('livewire.suppliers.manage') // <-- UPDATED
        ->layout('layouts.app', [
            'title' => $title,
        ]);
    }
}
