<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;

$fees = [
    'Student'          => ['offline' => '1000', 'online' => '1500'],
    'Research Scholar' => ['offline' => '1500', 'online' => '2000'],
    'Faculty'          => ['offline' => '2000', 'online' => '3000'],
    'Industrial'       => ['offline' => '5000', 'online' => null],
];

foreach (DB::table('registration_fees')->get() as $row) {
    foreach ($fees as $key => $prices) {
        if (stripos($row->category_name, $key) !== false || stripos($key, $row->category_name) !== false) {
            DB::table('registration_fees')->where('id', $row->id)->update([
                'price_inr'    => $prices['offline'],
                'price_online' => $prices['online'],
            ]);
            echo "Updated {$row->category_name}: Offline={$prices['offline']}, Online=" . ($prices['online'] ?? 'N/A') . "\n";
            break;
        }
    }
}
echo "Done.\n";
