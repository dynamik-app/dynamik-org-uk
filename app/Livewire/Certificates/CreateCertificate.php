<?php

namespace App\Livewire\Certificates;

use App\Models\Certificate;
use App\Models\CertificateSection;
use App\Models\CertificateType;
use App\Models\Client;
use App\Models\Company;
use App\Models\Project;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Component;

class CreateCertificate extends Component
{
    public Company $company;

    /** @var array<int, array{id:int,name:string,slug:string}> */
    public array $certificateTypes = [];

    /** @var array<int, array{id:int,name:string}> */
    public array $clients = [];

    /** @var array<int, array{id:int,name:string}> */
    public array $projects = [];

    /** @var array<int, array{slug:string,name:string,view:string}> */
    public array $sectionTemplates = [];

    public int $currentStep = 0;

    public array $steps = [];

    public int|string|null $certificateTypeId = null;

    public int|string|null $clientId = null;

    public ?int $projectId = null;

    public string $projectSelection = '';

    public bool $creatingProject = false;

    public array $projectForm = [
        'name' => '',
        'address' => '',
        'city' => '',
        'postcode' => '',
        'notes' => '',
    ];

    public array $formState = [];

    protected array $baseSteps = [
        'select-type',
        'client-details',
        'installation-details',
        'review',
    ];

    public function mount(): void
    {
        $user = Auth::user();
        $this->company = $user?->defaultCompany ?? abort(403, 'No default company set for this user.');

        $this->loadCertificateTypes();
        $this->loadClients();
        $this->refreshSteps();
    }

    public function render(): View
    {
        return view('livewire.certificates.create-certificate', [
            'currentStepSlug' => $this->steps[$this->currentStep] ?? null,
        ]);
    }

    public function updatedCertificateTypeId(): void
    {
        $this->certificateTypeId = $this->certificateTypeId ? (int) $this->certificateTypeId : null;
        $this->hydrateSections();
        $this->refreshSteps();
    }

    public function updatedClientId($value): void
    {
        $this->clientId = $value ? (int) $value : null;
        $this->projectSelection = '';
        $this->projectId = null;
        $this->creatingProject = false;

        if ($value) {
            $this->loadProjects((int) $value);
        } else {
            $this->projects = [];
        }
    }

    public function updatedProjectSelection($value): void
    {
        if ($value === 'create') {
            $this->creatingProject = true;
            $this->projectId = null;
        } else {
            $this->creatingProject = false;
            $this->projectId = $value ? (int) $value : null;
        }
    }

    public function nextStep(): void
    {
        $this->validateCurrentStep();

        if ($this->currentStep < count($this->steps) - 1) {
            $this->currentStep++;
        }
    }

    public function previousStep(): void
    {
        if ($this->currentStep > 0) {
            $this->currentStep--;
        }
    }

    public function saveCertificate(): RedirectResponse|Redirector
    {
        $this->validate([
            'certificateTypeId' => $this->certificateTypeRule(),
            'clientId' => $this->clientRule(),
            'projectId' => $this->projectRule(),
        ]);

        $certificateTypeId = $this->certificateTypeId ? (int) $this->certificateTypeId : null;
        $clientId = $this->clientId ? (int) $this->clientId : null;

        $certificate = Certificate::create([
            'certificate_type_id' => $certificateTypeId,
            'company_id' => $this->company->id,
            'client_id' => $clientId,
            'project_id' => $this->projectId,
            'status' => 'draft',
            'form_state' => $this->formState,
        ]);

        return redirect()
            ->route('certificates.show', $certificate)
            ->with('status', 'Certificate draft created successfully.');
    }

    protected function validateCurrentStep(): void
    {
        $slug = $this->steps[$this->currentStep] ?? null;

        if ($slug === 'select-type') {
            $this->validate([
                'certificateTypeId' => $this->certificateTypeRule(),
            ]);
        }

        if ($slug === 'client-details') {
            $this->validate([
                'clientId' => $this->clientRule(),
            ]);
        }

        if ($slug === 'installation-details') {
            $this->persistProjectSelection();
        }
    }

