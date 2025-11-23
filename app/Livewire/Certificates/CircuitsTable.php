<?php

namespace App\Livewire\Certificates;

use Livewire\Component;

class CircuitsTable extends Component
{
    public array $circuits = [];

    public function mount(array $circuits = []): void
    {
        $this->circuits = count($circuits) ? array_values($circuits) : [$this->blankCircuit()];
    }

    public function addCircuit(): void
    {
        $this->circuits[] = $this->blankCircuit();
    }

    public function removeCircuit(int $index): void
    {
        unset($this->circuits[$index]);
        $this->circuits = array_values($this->circuits);
    }

    protected function blankCircuit(): array
    {
        return [
            'description' => '',
            'type_of_wiring' => '',
            'rating' => '',
            'rcd_trip_time' => '',
            'measured_zs' => '',
        ];
    }

    public function render()
    {
        return view('livewire.certificates.circuits-table');
    }
}
