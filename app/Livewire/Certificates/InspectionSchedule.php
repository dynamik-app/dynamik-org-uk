<?php

namespace App\Livewire\Certificates;

use App\Models\Certificate;
use App\Models\InspectionGroup;
use Livewire\Component;

class InspectionSchedule extends Component
{
    public const RESULTS = ['N/A', 'LIM', 'Pass', 'C1', 'C2', 'C3'];

    public Certificate $certificate;

    /** @var \Illuminate\Support\Collection<int, \App\Models\InspectionGroup> */
    public $groups;

    /** @var array<int, string> */
    public array $inspectionResults = [];

    public function mount(Certificate $certificate): void
    {
        $this->certificate = $certificate->load('inspections');
        $this->groups = InspectionGroup::with(['items' => fn ($query) => $query->orderBy('order')])
            ->orderBy('order')
            ->get();
        $this->inspectionResults = $this->certificate->inspections
            ->pluck('result', 'inspection_item_id')
            ->toArray();
    }

    public function markItem(int $itemId, string $result): void
    {
        if ($result === '') {
            unset($this->inspectionResults[$itemId]);
            $this->certificate->inspections()
                ->where('inspection_item_id', $itemId)
                ->delete();

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
            $this->markItem($item->id, $result);
        }
    }

    public function render()
    {
        return view('livewire.certificates.inspection-schedule', [
            'groups' => $this->groups,
            'resultOptions' => self::RESULTS,
        ]);
    }
}
