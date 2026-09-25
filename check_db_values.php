<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$fees = App\Models\RegistrationFee::all();
foreach($fees as $f) {
    echo $f->category_name . ' offline:' . $f->price_inr . ' online:' . $f->price_online . "\n";
}
