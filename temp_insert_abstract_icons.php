<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$fields = [
    ['key'=>'abstract_req1_icon','value'=>'fa-solid fa-font','type'=>'text','group'=>'abstract','label'=>'Req 1 Icon (FontAwesome Class)'],
    ['key'=>'abstract_req2_icon','value'=>'fa-solid fa-align-left','type'=>'text','group'=>'abstract','label'=>'Req 2 Icon (FontAwesome Class)'],
    ['key'=>'abstract_req3_icon','value'=>'fa-solid fa-file-word','type'=>'text','group'=>'abstract','label'=>'Req 3 Icon (FontAwesome Class)'],
    ['key'=>'abstract_req4_icon','value'=>'fa-solid fa-tags','type'=>'text','group'=>'abstract','label'=>'Req 4 Icon (FontAwesome Class)'],
    ['key'=>'awards_oral_icon','value'=>'fa-solid fa-trophy','type'=>'text','group'=>'awards','label'=>'Oral Award Icon (FontAwesome Class)'],
    ['key'=>'awards_poster_icon','value'=>'fa-solid fa-medal','type'=>'text','group'=>'awards','label'=>'Poster Award Icon (FontAwesome Class)']
];
foreach ($fields as $field) {
    \App\Models\SiteSetting::updateOrCreate(['key' => $field['key']], $field);
}
echo "Done";
