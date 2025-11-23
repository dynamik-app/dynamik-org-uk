<?php

namespace App\Livewire\Companies;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateCompanyForm extends Component
{
    #[Validate('required|string|max:255')]
    public string $registered_name = '';

    #[Validate('nullable|string|max:50')]
    public ?string $companies_house_number = null;

    #[Validate('nullable|string|max:255')]
    public ?string $registered_status = null;

    #[Validate('nullable|date')]
    public ?string $incorporation_date = null;

    #[Validate('nullable|string')]
    public ?string $registered_address = null;

    #[Validate('nullable|string|max:50')]
    public ?string $paye_reference = null;

    #[Validate('nullable|string|max:50')]
    public ?string $corporation_tax_utr = null;

    #[Validate('nullable|string|max:50')]
    public ?string $vat_number = null;

    public function save(): void
    {
        $validated = $this->validate();

        Company::create([
            'owner_id' => Auth::id(),
            ...$validated,
        ]);

        session()->flash('status', 'Company profile created successfully.');

        $this->redirectRoute('dashboard');
    }

    public function render()
    {
        return view('livewire.companies.create-company-form');
    }
}
