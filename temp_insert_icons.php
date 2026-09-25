<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$fields = [
    ['key'=>'participant_1_icon','value'=>'fa-solid fa-user-graduate','type'=>'text','group'=>'participants','label'=>'Participant 1 Icon (FontAwesome Class)'],
    ['key'=>'participant_2_icon','value'=>'fa-solid fa-microscope','type'=>'text','group'=>'participants','label'=>'Participant 2 Icon (FontAwesome Class)'],
    ['key'=>'participant_3_icon','value'=>'fa-solid fa-chalkboard-user','type'=>'text','group'=>'participants','label'=>'Participant 3 Icon (FontAwesome Class)'],
    ['key'=>'participant_4_icon','value'=>'fa-solid fa-book-open-reader','type'=>'text','group'=>'participants','label'=>'Participant 4 Icon (FontAwesome Class)'],
    ['key'=>'participant_5_icon','value'=>'fa-solid fa-industry','type'=>'text','group'=>'participants','label'=>'Participant 5 Icon (FontAwesome Class)']
];
\App\Models\SiteSetting::insert($fields);
echo "Done";
