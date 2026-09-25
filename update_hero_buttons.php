<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$btn1Text = \App\Models\SiteSetting::where('key', 'hero_btn1_text')->first();
$btn1Link = \App\Models\SiteSetting::where('key', 'hero_btn1_link')->first();
$btn2Text = \App\Models\SiteSetting::where('key', 'hero_btn2_text')->first();
$btn2Link = \App\Models\SiteSetting::where('key', 'hero_btn2_link')->first();

if ($btn1Text && $btn1Link && $btn2Text && $btn2Link) {
    $btn1Text->value = 'SUBMIT ABSTRACT';
    $btn1Link->value = '/submit-paper';
    $btn2Text->value = 'REGISTER NOW';
    $btn2Link->value = '/registration';
    
    $btn1Text->save();
    $btn1Link->save();
    $btn2Text->save();
    $btn2Link->save();
    echo "Swapped buttons in DB successfully.\n";
} else {
    echo "Settings not found in DB. Creating them...\n";
    \App\Models\SiteSetting::create(['key' => 'hero_btn1_text', 'value' => 'SUBMIT ABSTRACT', 'group' => 'hero', 'type' => 'text', 'label' => 'Primary Button Text']);
    \App\Models\SiteSetting::create(['key' => 'hero_btn1_link', 'value' => '/submit-paper', 'group' => 'hero', 'type' => 'text', 'label' => 'Primary Button Link']);
    \App\Models\SiteSetting::create(['key' => 'hero_btn2_text', 'value' => 'REGISTER NOW', 'group' => 'hero', 'type' => 'text', 'label' => 'Secondary Button Text']);
    \App\Models\SiteSetting::create(['key' => 'hero_btn2_link', 'value' => '/registration', 'group' => 'hero', 'type' => 'text', 'label' => 'Secondary Button Link']);
}
