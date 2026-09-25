<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\SiteSetting;

$settings = [
    ['key' => 'sched_title', 'value' => 'PROGRAMME SCHEDULE', 'group' => 'schedule'],
    ['key' => 'sched_sub', 'value' => 'Complete schedule of sessions, guest lectures, and presentations for Day 1 and Day 2.', 'group' => 'schedule'],
    
    ['key' => 'sched_day1_title', 'value' => 'DAY – I SCHEDULE', 'group' => 'schedule'],
    ['key' => 'sched_day1_time', 'value' => '9:30 AM – 6:00 PM', 'group' => 'schedule'],
    
    ['key' => 'sched_day2_title', 'value' => 'DAY – II SCHEDULE', 'group' => 'schedule'],
    ['key' => 'sched_day2_time', 'value' => '9:30 AM – 5:30 PM', 'group' => 'schedule'],

    ['key' => 'sched_tracks_title', 'value' => 'TRACK-WISE PRESENTATION SCHEDULE', 'group' => 'schedule'],
    ['key' => 'sched_tracks_sub', 'value' => 'Parallel technical tracks covering specialized domains of Global One Health Confluence 2026.', 'group' => 'schedule'],
];

// Day 1 Rows
$day1Rows = [
    ['time' => '9:30 AM – 11:30 AM', 'title' => 'Inauguration', 'badge' => '', 'icon' => 'fa-clock'],
    ['time' => '11:30 AM – 11:45 AM', 'title' => 'Tea Break', 'badge' => 'Refreshment', 'icon' => 'fa-mug-hot'],
    ['time' => '11:45 AM – 12:30 PM', 'title' => 'Guest Lecture - I', 'badge' => '', 'icon' => 'fa-clock'],
    ['time' => '12:30 PM – 1:15 PM', 'title' => 'Guest Lecture - II', 'badge' => '', 'icon' => 'fa-clock'],
    ['time' => '1:15 PM – 2:15 PM', 'title' => 'Lunch Break', 'badge' => 'Break', 'icon' => 'fa-utensils'],
    ['time' => '2:15 PM – 3:00 PM', 'title' => 'Guest Lecture - III', 'badge' => '', 'icon' => 'fa-clock'],
    ['time' => '3:00 PM – 6:00 PM', 'title' => 'Paper Presentation - Tracks I, II & III', 'badge' => 'Parallel Session', 'icon' => 'fa-clock'],
    ['time' => '3:00 PM – 6:00 PM', 'title' => 'Poster Presentation - Tracks I, II & III', 'badge' => 'Parallel Session', 'icon' => 'fa-clock'],
];

$count = 0;
foreach ($day1Rows as $row) {
    $count++;
    $settings[] = ['key' => "day1_{$count}_time", 'value' => $row['time'], 'group' => 'schedule'];
    $settings[] = ['key' => "day1_{$count}_title", 'value' => $row['title'], 'group' => 'schedule'];
    $settings[] = ['key' => "day1_{$count}_badge", 'value' => $row['badge'], 'group' => 'schedule'];
    $settings[] = ['key' => "day1_{$count}_icon", 'value' => $row['icon'], 'group' => 'schedule'];
}
$settings[] = ['key' => 'day1_count', 'value' => $count, 'group' => 'schedule'];

// Day 2 Rows
$day2Rows = [
    ['time' => '9:30 AM – 10:15 AM', 'title' => 'Guest Lecture - IV', 'badge' => '', 'icon' => 'fa-clock'],
    ['time' => '10:15 AM – 11:00 AM', 'title' => 'Guest Lecture - V', 'badge' => '', 'icon' => 'fa-clock'],
    ['time' => '11:00 AM – 11:15 AM', 'title' => 'Tea Break', 'badge' => 'Refreshment', 'icon' => 'fa-mug-hot'],
    ['time' => '11:15 AM – 1:15 PM', 'title' => 'Oral & Poster Presentations - Tracks IV & V', 'badge' => 'Parallel Session', 'icon' => 'fa-clock'],
    ['time' => '1:15 PM – 2:15 PM', 'title' => 'Lunch Break', 'badge' => 'Break', 'icon' => 'fa-utensils'],
    ['time' => '2:15 PM – 3:30 PM', 'title' => 'Guest Lecture - VI & Panel Discussion', 'badge' => '', 'icon' => 'fa-clock'],
    ['time' => '3:30 PM – 4:30 PM', 'title' => 'Valedictory & Award Ceremony', 'badge' => 'Special Event', 'icon' => 'fa-trophy'],
];

$count2 = 0;
foreach ($day2Rows as $row) {
    $count2++;
    $settings[] = ['key' => "day2_{$count2}_time", 'value' => $row['time'], 'group' => 'schedule'];
    $settings[] = ['key' => "day2_{$count2}_title", 'value' => $row['title'], 'group' => 'schedule'];
    $settings[] = ['key' => "day2_{$count2}_badge", 'value' => $row['badge'], 'group' => 'schedule'];
    $settings[] = ['key' => "day2_{$count2}_icon", 'value' => $row['icon'], 'group' => 'schedule'];
}
$settings[] = ['key' => 'day2_count', 'value' => $count2, 'group' => 'schedule'];

// Save settings to database
foreach ($settings as $setting) {
    SiteSetting::updateOrCreate(
        ['key' => $setting['key']],
        ['value' => $setting['value'], 'group' => $setting['group']]
    );
}

echo "Schedule settings seeded successfully.\n";
