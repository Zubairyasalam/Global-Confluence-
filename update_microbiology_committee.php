<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\CommitteeMember;

// Clear existing organizing committee to reseed cleanly
CommitteeMember::where('category', 'organizing_committee')->delete();

$microbiologyMembers = [
    [
        'category' => 'organizing_committee',
        'subcategory' => 'microbiology',
        'name' => 'Dr. V. Mahalakshmi',
        'designation' => 'Head & Associate Professor, Department of Microbiology',
        'sort_order' => 1
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => 'microbiology',
        'name' => 'Dr. S. Niren Andrew',
        'designation' => 'Associate Professor, Department of Microbiology',
        'sort_order' => 2
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => 'microbiology',
        'name' => 'Dr. K. Kavitha',
        'designation' => 'Associate Professor, Department of Microbiology',
        'sort_order' => 3
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => 'microbiology',
        'name' => 'Dr. S. Premina',
        'designation' => 'Assistant Professor, Department of Microbiology',
        'sort_order' => 4
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => 'microbiology',
        'name' => 'Dr. S. Abirami',
        'designation' => 'Assistant Professor, Department of Microbiology',
        'sort_order' => 5
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => 'microbiology',
        'name' => 'Dr. P. Hanumantha Rao',
        'designation' => 'Associate Professor, Department of Microbiology',
        'sort_order' => 6
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => 'microbiology',
        'name' => 'Dr. T. Sathish Kumar',
        'designation' => 'Associate Professor, Department of Microbiology',
        'sort_order' => 7
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => 'microbiology',
        'name' => 'Dr. V. Vedha',
        'designation' => 'Assistant Professor, Department of Microbiology',
        'sort_order' => 8
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => 'microbiology',
        'name' => 'Dr. K. Balakumar',
        'designation' => 'Assistant Professor, Department of Microbiology',
        'sort_order' => 9
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => 'microbiology',
        'name' => 'Dr. Neginah Vijayasingh J',
        'designation' => 'Assistant Professor, Department of Microbiology',
        'sort_order' => 10
    ],
    // OTHER ORGANIZING MEMBERS
    [
        'category' => 'organizing_committee',
        'subcategory' => 'other',
        'name' => 'Chemistry Faculty Members',
        'designation' => 'Department of Chemistry, MCC',
        'sort_order' => 11
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => 'other',
        'name' => 'Kalyani',
        'designation' => 'Organizing Member',
        'sort_order' => 12
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => 'other',
        'name' => 'Senthil Umapathy',
        'designation' => 'Organizing Member',
        'sort_order' => 13
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => 'other',
        'name' => 'Vijay Solomon',
        'designation' => 'Organizing Member',
        'sort_order' => 14
    ],
    [
        'category' => 'organizing_committee',
        'subcategory' => 'other',
        'name' => 'Anulin',
        'designation' => 'Organizing Member',
        'sort_order' => 15
    ],
];

foreach ($microbiologyMembers as $data) {
    CommitteeMember::create($data);
}

echo "Successfully reseeded Organizing Committee with 10 Microbiology members and other members.\n";
