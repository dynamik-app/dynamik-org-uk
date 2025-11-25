<?php

namespace Database\Seeders;

use App\Models\CertificateSection;
use App\Models\CertificateType;
use Illuminate\Database\Seeder;

class CertificateSectionTemplatesSeeder extends Seeder
{
    public function run(): void
    {
        $types = CertificateType::query()
            ->whereIn('slug', [
                'electrical-installation-certificate',
                'electrical-installation-condition-report',
            ])
            ->get()
            ->keyBy('slug');

        $sections = [
            'electrical-installation-certificate' => [
                [
                    'name' => 'Installation details & design compliance',
                    'slug' => 'eic-installation-details',
                    'description' => 'Captures supply characteristics, bonding and responsible persons as required by BS 7671:2018+A2:2022.',
                    'sort_order' => 10,
                    'schema' => [
                        'groups' => [
                            'installation',
                            'supply_characteristics',
                            'bonding',
                            'responsible_persons',
                        ],
                    ],
                ],
                [
                    'name' => 'Initial verification test results',
                    'slug' => 'eic-test-results',
                    'description' => 'Records insulation resistance, continuity and RCD results for representative circuits.',
                    'sort_order' => 20,
                    'schema' => [
                        'table' => 'circuits',
                        'fields' => [
                            'circuit_reference',
                            'description',
                            'protective_device',
                            'conductor_size',
                            'r1_r2',
                            'ir_ln',
                            'ir_le',
                            'polarity',
                            'zs',
                            'rcd_trip',
                        ],
                    ],
                ],
            ],
            'electrical-installation-condition-report' => [
                [
                    'name' => 'Supply characteristics & earthing arrangements',
                    'slug' => 'eicr-supply-characteristics',
                    'description' => 'Details incoming supply, earthing arrangement, and distributor protective device.',
                    'sort_order' => 10,
                    'schema' => [
                        'groups' => [
                            'general',
                            'supply',
                            'earthing',
                        ],
                    ],
                ],
                [
                    'name' => 'Extent, limitations & overall assessment',
                    'slug' => 'eicr-inspection-details',
                    'description' => 'Records scope of inspection, agreed limitations, and the overall outcome.',
                    'sort_order' => 20,
                    'schema' => [
                        'fields' => [
                            'premises',
                            'extent',
                            'limitations',
                            'supply_status',
                            'assessment',
                            'next_inspection',
                        ],
                    ],
                ],
                [
                    'name' => 'Circuit test measurements',
                    'slug' => 'eicr-test-results',
                    'description' => 'Stores continuity, insulation resistance, and Zs checks for sampled circuits.',
                    'sort_order' => 30,
                    'schema' => [
                        'table' => 'circuits',
                        'fields' => [
                            'circuit_reference',
                            'description',
                            'protective_device',
                            'conductor_size',
                            'continuity',
                            'ir_results',
                            'polarity',
                            'measured_zs',
                        ],
                    ],
                ],
                [
                    'name' => 'Observations & recommendations',
                    'slug' => 'eicr-observations',
                    'description' => 'Captures C1/C2/C3/FI codes and recommended actions in line with BS 7671 reporting.',
                    'sort_order' => 40,
                    'schema' => [
                        'table' => 'observations',
                        'fields' => [
                            'item',
                            'code',
                            'recommendation',
                        ],
                    ],
                ],
            ],
        ];

        foreach ($sections as $slug => $templates) {
            $type = $types[$slug] ?? null;

            if (! $type) {
                continue;
            }

            foreach ($templates as $template) {
                CertificateSection::updateOrCreate(
                    [
                        'certificate_type_id' => $type->id,
                        'slug' => $template['slug'],
                    ],
                    [
                        'name' => $template['name'],
                        'description' => $template['description'] ?? null,
                        'sort_order' => $template['sort_order'] ?? 0,
                        'schema' => $template['schema'] ?? null,
                    ],
                );
            }
        }
    }
}
