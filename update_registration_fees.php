<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\RegistrationFee;

// Students
RegistrationFee::where('category_name', 'Student')->update([
    'price_inr' => '1000',
    'price_online' => '1500'
]);

// Scholars
RegistrationFee::where('category_name', 'Research Scholar')->update([
    'price_inr' => '1500',
    'price_online' => '2000'
]);

// Faculty
RegistrationFee::where('category_name', 'Faculty/Scientist')->update([
    'price_inr' => '2000',
    'price_online' => '3000'
]);

// Industry
RegistrationFee::where('category_name', 'Industrialists')->update([
    'price_inr' => '5000',
    'price_online' => '5000' // Setting same for online since not explicitly defined, but could be NULL
]);

echo "Updated registration fees successfully!\n";
