<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$packages = \App\Models\SponsorPackage::all();
foreach($packages as $p) {
    if(is_string($p->features) && !empty($p->features)) {
        $p->features = json_decode($p->features, true);
        $p->save();
        echo "Fixed {$p->name}\n";
    }
}
echo "Done.\n";
