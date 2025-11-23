<?php

namespace App\Livewire\Certificates;

use App\Models\Certificate;
use App\Models\InspectionGroup;
use App\Models\Observation;
use Livewire\Component;

class InspectionSchedule extends Component
{
    private const OBSERVATION_CODES = ['C1', 'C2', 'C3'];

    public const RESULTS = ['N/A', 'LIM', 'Pass', 'C1', 'C2', 'C3'];

    public Certificate $certificate;

    /** @var \Illuminate\Support\Collection<int, \App\Models\InspectionGroup> */
    public $groups;

    /** @var array<int, string> */
    public array $inspectionResults = [];

    /** @var array<int, string> */
    public array $observationNotes = [];

    public function mount(Certificate $certificate): void
    {
        $this->certificate = $certificate->load(['inspections', 'observations']);
        $this->groups = InspectionGroup::with(['items' => fn ($query) => $query->orderBy('order')])
            ->orderBy('order')
            ->get();
        $this->inspectionResults = $this->certificate->inspections
            ->pluck('result', 'inspection_item_id')
            ->toArray();

        $this->observationNotes = $this->certificate->observations
            ->pluck('details', 'inspection_item_id')
            ->toArray();
    }

    public function updatedResult(int $itemId, string $result): void
    {
        if ($result === '') {
            unset($this->inspectionResults[$itemId]);
            $this->certificate->inspections()
                ->where('inspection_item_id', $itemId)
                ->delete();

            $this->certificate->observations()
                ->where('inspection_item_id', $itemId)
                ->delete();

            $this->observationNotes[$itemId] = '';

            return;
        }

        if (! in_array($result, self::RESULTS, true)) {
            return;
        }

        $this->inspectionResults[$itemId] = $result;

        $this->certificate->inspections()->updateOrCreate(
            [
                'inspection_item_id' => $itemId,
            ],
            [
                'result' => $result,
            ]
        );

        if (in_array($result, self::OBSERVATION_CODES, true)) {
            $this->dispatch('show-observation-field', itemId: $itemId);
        } else {
            $this->certificate->observations()
                ->where('inspection_item_id', $itemId)
                ->delete();

            unset($this->observationNotes[$itemId]);
        }
    }

    public function markGroupAs(int $groupId, string $result): void
    {
        if (! in_array($result, self::RESULTS, true)) {
            return;
        }

        $group = $this->groups->firstWhere('id', $groupId);

        if (! $group) {
            return;
        }

        foreach ($group->items as $item) {
            $this->updatedResult($item->id, $result);
        }
    }

    public function saveObservation(int $itemId): void
    {
        if (! isset($this->inspectionResults[$itemId]) || ! in_array($this->inspectionResults[$itemId], self::OBSERVATION_CODES, true)) {
            return;
        }

        $this->validate([
            "observationNotes.$itemId" => ['required', 'string'],
        ], [], ["observationNotes.$itemId" => 'Observation details']);

        Observation::updateOrCreate(
            [
                'certificate_id' => $this->certificate->id,
                'inspection_item_id' => $itemId,
            ],
            [
                'code' => $this->inspectionResults[$itemId],
                'details' => $this->observationNotes[$itemId],
            ]
        );

        $this->dispatch('observation-saved', itemId: $itemId);
    }

    public function render()
    {
        return view('livewire.certificates.inspection-schedule', [
            'groups' => $this->groups,
            'resultOptions' => self::RESULTS,
        ]);
    }
}
