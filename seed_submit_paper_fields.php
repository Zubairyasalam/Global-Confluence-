<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\SubmitPaperField;

$fields = [
    [
        'name' => 'title',
        'label' => 'Title',
        'type' => 'select',
        'placeholder' => 'Select Title',
        'is_required' => true,
        'options' => ['Mr.', 'Ms.', 'Dr.', 'Prof.'],
        'grid_column' => 'span 4',
        'sort_order' => 1
    ],
    [
        'name' => 'name',
        'label' => 'Name',
        'type' => 'text',
        'placeholder' => 'Name',
        'is_required' => true,
        'options' => null,
        'grid_column' => 'span 8',
        'sort_order' => 2
    ],
    [
        'name' => 'email',
        'label' => 'Email',
        'type' => 'email',
        'placeholder' => 'Email',
        'is_required' => true,
        'options' => null,
        'grid_column' => 'span 6',
        'sort_order' => 3
    ],
    [
        'name' => 'contact_number',
        'label' => 'Contact Number',
        'type' => 'text',
        'placeholder' => 'Contact Number',
        'is_required' => true,
        'options' => null,
        'grid_column' => 'span 6',
        'sort_order' => 4
    ],
    [
        'name' => 'organization',
        'label' => 'Organization/Institution',
        'type' => 'text',
        'placeholder' => 'Organization/Institution',
        'is_required' => true,
        'options' => null,
        'grid_column' => 'span 12',
        'sort_order' => 5
    ],
    [
        'name' => 'country',
        'label' => 'Country',
        'type' => 'select',
        'placeholder' => 'Select Country',
        'is_required' => true,
        'options' => ['United States', 'United Kingdom', 'Canada', 'Australia', 'India', 'China', 'Germany', 'France', 'Japan', 'Brazil'],
        'grid_column' => 'span 6',
        'sort_order' => 6
    ],
    [
        'name' => 'interested_in',
        'label' => 'Interested In',
        'type' => 'dynamic_select',
        'placeholder' => 'Interested In',
        'is_required' => true,
        'options' => ['Plenary', 'Keynote', 'Invited', 'Oral', 'Poster Presentations'],
        'grid_column' => 'span 6',
        'sort_order' => 7
    ],
    [
        'name' => 'track',
        'label' => 'Track',
        'type' => 'dynamic_select',
        'placeholder' => 'Select Track',
        'is_required' => true,
        'options' => ['Biomedical Engineering', 'Biomedical Signal Processing', 'Biomedical Imaging', 'AI and Robotics in Healthcare'],
        'grid_column' => 'span 12',
        'sort_order' => 8
    ]
];

foreach ($fields as $field) {
    SubmitPaperField::updateOrCreate(['name' => $field['name']], $field);
}

echo "Fields seeded successfully.\n";
