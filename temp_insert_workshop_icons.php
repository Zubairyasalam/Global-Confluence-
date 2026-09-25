<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$fields = [
    ['key'=>'workshop_f1_icon','value'=>'fa-solid fa-laptop-medical','type'=>'text','group'=>'workshop','label'=>'Feature 1 Icon (FontAwesome Class)'],
    ['key'=>'workshop_f2_icon','value'=>'fa-solid fa-database','type'=>'text','group'=>'workshop','label'=>'Feature 2 Icon (FontAwesome Class)'],
    ['key'=>'workshop_f3_icon','value'=>'fa-solid fa-toolbox','type'=>'text','group'=>'workshop','label'=>'Feature 3 Icon (FontAwesome Class)']
];
\App\Models\SiteSetting::insert($fields);
echo "Done";
