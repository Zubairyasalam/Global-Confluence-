<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

// Delete old co_convenors
DB::table('committee_members')->where('category', 'leadership')->where('subcategory', 'co_convenors')->delete();

$co_convenors = [
    [
        'name' => 'Dr. R. Belinda',
        'designation' => 'Associate Professor, Dept. of Social Work',
        'category' => 'leadership',
        'subcategory' => 'co_convenors',
        'sort_order' => 6,
        'is_active' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Dr. Beutilyn Malgija',
        'designation' => 'Assistant Professor, Bioinformatician, MMIP',
        'category' => 'leadership',
        'subcategory' => 'co_convenors',
        'sort_order' => 7,
        'is_active' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Dr. Joyce Sudandara Priya',
        'designation' => 'Head of the Department, Botany',
        'category' => 'leadership',
        'subcategory' => 'co_convenors',
        'sort_order' => 8,
        'is_active' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Dr. Ananthi Rachel Livingstone',
        'designation' => 'Head of the Department, Zoology',
        'category' => 'leadership',
        'subcategory' => 'co_convenors',
        'sort_order' => 9,
        'is_active' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Dr. Janice Shiji',
        'designation' => 'Head of the Department, Social-work',
        'category' => 'leadership',
        'subcategory' => 'co_convenors',
        'sort_order' => 10,
        'is_active' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Dr. E. Iyyappan',
        'designation' => 'Head of the Department, Chemistry',
        'category' => 'leadership',
        'subcategory' => 'co_convenors',
        'sort_order' => 11,
        'is_active' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Dr. T. Premalatha',
        'designation' => 'Medical Officer, MCC',
        'category' => 'leadership',
        'subcategory' => 'co_convenors',
        'sort_order' => 12,
        'is_active' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Dr. Tabitha Durai',
        'designation' => 'Dean R&D, MCC',
        'category' => 'leadership',
        'subcategory' => 'co_convenors',
        'sort_order' => 13,
        'is_active' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Dr. S. Samuel Rufus',
        'designation' => 'Dean International Programmes, MCC',
        'category' => 'leadership',
        'subcategory' => 'co_convenors',
        'sort_order' => 14,
        'is_active' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ]
];

DB::table('committee_members')->insert($co_convenors);
echo "Updated Co-Convenors successfully.\n";
