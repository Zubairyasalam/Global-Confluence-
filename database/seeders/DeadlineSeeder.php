<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Deadline;
use Carbon\Carbon;

class DeadlineSeeder extends Seeder
{
    public function run(): void
    {
        $deadlines = [
            ['title' => 'Abstract Submission Deadline', 'deadline_date' => Carbon::create(2026, 9, 10), 'sort_order' => 1],
            ['title' => 'Early Bird Registration Deadline', 'deadline_date' => Carbon::create(2026, 10, 15), 'sort_order' => 2],
            ['title' => 'Regular Registration Deadline', 'deadline_date' => Carbon::create(2026, 11, 20), 'sort_order' => 3],
        ];

        foreach ($deadlines as $d) {
            Deadline::create($d);
        }
    }
}
