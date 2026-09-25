<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$murthy = \App\Models\Speaker::where('type', 'distinguished')->where('name', 'Dr. G. S. Murthy')->first();
if($murthy) { $murthy->sort_order = 3; $murthy->save(); }

$ravi = \App\Models\Speaker::where('type', 'distinguished')->where('name', 'G. Ravikanth')->first();
if($ravi) { $ravi->sort_order = 4; $ravi->save(); }

echo "Updated distinguished speakers order.\n";
