<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\SiteSetting;

$defaults = [
    ['group' => 'journey', 'key' => 'journey_title', 'label' => 'Journey Section Title', 'type' => 'text', 'value' => 'Our Journey to Impact'],
    ['group' => 'journey', 'key' => 'journey_sub', 'label' => 'Journey Section Subtitle', 'type' => 'text', 'value' => 'A strategic 4-step pathway driving global collaboration into sustainable transformation.'],

    ['group' => 'journey', 'key' => 'journey_1_title', 'label' => 'Step 1 Title', 'type' => 'text', 'value' => 'CONNECT'],
    ['group' => 'journey', 'key' => 'journey_1_desc', 'label' => 'Step 1 Description', 'type' => 'textarea', 'value' => 'Bringing global minds together for meaningful collaboration.'],

    ['group' => 'journey', 'key' => 'journey_2_title', 'label' => 'Step 2 Title', 'type' => 'text', 'value' => 'SHARE'],
    ['group' => 'journey', 'key' => 'journey_2_desc', 'label' => 'Step 2 Description', 'type' => 'textarea', 'value' => 'Sharing knowledge, innovations and best practices.'],

    ['group' => 'journey', 'key' => 'journey_3_title', 'label' => 'Step 3 Title', 'type' => 'text', 'value' => 'INNOVATE'],
    ['group' => 'journey', 'key' => 'journey_3_desc', 'label' => 'Step 3 Description', 'type' => 'textarea', 'value' => 'Creating solutions for a healthier planet and resilient communities.'],

    ['group' => 'journey', 'key' => 'journey_4_title', 'label' => 'Step 4 Title', 'type' => 'text', 'value' => 'IMPACT'],
    ['group' => 'journey', 'key' => 'journey_4_desc', 'label' => 'Step 4 Description', 'type' => 'textarea', 'value' => 'Driving sustainable change for generations to come.']
];

foreach ($defaults as $d) {
    SiteSetting::updateOrCreate(['key' => $d['key']], $d);
}

echo "Journey settings populated successfully.\n";
