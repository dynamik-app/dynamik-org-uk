<?php

namespace Database\Seeders;

use App\Models\CertificateType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CertificateTypesSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            [
                'name' => 'Electrical Installation Certificate',
                'slug' => 'electrical-installation-certificate',
                'description' => 'For new installations, alterations, or additions verifying compliance with BS 7671.',
                'metadata' => [
                    'form_code' => 'EIC',
                    'standard' => 'BS 7671:2018+A2:2022',
                ],
            ],
            [
                'name' => 'Minor Electrical Installation Works Certificate',
                'slug' => 'minor-electrical-installation-works-certificate',
                'description' => 'Covers minor works that do not extend to the creation of new circuits.',
                'metadata' => [
                    'form_code' => 'MEIWC',
                    'standard' => 'BS 7671:2018+A2:2022',
                ],
            ],
            [
                'name' => 'Electrical Installation Condition Report',
                'slug' => 'electrical-installation-condition-report',
                'description' => 'Periodic inspection report documenting the condition of existing electrical installations.',
                'metadata' => [
                    'form_code' => 'EICR',
                    'standard' => 'BS 7671:2018+A2:2022',
                ],
            ],
            [
                'name' => 'Emergency Lighting Completion Certificate',
                'slug' => 'emergency-lighting-completion-certificate',
                'description' => 'Confirms commissioning results and compliance for emergency lighting systems.',
                'metadata' => [
                    'form_code' => 'ELC',
                    'standard' => 'BS 5266-1:2023',
                ],
            ],
            [
                'name' => 'Fire Alarm Installation Certificate',
                'slug' => 'fire-alarm-installation-certificate',
                'description' => 'Certifies installation and commissioning of fire detection and alarm systems.',
                'metadata' => [
                    'form_code' => 'FAIC',
                    'standard' => 'BS 5839-1:2017',
                ],
            ],
        ];

        foreach ($types as $type) {
            CertificateType::updateOrCreate(
                ['slug' => Str::slug($type['slug'])],
                [
                    'name' => $type['name'],
                    'slug' => $type['slug'],
                    'description' => $type['description'],
                    'metadata' => $type['metadata'],
                    'is_active' => true,
                ],
            );
        }
    }
}
