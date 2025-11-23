<?php

namespace App\Livewire\Projects;

use App\Models\Client;
use App\Models\Company;
use App\Models\Project;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Exists;
use Illuminate\View\View;
use Livewire\Component;

class CreateProjectForm extends Component
{
    public Company $company;

    /** @var array<int, array{id:int,name:string}> */
    public array $clients = [];

    public ?int $selectedClientId = null;

    public string $name = '';

    public ?string $address = null;

    public ?string $city = null;

    public ?string $postcode = null;

    public ?string $notes = null;

    public bool $showClientForm = false;

    public array $clientForm = [
        'name' => '',
        'contact_name' => '',
        'email' => '',
        'phone' => '',
        'address' => '',
        'city' => '',
        'postcode' => '',
    ];

    public function mount(Company $company): void
    {
        $this->company = $company;
        $this->clients = $company->clients()->orderBy('name')->get(['id', 'name'])->map(fn (Client $client) => [
            'id' => $client->id,
            'name' => $client->name,
        ])->toArray();
    }

    public function save(): void
    {
        $validated = $this->validate($this->rules(), [], [
            'selectedClientId' => 'client',
        ]);

        Project::create([
            'company_id' => $this->company->id,
            'client_id' => $validated['selectedClientId'] ?? null,
            'name' => $validated['name'],
            'address' => $validated['address'] ?? null,
            'city' => $validated['city'] ?? null,
            'postcode' => $validated['postcode'] ?? null,
            'notes' => $validated['notes'] ?? null,
        ]);

        session()->flash('status', 'Project created successfully.');

        $this->redirectRoute('projects.index');
    }

    public function toggleClientForm(): void
    {
        $this->showClientForm = ! $this->showClientForm;
    }

    public function createClient(): void
    {
        $validatedClient = $this->validate($this->clientRules(), [], [
            'clientForm.name' => 'client name',
            'clientForm.email' => 'client email',
        ]);

        $client = $this->company->clients()->create($validatedClient['clientForm']);

        $this->clients[] = ['id' => $client->id, 'name' => $client->name];
        $this->selectedClientId = $client->id;

        $this->resetClientForm();
        $this->showClientForm = false;

        session()->flash('status', 'Client added and selected for this project.');
    }

    public function render(): View
    {
        return view('livewire.projects.create-project-form');
    }

    protected function rules(): array
    {
        return [
            'selectedClientId' => ['nullable', 'integer', $this->clientExistsInCompanyRule()],
            'name' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'postcode' => ['nullable', 'string', 'max:20'],
            'notes' => ['nullable', 'string'],
        ];
    }

    protected function clientRules(): array
    {
        return [
            'clientForm.name' => ['required', 'string', 'max:255'],
            'clientForm.contact_name' => ['nullable', 'string', 'max:255'],
            'clientForm.email' => ['nullable', 'string', 'email', 'max:255'],
            'clientForm.phone' => ['nullable', 'string', 'max:50'],
            'clientForm.address' => ['nullable', 'string', 'max:255'],
            'clientForm.city' => ['nullable', 'string', 'max:255'],
            'clientForm.postcode' => ['nullable', 'string', 'max:20'],
        ];
    }

    protected function resetClientForm(): void
    {
        $this->clientForm = [
            'name' => '',
            'contact_name' => '',
            'email' => '',
            'phone' => '',
            'address' => '',
            'city' => '',
            'postcode' => '',
        ];
    }

    protected function clientExistsInCompanyRule(): Exists
    {
        return Rule::exists('clients', 'id')->where(function (Builder $query) {
            return $query->where('company_id', $this->company->id);
        });
    }
}
