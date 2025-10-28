<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        // Truncate the table to start fresh
        Section::truncate();

        $sections = [
            ['id' => 1, 'title' => 'General Health and Safety at Work'],
            ['id' => 2, 'title' => 'Manual Handling Operations'],
            ['id' => 3, 'title' => 'Reporting Accidents'],
            ['id' => 4, 'title' => 'Personal Protective Equipment at Work'],
            ['id' => 5, 'title' => 'Health and Hygiene'],
            ['id' => 6, 'title' => 'Fire and Emergency'],
            ['id' => 7, 'title' => 'Work at Height'],
            ['id' => 8, 'title' => 'Work Equipment'],
            ['id' => 9, 'title' => 'Special Site Hazards'],
            ['id' => 10, 'title' => 'Electrotechnical'],
            ['id' => 11, 'title' => 'Environmental'],
        ];

        // Insert the sections with specific IDs
        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}