<?php

namespace App\Livewire\Certificates;

use App\Models\Certificate;
use Illuminate\View\View;
use Livewire\Component;

class EditCertificate extends Component
{
    public Certificate $certificate;

    public array $installation = [
        'address' => '',
        'client' => '',
        'earthing' => '',
    ];

    /** @var array<int, array{name:string,location:string,circuits:array<int, array<string, mixed>>}> */
    public array $boards = [];

    /** @var array<int, array{code:string,note:string}> */
    public array $observations = [];

    public function mount(Certificate $certificate): void
    {
        $this->certificate = $certificate->load(['boards.circuits', 'client', 'project']);

        $this->installation = [
            'address' => $certificate->project->address ?? $certificate->client->address ?? '',
            'client' => $certificate->client->name ?? '',
            'earthing' => $certificate->metadata['earthing'] ?? '',
        ];

        $this->boards = $certificate->boards
            ->map(fn ($board) => [
                'name' => $board->name ?? '',
                'location' => $board->location ?? '',
                'circuits' => $board->circuits
                    ->map(fn ($circuit) => [
                        'circuit_ref' => $circuit->reference ?? '',
                        'description' => $circuit->description ?? '',
                        'protective_device' => $circuit->protective_device ?? '',
                        'rating' => $circuit->test_results['rating'] ?? '',
                        'cable_size' => $circuit->conductor_size ?? '',
                        'r1' => $circuit->test_results['r1'] ?? '',
                        'rn' => $circuit->test_results['rn'] ?? '',
                        'r2' => $circuit->test_results['r2'] ?? '',
                        'insulation_resistance' => $circuit->test_results['insulation_resistance'] ?? '',
                        'measured_zs' => $circuit->measured_zs ?? '',
                    ])
                    ->toArray(),
            ])
            ->toArray();

        if (empty($this->boards)) {
            $this->boards = [$this->blankBoard()];
        }

        $this->observations = $certificate->metadata['observations'] ?? [$this->blankObservation()];
    }

    public function addBoard(): void
    {
        $this->boards[] = $this->blankBoard();
    }

    public function removeBoard(int $index): void
    {
        unset($this->boards[$index]);
        $this->boards = array_values($this->boards);
    }

    public function addCircuit(int $boardIndex): void
    {
        if (! isset($this->boards[$boardIndex]['circuits'])) {
            $this->boards[$boardIndex]['circuits'] = [];
        }

        $this->boards[$boardIndex]['circuits'][] = $this->blankCircuit();
    }

    public function removeCircuit(int $boardIndex, int $circuitIndex): void
    {
        if (! isset($this->boards[$boardIndex]['circuits'][$circuitIndex])) {
            return;
        }

        unset($this->boards[$boardIndex]['circuits'][$circuitIndex]);
        $this->boards[$boardIndex]['circuits'] = array_values($this->boards[$boardIndex]['circuits']);
    }

    public function addObservation(): void
    {
        $this->observations[] = $this->blankObservation();
    }

    public function removeObservation(int $index): void
    {
        unset($this->observations[$index]);
        $this->observations = array_values($this->observations);

        if (empty($this->observations)) {
            $this->observations[] = $this->blankObservation();
        }
    }

    public function render(): View
    {
        return view('livewire.certificates.edit-certificate');
    }

    protected function blankBoard(): array
    {
        return [
            'name' => 'New Board',
            'location' => '',
            'circuits' => [
                $this->blankCircuit(),
            ],
        ];
    }

    protected function blankCircuit(): array
    {
        return [
            'circuit_ref' => '',
            'description' => '',
            'protective_device' => '',
            'rating' => '',
            'cable_size' => '',
            'r1' => '',
            'rn' => '',
            'r2' => '',
            'insulation_resistance' => '',
            'measured_zs' => '',
        ];
    }

    protected function blankObservation(): array
    {
        return [
            'code' => '',
            'note' => '',
        ];
    }
}
