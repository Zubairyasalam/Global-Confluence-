<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\SiteSetting;

$settings = [
    // Abstract Submission
    ['key' => 'abstract_tag', 'value' => 'PRIMARY GUIDELINES', 'group' => 'guidelines'],
    ['key' => 'abstract_title', 'value' => 'Abstract Submission', 'group' => 'guidelines'],
    ['key' => 'abstract_item_1', 'value' => 'Abstracts should be original and highly relevant to the conference themes.', 'group' => 'guidelines'],
    ['key' => 'abstract_item_2', 'value' => 'Word Limit: Strictly 250–300 words', 'group' => 'guidelines'],
    ['key' => 'abstract_item_3', 'value' => 'Format Structure: Title, Authors, Affiliation, Background, Objectives, Methods, Results, Conclusion, Keywords', 'group' => 'guidelines'],
    ['key' => 'abstract_item_4', 'value' => 'File Type: Submit exclusively in MS Word format (.doc or .docx)', 'group' => 'guidelines'],
    ['key' => 'abstract_item_5', 'value' => 'Registration: Presenting author must register for the conference.', 'group' => 'guidelines'],
    ['key' => 'abstract_item_6', 'value' => 'Review Process: All abstracts will undergo a rigorous peer review.', 'group' => 'guidelines'],

    // Oral Presentation
    ['key' => 'oral_title', 'value' => 'Oral Presentation', 'group' => 'guidelines'],
    ['key' => 'oral_item_1', 'value' => 'Format: PowerPoint Presentation (PPT) format only', 'group' => 'guidelines'],
    ['key' => 'oral_item_2', 'value' => 'Total Time: 7 Minutes maximum', 'group' => 'guidelines'],
    ['key' => 'oral_item_3', 'value' => 'Presentation Window: 5 Minutes', 'group' => 'guidelines'],
    ['key' => 'oral_item_4', 'value' => 'Q & A Session: 2 Minutes allocated for audience questions', 'group' => 'guidelines'],

    // Poster Presentation
    ['key' => 'poster_title', 'value' => 'Poster Presentation', 'group' => 'guidelines'],
    ['key' => 'poster_item_1', 'value' => 'Language: Posters should be presented in English.', 'group' => 'guidelines'],
    ['key' => 'poster_item_2', 'value' => 'Design: Content must be clear, concise and visually appealing.', 'group' => 'guidelines'],
    ['key' => 'poster_item_3', 'value' => 'Required Elements: Title, Authors, Affiliation, Introduction, Methods, Results, Conclusion.', 'group' => 'guidelines'],
    ['key' => 'poster_item_4', 'value' => 'Attendance: Presenters must be present during the poster session.', 'group' => 'guidelines'],
    ['key' => 'poster_dim_label', 'value' => 'POSTER DIMENSIONS', 'group' => 'guidelines'],
    ['key' => 'poster_dim_val', 'value' => '90 cm (Width) × 120 cm (Height)', 'group' => 'guidelines'],

    // Scientific Publications
    ['key' => 'pub_title', 'value' => 'Scientific Publications', 'group' => 'guidelines'],
    ['key' => 'pub_desc', 'value' => 'Selected peer-reviewed manuscripts will be considered for publication in our partnering international journals and indexed proceedings, offering global visibility for your research.', 'group' => 'guidelines'],
    ['key' => 'pub_1_title', 'value' => 'Scopus-Indexed Journals', 'group' => 'guidelines'],
    ['key' => 'pub_1_desc', 'value' => 'Manuscripts meeting high academic standards will be recommended for fast-track publication in recognized Scopus-indexed journals.', 'group' => 'guidelines'],
    ['key' => 'pub_2_title', 'value' => 'ISBN Proceedings', 'group' => 'guidelines'],
    ['key' => 'pub_2_desc', 'value' => 'Accepted abstracts and short papers will be compiled and published in official edited conference proceedings with a registered ISBN.', 'group' => 'guidelines'],
    ['key' => 'pub_3_title', 'value' => 'Special Issues', 'group' => 'guidelines'],
    ['key' => 'pub_3_desc', 'value' => 'Exceptional papers may be selected for special thematic issues with partnering international journals, subject to standard peer-review.', 'group' => 'guidelines'],
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

echo "Guidelines settings seeded successfully.\n";
