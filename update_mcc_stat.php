<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$setting = \App\Models\SiteSetting::where('key', 'mcc_stat2_title')->first();
if ($setting) {
    $setting->value = "'A+' Grade";
    $setting->save();
    echo "Updated mcc_stat2_title successfully.\n";
} else {
    echo "Setting not found.\n";
}
