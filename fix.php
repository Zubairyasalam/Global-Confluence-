<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$s = \App\Models\SiteSetting::where('key', 'reg_page_notice')->first();
if($s) {
    $s->value = '<strong>All fields are required.</strong> Payments (INR) are securely processed online. Confirmations are sent within 48 hours. For support: <a href="mailto:gohc2026@gmail.com" style="color: var(--teal-accent); font-weight: 600;">gohc2026@gmail.com</a>.';
    $s->save();
    echo "DB Updated\n";
} else {
    echo "Not found\n";
}
