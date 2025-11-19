<?php

namespace Database\Seeders;

use App\Models\Solution;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SolutionsSeeder extends Seeder
{
    public function run(): void
    {
        $solutions = [
            [
                'name' => 'Hager Electrical Distribution',
                'slug' => 'hager-electrical-distribution',
                'description' => 'Design and installation of Hager panels, boards, and protection devices for efficient, compliant electrical distribution across commercial and industrial sites.',
            ],
            [
                'name' => 'C-TEC Fire & Voice Systems',
                'slug' => 'ctec-fire-and-voice-systems',
                'description' => 'Specification, installation, and maintenance of C-TEC fire alarm, call point, and emergency voice communication systems that keep people and assets protected.',
            ],
            [
                'name' => 'HikVision Security & CCTV',
                'slug' => 'hikvision-security-and-cctv',
                'description' => 'End-to-end HikVision CCTV, access control, and video management deployments that secure perimeters, warehouses, and multi-site estates.',
            ],
        ];

        foreach ($solutions as $solution) {
            Solution::updateOrCreate(
                ['slug' => $solution['slug']],
                [
                    'name' => $solution['name'],
                    'description' => $solution['description'],
                    'is_published' => true,
                    'slug' => $solution['slug'] ?: Str::slug($solution['name']),
                ]
            );
        }
    }
}
