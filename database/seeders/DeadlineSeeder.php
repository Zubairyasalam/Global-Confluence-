<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Deadline;

class DeadlineSeeder extends Seeder
{
    public function run(): void
    {
        $deadlines = [
            [
                'phase' => 'PHASE 01',
                'date_text' => 'Oct 07, 2026',
                'deadline_date' => '2026-10-07',
                'title' => 'Submission of Abstract',
                'description' => 'Online submission portal open for structured scientific abstracts across all conference tracks.',
                'icon' => 'fa-solid fa-file-arrow-up',
                'tag_label' => 'Call for Abstracts',
                'tag_icon' => 'fa-solid fa-circle-dot',
                'color_theme' => 'teal',
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'phase' => 'PHASE 02',
                'date_text' => 'Oct 15, 2026',
                'deadline_date' => '2026-10-15',
                'title' => 'Acceptance of Abstract',
                'description' => 'Formal notification sent to authors regarding peer review outcome and presentation mode.',
                'icon' => 'fa-solid fa-envelope-open-text',
                'tag_label' => 'Review & Intimation',
                'tag_icon' => 'fa-regular fa-clock',
                'color_theme' => 'navy',
                'is_active' => true,
                'sort_order' => 2
            ],
            [
                'phase' => 'PHASE 03',
                'date_text' => 'Nov 15, 2026',
                'deadline_date' => '2026-11-15',
                'title' => 'Full Paper Submission',
                'description' => 'Camera-ready manuscript submission for publication in indexed conference proceedings.',
                'icon' => 'fa-solid fa-book-journal-whills',
                'tag_label' => 'Final Proceedings',
                'tag_icon' => 'fa-solid fa-award',
                'color_theme' => 'lime',
                'is_active' => true,
                'sort_order' => 3
            ],
        ];

        Deadline::truncate();
        foreach ($deadlines as $d) {
            Deadline::create($d);
        }
    }
}
