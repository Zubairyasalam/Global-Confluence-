<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

\App\Models\SiteSetting::where('key', 'contact_email')->update(['value' => 'gohc2026@gmail.com']);
echo "Email updated successfully.\n";
