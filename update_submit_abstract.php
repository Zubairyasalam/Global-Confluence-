<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// 1. Update hero buttons
$btn1Text = \App\Models\SiteSetting::where('key', 'hero_btn1_text')->first();
$btn1Link = \App\Models\SiteSetting::where('key', 'hero_btn1_link')->first();
$btn2Text = \App\Models\SiteSetting::where('key', 'hero_btn2_text')->first();
$btn2Link = \App\Models\SiteSetting::where('key', 'hero_btn2_link')->first();

if ($btn1Text && $btn1Link && $btn2Text && $btn2Link) {
    $btn1Text->value = 'REGISTER NOW';
    $btn1Link->value = '/registration';
    $btn2Text->value = ''; // Empty so it hides
    $btn2Link->value = '';
    
    $btn1Text->save();
    $btn1Link->save();
    $btn2Text->save();
    $btn2Link->save();
}

// 2. Add "Submit Abstract" to interest_options
\App\Models\InterestOption::firstOrCreate([
    'name' => 'Submit Abstract'
], [
    'sort_order' => 10
]);

echo "Done\n";
