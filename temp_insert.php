<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$fields = [
    ['key'=>'conf_stat_title','value'=>'Conference Starts In','type'=>'text','group'=>'conference','label'=>'Stats Box Title'],
    ['key'=>'conf_stat1_number','value'=>'89','type'=>'text','group'=>'conference','label'=>'Box 1 Number'],
    ['key'=>'conf_stat1_label','value'=>'DAYS','type'=>'text','group'=>'conference','label'=>'Box 1 Label'],
    ['key'=>'conf_stat2_number','value'=>'11','type'=>'text','group'=>'conference','label'=>'Box 2 Number'],
    ['key'=>'conf_stat2_label','value'=>'HOURS','type'=>'text','group'=>'conference','label'=>'Box 2 Label'],
    ['key'=>'conf_stat3_number','value'=>'52','type'=>'text','group'=>'conference','label'=>'Box 3 Number'],
    ['key'=>'conf_stat3_label','value'=>'MINS','type'=>'text','group'=>'conference','label'=>'Box 3 Label'],
    ['key'=>'conf_stat4_number','value'=>'31','type'=>'text','group'=>'conference','label'=>'Box 4 Number'],
    ['key'=>'conf_stat4_label','value'=>'SECS','type'=>'text','group'=>'conference','label'=>'Box 4 Label']
];
\App\Models\SiteSetting::insert($fields);
echo "Done";
