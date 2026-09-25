<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Deadline;

$defaultDeadlines = [
    ['title' => 'REGISTRATION STARTS', 'deadline_date' => '2026-09-20', 'icon' => 'fa-id-card', 'sort_order' => 1, 'is_active' => true],
    ['title' => 'SUBMISSION OF ABSTRACT', 'deadline_date' => '2026-10-07', 'icon' => 'fa-file-arrow-up', 'sort_order' => 2, 'is_active' => true],
    ['title' => 'ACCEPTANCE OF ABSTRACT', 'deadline_date' => '2026-10-15', 'icon' => 'fa-envelope-open-text', 'sort_order' => 3, 'is_active' => true],
    ['title' => 'FULL PAPER', 'deadline_date' => '2026-11-15', 'icon' => 'fa-book', 'sort_order' => 4, 'is_active' => true],
];

foreach ($defaultDeadlines as $d) {
    Deadline::updateOrCreate(
        ['title' => $d['title']],
        $d
    );
}

echo "Deadlines seeded successfully.\n";
