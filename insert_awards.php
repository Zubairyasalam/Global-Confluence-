<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$awards = [
    [
        'name' => 'Distinguished Scholar Award',
        'icon' => 'fa-solid fa-graduation-cap',
        'icon_color' => '#009688',
        'short_description' => 'Recognizing outstanding academic achievements and contributions.',
        'sort_order' => 1
    ],
    [
        'name' => 'Faculty Award for Excellence in Research',
        'icon' => 'fa-solid fa-microscope',
        'icon_color' => '#0ea5e9',
        'short_description' => 'Honoring faculty members for their exceptional research endeavors and discoveries.',
        'sort_order' => 2
    ],
    [
        'name' => 'Young Innovator and Entrepreneur Award',
        'icon' => 'fa-solid fa-lightbulb',
        'icon_color' => '#f59e0b',
        'short_description' => 'Celebrating young minds for their innovative ideas and entrepreneurial spirit.',
        'sort_order' => 3
    ]
];

foreach ($awards as $awardData) {
    // Only create if it doesn't already exist
    $award = \App\Models\Award::firstOrCreate(
        ['name' => $awardData['name']],
        $awardData
    );
    echo "Added award: " . $award->name . "\n";
}
