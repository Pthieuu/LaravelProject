<?php

namespace Database\Seeders;

use App\Models\Action;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Action::query()->firstOrCreate(
            ['title' => 'Campus plastic audit'],
            [
                'sdg_number' => 12,
                'sdg_title' => 'Responsible Consumption and Production',
                'description' => 'Map single-use plastic hotspots, publish a short report, and propose refill stations.',
                'owner' => 'Green Club',
                'impact_score' => 7,
                'status' => 'doing',
            ],
        );

        Action::query()->firstOrCreate(
            ['title' => 'Weekend climate lesson'],
            [
                'sdg_number' => 13,
                'sdg_title' => 'Climate Action',
                'description' => 'Prepare a 45-minute lesson that explains local climate risks with student-made examples.',
                'owner' => 'Class 11A',
                'impact_score' => 6,
                'status' => 'planned',
            ],
        );

        Action::query()->firstOrCreate(
            ['title' => 'Peer tutoring circle'],
            [
                'sdg_number' => 4,
                'sdg_title' => 'Quality Education',
                'description' => 'Pair students for weekly math and English tutoring, then record progress after each month.',
                'owner' => 'Volunteer Team',
                'impact_score' => 8,
                'status' => 'done',
                'completed_at' => now(),
            ],
        );
    }
}
