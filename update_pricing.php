<?php
// Update registration fees: set offline (price_inr) and online prices from the fee table image

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;

$fees = [
    'Student'          => ['offline' => '750', 'online' => '1000', 'usd_offline' => '8', 'usd_online' => '10'],
    'Research Scholar' => ['offline' => '1200', 'online' => '1500', 'usd_offline' => '13', 'usd_online' => '16'],
    'Faculty'          => ['offline' => '2000', 'online' => '2500', 'usd_offline' => '21', 'usd_online' => '26'],
    'Faculty/Scientist'=> ['offline' => '2000', 'online' => '2500', 'usd_offline' => '21', 'usd_online' => '26'],
    'Industry'         => ['offline' => '5000', 'online' => '6000', 'usd_offline' => '52', 'usd_online' => '63'],
    'Industrialists'   => ['offline' => '5000', 'online' => '6000', 'usd_offline' => '52', 'usd_online' => '63'],
];

$rows = DB::table('registration_fees')->get();
foreach ($rows as $row) {
    foreach ($fees as $key => $prices) {
        if (stripos($row->category_name, $key) !== false || stripos($key, $row->category_name) !== false) {
            DB::table('registration_fees')->where('id', $row->id)->update([
                'price_inr'        => $prices['offline'],
                'price_online'     => $prices['online'],
                'price_usd'        => $prices['usd_offline'],
                'price_usd_online' => $prices['usd_online'],
            ]);
            echo "Updated: {$row->category_name} → Offline: ₹{$prices['offline']} (\${$prices['usd_offline']}), Online: ₹{$prices['online']} (\${$prices['usd_online']})\n";
            break;
        }
    }
}
echo "Done.\n";
