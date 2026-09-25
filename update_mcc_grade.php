<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$setting = \App\Models\SiteSetting::where('key', 'about_mcc')->first();
if ($setting) {
    $setting->value = str_replace("'A' Grade", "'A+' Grade", $setting->value);
    $setting->save();
    echo "Updated about_mcc successfully.\n";
} else {
    echo "Setting not found.\n";
}
