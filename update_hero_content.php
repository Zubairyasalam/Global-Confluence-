<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\SiteSetting;
use App\Models\HeroOrganizer;

// Update SiteSettings for hero
$settings = [
    'hero_title' => "GLOBAL ONE HEALTH\nCONFLUENCE 2026",
    'hero_subtitle' => "Bridging Microbes, Molecules & Mankind for Sustainability",
    'hero_dates' => "DECEMBER 21-22, 2026",
    'hero_location' => "Madras Christian College, Chennai",
    'hero_organized_by' => "DEPARTMENT OF MICROBIOLOGY (SFS), MCC & DEPARTMENT OF CHEMISTRY (SFS), MCC",
];

foreach ($settings as $key => $val) {
    SiteSetting::updateOrCreate(['key' => $key], ['value' => $val, 'group' => 'hero']);
}

// Update HeroOrganizers to match the 2 departments
HeroOrganizer::query()->delete();

HeroOrganizer::create([
    'name' => 'DEPARTMENT OF MICROBIOLOGY (SFS), MCC',
    'sort_order' => 0,
    'is_active' => true
]);

HeroOrganizer::create([
    'name' => 'DEPARTMENT OF CHEMISTRY (SFS), MCC',
    'sort_order' => 1,
    'is_active' => true
]);

echo "Hero database settings updated successfully!\n";
