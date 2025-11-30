<?php

namespace App\Livewire\Companies;

use App\Models\Company;
use App\Services\CompaniesHouseClient;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
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

    public ?array $companies_house_snapshot = null;

    public ?string $lookupError = null;

    #[Title('Create Company')]
    #[Layout('layouts.app')]
    public function save(): void
    {
        $validated = $this->validate();

        $companyData = array_merge($validated, [
            'companies_house_snapshot' => $this->companies_house_snapshot,
        ]);

        Company::create([
            'owner_id' => Auth::id(),
            ...$companyData,
        ]);

        session()->flash('status', 'Company profile created successfully.');

        $this->redirectRoute('dashboard');
    }

    public function render(): View
    {
        return view('livewire.companies.create-company-form');
    }

    public function lookup(CompaniesHouseClient $client): void
    {
        $this->validateOnly('companies_house_number');

        $this->lookupError = null;

        if (! $this->companies_house_number) {
            $this->lookupError = 'Enter a Companies House registration number to search.';

            return;
        }

        $result = $client->lookupCompany($this->companies_house_number);

        if (! $result) {
            $this->lookupError = 'No company details found for that registration number.';

            return;
        }

        $this->companies_house_snapshot = $result;
        $this->registered_name = $result['company_name'] ?? $this->registered_name;
        $this->registered_status = $result['company_status'] ?? $this->registered_status;
        $this->incorporation_date = $result['date_of_creation'] ?? $this->incorporation_date;

        if (isset($result['registered_office_address'])) {
            $address = $result['registered_office_address'];
            $this->registered_address = collect([
                $address['address_line_1'] ?? null,
                $address['address_line_2'] ?? null,
                $address['locality'] ?? null,
                $address['postal_code'] ?? null,
                $address['country'] ?? null,
            ])->filter()->join(", ");
        }
    }
}
