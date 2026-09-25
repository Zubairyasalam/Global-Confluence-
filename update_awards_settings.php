<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\SiteSetting;

$settings = [
    ['key' => 'awards_section_title', 'value' => 'CONFERENCE AWARDS', 'group' => 'awards_page'],
    ['key' => 'awards_section_sub', 'value' => 'Celebrating exceptional scholastic achievements, research excellence, and entrepreneurial vision with cash prizes and distiction.', 'group' => 'awards_page'],

    ['key' => 'award_1_title', 'value' => "Faculty Award for excellence in\nOne Health research", 'group' => 'awards_page'],
    ['key' => 'award_1_amount', 'value' => '₹ 25,000', 'group' => 'awards_page'],
    ['key' => 'award_1_icon', 'value' => 'fa-solid fa-award', 'group' => 'awards_page'],

    ['key' => 'award_2_title', 'value' => "One Health Distinguished\nResearch Scholar Award", 'group' => 'awards_page'],
    ['key' => 'award_2_amount', 'value' => '₹ 10,000', 'group' => 'awards_page'],
    ['key' => 'award_2_icon', 'value' => 'fa-solid fa-award', 'group' => 'awards_page'],

    ['key' => 'award_3_title', 'value' => "Young Innovator &\nEntrepreneur Award", 'group' => 'awards_page'],
    ['key' => 'award_3_amount', 'value' => '₹ 25,000', 'group' => 'awards_page'],
    ['key' => 'award_3_icon', 'value' => 'fa-solid fa-award', 'group' => 'awards_page'],

    ['key' => 'awards_footer_icon', 'value' => 'fa-solid fa-medal', 'group' => 'awards_page'],
    ['key' => 'awards_footer_note', 'value' => "Prizes will be awarded for best Oral, Poster\nPresentations and Best Innovation Pitch", 'group' => 'awards_page'],
];

foreach ($settings as $setting) {
    SiteSetting::updateOrCreate(
        ['key' => $setting['key']],
        [
            'value' => $setting['value'],
            'group' => $setting['group']
        ]
    );
}

echo "Awards settings seeded successfully.\n";
