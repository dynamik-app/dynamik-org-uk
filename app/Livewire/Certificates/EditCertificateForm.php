<?php

namespace App\Livewire\Certificates;

use App\Models\Certificate;
use Illuminate\View\View;
use Livewire\Component;

class EditCertificateForm extends Component
{
    public Certificate $certificate;

    /** @var array<int, array{slug:string,name:string,view:string}> */
    public array $sectionTemplates = [];

    public ?string $currentSectionSlug = null;

    public array $formState = [];

    public function mount(Certificate $certificate): void
    {
        $this->certificate = $certificate->loadMissing(['type.sections']);

        $this->formState = $certificate->form_state ?? [];

        $this->sectionTemplates = $certificate->type?->sections
            ->map(fn ($section) => [
                'slug' => $section->slug,
                'name' => $section->name,
                'view' => "livewire.certificates.sections.{$section->slug}",
            ])
            ->toArray();

        $this->currentSectionSlug = $this->sectionTemplates[0]['slug'] ?? null;
    }

    public function setSection(string $slug): void
    {
        $exists = collect($this->sectionTemplates)->pluck('slug')->contains($slug);

        if ($exists) {
            $this->currentSectionSlug = $slug;
        }
    }

    public function saveForm(): void
    {
        $this->certificate->update([
            'form_state' => $this->formState,
        ]);

        session()->flash('status', 'Certificate form updated.');
    }

    public function render(): View
    {
        $currentTemplate = collect($this->sectionTemplates)
            ->firstWhere('slug', $this->currentSectionSlug);

        return view('livewire.certificates.edit-form', [
            'currentTemplate' => $currentTemplate,
        ]);
    }
}
