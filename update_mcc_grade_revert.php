<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$setting = \App\Models\SiteSetting::where('key', 'about_mcc')->first();
if ($setting) {
    $setting->value = str_replace("'A+' Grade", "'A' Grade", $setting->value);
    $setting->save();
}

$setting2 = \App\Models\SiteSetting::where('key', 'mcc_stat2_title')->first();
if ($setting2) {
    $setting2->value = "'A' Grade";
    $setting2->save();
}
echo "Reverted to A Grade successfully.\n";