    protected function persistProjectSelection(): void
    {
        $rules = [
            'clientId' => $this->clientRule(),
            'projectId' => $this->projectRule(),
            'projectSelection' => ['nullable', 'string'],
        ];

        if ($this->creatingProject) {
            $rules = array_merge($rules, [
                'projectForm.name' => ['required', 'string', 'max:255'],
                'projectForm.address' => ['nullable', 'string', 'max:255'],
                'projectForm.city' => ['nullable', 'string', 'max:255'],
                'projectForm.postcode' => ['nullable', 'string', 'max:20'],
                'projectForm.notes' => ['nullable', 'string'],
            ]);
        }

        $this->validate($rules, [], [
            'projectForm.name' => 'project name',
        ]);

        if ($this->creatingProject) {
            $clientId = $this->clientId ? (int) $this->clientId : null;

            $project = Project::create([
                'company_id' => $this->company->id,
                'client_id' => $clientId,
                'name' => $this->projectForm['name'],
                'address' => $this->projectForm['address'] ?? null,
                'city' => $this->projectForm['city'] ?? null,
                'postcode' => $this->projectForm['postcode'] ?? null,
                'notes' => $this->projectForm['notes'] ?? null,
            ]);

            $this->projects[] = ['id' => $project->id, 'name' => $project->name];
            $this->projectId = $project->id;
            $this->projectSelection = (string) $project->id;
            $this->creatingProject = false;
        }
    }

    protected function loadCertificateTypes(): void
    {
        $this->certificateTypes = CertificateType::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get(['id', 'name', 'slug'])
            ->map(fn (CertificateType $type) => [
                'id' => $type->id,
                'name' => $type->name,
                'slug' => $type->slug,
            ])->toArray();
    }

    protected function loadClients(): void
    {
        $this->clients = Client::query()
            ->where('company_id', $this->company->id)
            ->orderBy('name')
            ->get(['id', 'name'])
            ->map(fn (Client $client) => [
                'id' => $client->id,
                'name' => $client->name,
            ])->toArray();
    }

    protected function loadProjects(int $clientId): void
    {
        $this->projects = Project::query()
            ->where('company_id', $this->company->id)
            ->where('client_id', $clientId)
            ->orderBy('name')
            ->get(['id', 'name'])
            ->map(fn (Project $project) => [
                'id' => $project->id,
                'name' => $project->name,
            ])->toArray();
    }

    protected function refreshSteps(): void
    {
        $dynamicSteps = collect($this->sectionTemplates)->pluck('slug')->toArray();

        $this->steps = [
            'select-type',
            'client-details',
            'installation-details',
            ...$dynamicSteps,
            'review',
        ];

        $this->currentStep = min($this->currentStep, max(count($this->steps) - 1, 0));
    }

    protected function hydrateSections(): void
    {
        if (! $this->certificateTypeId) {
            $this->sectionTemplates = [];

            return;
        }

        $this->sectionTemplates = CertificateSection::query()
            ->where('certificate_type_id', $this->certificateTypeId)
            ->orderBy('sort_order')
            ->get(['id', 'name', 'slug'])
            ->map(fn (CertificateSection $section) => [
                'slug' => $section->slug,
                'name' => $section->name,
                'view' => "livewire.certificates.sections.{$section->slug}",
            ])->toArray();
    }

    protected function certificateTypeRule(): array
    {
        return ['required', 'integer', Rule::exists('certificate_types', 'id')->where('is_active', true)];
    }

    protected function clientRule(): array
    {
        return [
            'required',
            'integer',
            Rule::exists('clients', 'id')->where(fn (Builder $query) => $query->where('company_id', $this->company->id)),
        ];
    }

    protected function projectRule(): array
    {
        return [
            'nullable',
            'integer',
            Rule::exists('projects', 'id')->where(fn (Builder $query) => $query->where('company_id', $this->company->id)),
        ];
    }
}
