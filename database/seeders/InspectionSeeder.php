<?php

namespace Database\Seeders;

use App\Models\InspectionGroup;
use App\Models\InspectionItem;
use Illuminate\Database\Seeder;

class InspectionSeeder extends Seeder
{
    public function run(): void
    {
        $groups = [
            [
                'name' => 'Intake Equipment',
                'order' => 1,
                'items' => [
                    [
                        'text' => 'Condition of service cable',
                        'regulation_ref' => '120.3',
                    ],
                    [
                        'text' => 'Condition of meter tails within intake equipment',
                        'regulation_ref' => '134.1.1',
                    ],
                    [
                        'text' => 'Adequacy and security of distributor main fuse or isolator',
                        'regulation_ref' => '132.12',
                    ],
                    [
                        'text' => 'Accessibility and labelling of main switch',
                        'regulation_ref' => '462.2',
                    ],
                    [
                        'text' => 'Presence and condition of distributor earthing terminal (if provided)',
                        'regulation_ref' => '542.3.2',
                    ],
                    [
                        'text' => 'Presence of notices and warning labels at intake position',
                        'regulation_ref' => '514.12.1',
                    ],
                ],
            ],
            [
                'name' => 'Presence of Adequate Arrangements',
                'order' => 2,
                'items' => [
                    [
                        'text' => 'Parallel or standby supplies correctly arranged with interlocks where required',
                        'regulation_ref' => '551.6',
                    ],
                    [
                        'text' => 'Alternative or renewable supplies labelled and provided with switching arrangements',
                        'regulation_ref' => '551.7',
                    ],
                    [
                        'text' => 'Arrangements to prevent backfeed into distributor network',
                        'regulation_ref' => '551.4.3.2',
                    ],
                    [
                        'text' => 'Documentation and notices for multiple supplies present and legible',
                        'regulation_ref' => '514.15',
                    ],
                    [
                        'text' => 'Earthing and bonding arrangements suitable for all sources of supply',
                        'regulation_ref' => '551.4.3.3',
                    ],
                ],
            ],
        ];

        foreach ($groups as $groupIndex => $groupData) {
            $group = InspectionGroup::updateOrCreate(
                ['name' => $groupData['name']],
                ['order' => $groupData['order'] ?? ($groupIndex + 1)]
            );

            foreach ($groupData['items'] as $itemIndex => $itemData) {
                InspectionItem::updateOrCreate(
                    [
                        'inspection_group_id' => $group->id,
                        'text' => $itemData['text'],
                    ],
                    [
                        'regulation_ref' => $itemData['regulation_ref'] ?? null,
                        'order' => $itemData['order'] ?? ($itemIndex + 1),
                    ]
                );
            }
        }
    }
}
