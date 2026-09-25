<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Speaker;

$speaker = Speaker::where('name', 'like', '%Priya Abraham%')->first();
if ($speaker) {
    $speaker->type = 'distinguished';
    $speaker->save();
    echo "Updated Dr. Priya Abraham to Distinguished Speaker (ID: " . $speaker->id . ")\n";
} else {
    echo "Speaker not found\n";
}
