<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\SiteSetting;

$defaults = [
    // Highlights & Publications
    ['group' => 'highlights', 'key' => 'highlights_title', 'label' => 'Highlights Title', 'type' => 'text', 'value' => 'Conference Highlights'],
    ['group' => 'highlights', 'key' => 'highlights_subtitle', 'label' => 'Highlights Subtitle', 'type' => 'text', 'value' => 'Key features and interactive forums scheduled for the Global One Health Confluence 2026'],
    ['group' => 'highlights', 'key' => 'pub_title', 'label' => 'Publications Title', 'type' => 'text', 'value' => 'Scientific Publications'],
    ['group' => 'highlights', 'key' => 'pub_subtitle', 'label' => 'Publications Subtitle', 'type' => 'text', 'value' => 'Selected peer-reviewed manuscripts will be considered for publication in:'],
    ['group' => 'highlights', 'key' => 'pub_item_1', 'label' => 'Publication Item 1', 'type' => 'text', 'value' => 'Scopus-indexed journals'],
    ['group' => 'highlights', 'key' => 'pub_item_2', 'label' => 'Publication Item 2', 'type' => 'text', 'value' => 'Edited ISBN conference proceedings'],
    ['group' => 'highlights', 'key' => 'pub_item_3', 'label' => 'Publication Item 3', 'type' => 'text', 'value' => 'Special issues with partnering international journals (subject to review)'],

    // Who Can Attend (Participants)
    ['group' => 'participants', 'key' => 'part_tag', 'label' => 'Section Tagline', 'type' => 'text', 'value' => 'WHO CAN ATTEND'],
    ['group' => 'participants', 'key' => 'part_title', 'label' => 'Section Title', 'type' => 'text', 'value' => 'Our Participants'],
    ['group' => 'participants', 'key' => 'part_sub', 'label' => 'Section Subtitle', 'type' => 'text', 'value' => 'Join the confluence to bridge microbes, molecules & mankind for a sustainable future.'],
    
    ['group' => 'participants', 'key' => 'part_1_label', 'label' => 'Participant 1 Label', 'type' => 'text', 'value' => "Students &\nResearch Scholars"],
    ['group' => 'participants', 'key' => 'part_1_icon', 'label' => 'Participant 1 Icon', 'type' => 'text', 'value' => 'fa-solid fa-graduation-cap'],

    ['group' => 'participants', 'key' => 'part_2_label', 'label' => 'Participant 2 Label', 'type' => 'text', 'value' => "Academicians &\nPolicy Makers"],
    ['group' => 'participants', 'key' => 'part_2_icon', 'label' => 'Participant 2 Icon', 'type' => 'text', 'value' => 'fa-solid fa-microscope'],

    ['group' => 'participants', 'key' => 'part_3_label', 'label' => 'Participant 3 Label', 'type' => 'text', 'value' => "Research\nScientists"],
    ['group' => 'participants', 'key' => 'part_3_icon', 'label' => 'Participant 3 Icon', 'type' => 'text', 'value' => 'fa-solid fa-flask'],

    ['group' => 'participants', 'key' => 'part_4_label', 'label' => 'Participant 4 Label', 'type' => 'text', 'value' => "Health\nProfessionals"],
    ['group' => 'participants', 'key' => 'part_4_icon', 'label' => 'Participant 4 Icon', 'type' => 'text', 'value' => 'fa-solid fa-book-open-reader'],

    ['group' => 'participants', 'key' => 'part_5_label', 'label' => 'Participant 5 Label', 'type' => 'text', 'value' => "Industry Experts (Pharma\n& Health)"],
    ['group' => 'participants', 'key' => 'part_5_icon', 'label' => 'Participant 5 Icon', 'type' => 'text', 'value' => 'fa-solid fa-industry'],

    // Key Expected Outcomes
    ['group' => 'outcomes', 'key' => 'outcomes_title', 'label' => 'Outcomes Section Title', 'type' => 'text', 'value' => 'Key Expected Outcomes'],
    ['group' => 'outcomes', 'key' => 'outcomes_sub', 'label' => 'Outcomes Section Subtitle', 'type' => 'text', 'value' => 'Tangible impacts and key deliverables driving the Global One Health vision forward through innovation, policy, and education.'],

    ['group' => 'outcomes', 'key' => 'out_1_tag', 'label' => 'Outcome 1 Tag', 'type' => 'text', 'value' => 'Collaboration'],
    ['group' => 'outcomes', 'key' => 'out_1_title', 'label' => 'Outcome 1 Title', 'type' => 'text', 'value' => 'Strengthened interdisciplinary collaborations'],
    ['group' => 'outcomes', 'key' => 'out_1_icon', 'label' => 'Outcome 1 Icon', 'type' => 'text', 'value' => 'fa-solid fa-users-gear'],

    ['group' => 'outcomes', 'key' => 'out_2_tag', 'label' => 'Outcome 2 Tag', 'type' => 'text', 'value' => 'Global'],
    ['group' => 'outcomes', 'key' => 'out_2_title', 'label' => 'Outcome 2 Title', 'type' => 'text', 'value' => 'International research partnerships'],
    ['group' => 'outcomes', 'key' => 'out_2_icon', 'label' => 'Outcome 2 Icon', 'type' => 'text', 'value' => 'fa-solid fa-globe'],

    ['group' => 'outcomes', 'key' => 'out_3_tag', 'label' => 'Outcome 3 Tag', 'type' => 'text', 'value' => 'Research'],
    ['group' => 'outcomes', 'key' => 'out_3_title', 'label' => 'Outcome 3 Title', 'type' => 'text', 'value' => 'High-quality scientific publications'],
    ['group' => 'outcomes', 'key' => 'out_3_icon', 'label' => 'Outcome 3 Icon', 'type' => 'text', 'value' => 'fa-solid fa-book-bookmark'],

    ['group' => 'outcomes', 'key' => 'out_4_tag', 'label' => 'Outcome 4 Tag', 'type' => 'text', 'value' => 'Innovation'],
    ['group' => 'outcomes', 'key' => 'out_4_title', 'label' => 'Outcome 4 Title', 'type' => 'text', 'value' => 'Translation of research into innovation'],
    ['group' => 'outcomes', 'key' => 'out_4_icon', 'label' => 'Outcome 4 Icon', 'type' => 'text', 'value' => 'fa-solid fa-lightbulb'],

    ['group' => 'outcomes', 'key' => 'out_5_tag', 'label' => 'Outcome 5 Tag', 'type' => 'text', 'value' => 'Policy'],
    ['group' => 'outcomes', 'key' => 'out_5_title', 'label' => 'Outcome 5 Title', 'type' => 'text', 'value' => 'Policy recommendations for One Health'],
    ['group' => 'outcomes', 'key' => 'out_5_icon', 'label' => 'Outcome 5 Icon', 'type' => 'text', 'value' => 'fa-solid fa-landmark'],

    ['group' => 'outcomes', 'key' => 'out_6_tag', 'label' => 'Outcome 6 Tag', 'type' => 'text', 'value' => 'Education'],
    ['group' => 'outcomes', 'key' => 'out_6_title', 'label' => 'Outcome 6 Title', 'type' => 'text', 'value' => 'Capacity building for early-career researchers'],
    ['group' => 'outcomes', 'key' => 'out_6_icon', 'label' => 'Outcome 6 Icon', 'type' => 'text', 'value' => 'fa-solid fa-graduation-cap']
];

foreach ($defaults as $d) {
    SiteSetting::updateOrCreate(['key' => $d['key']], $d);
}

echo "All user friendly settings populated successfully.\n";
