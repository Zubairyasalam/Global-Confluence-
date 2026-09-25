<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\CommitteeMember;

// Clear organizing_committee to reseed cleanly for grid display
CommitteeMember::where('category', 'organizing_committee')->delete();

$organizingMembers = [
    [
        'category' => 'organizing_committee',
        'subcategory' => null,
        'name' => 'Microbiology & Chemistry Faculties',
        'designation' => 'Faculty Members, MCC',
        'sort_order' => 1
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => null,
        'name' => 'Dr. S. Niren Andrew',
        'designation' => 'Assistant Professor, Dept. of Microbiology',
        'sort_order' => 2
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => null,
        'name' => 'Dr. S. Premina',
        'designation' => 'Assistant Professor',
        'sort_order' => 3
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => null,
        'name' => 'Dr. S. Abirami',
        'designation' => 'Assistant Professor',
        'sort_order' => 4
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => null,
        'name' => 'Dr. P. Hanumantha Rao',
        'designation' => 'Associate Professor',
        'sort_order' => 5
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => null,
        'name' => 'Dr. T. Sathish Kumar',
        'designation' => 'Associate Professor',
        'sort_order' => 6
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => null,
        'name' => 'Dr. V. Vedha',
        'designation' => 'Assistant Professor',
        'sort_order' => 7
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => null,
        'name' => 'Dr. K. Balakumar',
        'designation' => 'Assistant Professor',
        'sort_order' => 8
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => null,
        'name' => 'Dr. Neginah Vijayasingh J',
        'designation' => 'Assistant Professor',
        'sort_order' => 9
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => null,
        'name' => 'Kalyani',
        'designation' => 'Organizing Member',
        'sort_order' => 10
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => null,
        'name' => 'Senthil Umapathy',
        'designation' => 'Organizing Member',
        'sort_order' => 11
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => null,
        'name' => 'Vijay Solomon',
        'designation' => 'Organizing Member',
        'sort_order' => 12
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => null,
        'name' => 'Anulin',
        'designation' => 'Organizing Member',
        'sort_order' => 13
    ],
];

foreach ($organizingMembers as $data) {
    CommitteeMember::create($data);
}

echo "Successfully reseeded Organizing Committee grid members including Dr. Neginah Vijayasingh J.\n";
