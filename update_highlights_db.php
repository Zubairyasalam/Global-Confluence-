<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Highlight;
use App\Models\SiteSetting;

// Clear existing highlights and seed the 9 new items
Highlight::truncate();

$itemsCol1 = [
    'Plenary Sessions',
    'Invited Talks',
    'Oral & poster presentations',
];

$itemsCol2 = [
    'Hackathon',
    'Innovator Pitch Contest',
    'Industry Merchandise',
];

$itemsCol3 = [
    'Panel Discussions',
    'Policy Roundtable Discussions',
    'Exemplary recognition',
];

$sort = 0;
foreach ($itemsCol1 as $title) {
    Highlight::create(['title' => $title, 'column_number' => 1, 'sort_order' => $sort++]);
}
foreach ($itemsCol2 as $title) {
    Highlight::create(['title' => $title, 'column_number' => 2, 'sort_order' => $sort++]);
}
foreach ($itemsCol3 as $title) {
    Highlight::create(['title' => $title, 'column_number' => 3, 'sort_order' => $sort++]);
}

// Update Scientific Publication settings
SiteSetting::updateOrCreate(['key' => 'pub_title'], ['value' => 'Scientific Publications', 'group' => 'highlights']);
SiteSetting::updateOrCreate(['key' => 'pub_subtitle'], ['value' => 'Selected peer-reviewed manuscripts will be considered for publication in:', 'group' => 'highlights']);
SiteSetting::updateOrCreate(['key' => 'pub_item_1'], ['value' => 'Scopus-indexed journals', 'group' => 'highlights']);
SiteSetting::updateOrCreate(['key' => 'pub_item_2'], ['value' => 'Edited ISBN conference proceedings', 'group' => 'highlights']);
SiteSetting::updateOrCreate(['key' => 'pub_item_3'], ['value' => 'Special issues with partnering international journals (subject to peer review)', 'group' => 'highlights']);

echo "Highlights DB updated successfully!\n";
