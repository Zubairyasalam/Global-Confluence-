<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Policy;
use Illuminate\Support\Facades\DB;

$cancellationHtml = '<ul style="padding-left: 20px; margin-top: 0; margin-bottom: 0; color: #475569; line-height: 1.7;">
    <li style="margin-bottom: 10px;">Cancellations made &ge;120 days prior to the event start date will receive a full refund, less a $150 administrative fee for processing and banking charges.</li>
    <li style="margin-bottom: 10px;">Cancellations made between 119 to 90 days prior to the event start date are eligible for a 50% refund of the registration fee.</li>
    <li style="margin-bottom: 10px;">Cancellations requested within 89 days or fewer from the event start date are non-refundable, including registration and accommodation-related charges.</li>
</ul>';

// Check policies table
$policy = DB::table('policies')->where('title', 'LIKE', '%CANCELLATION%')->first();

if ($policy) {
    DB::table('policies')->where('id', $policy->id)->update([
        'title' => 'REGISTRATION CANCELLATION POLICY',
        'content_html' => $cancellationHtml
    ]);
    echo "Updated policy ID {$policy->id}\n";
} else {
    DB::table('policies')->insert([
        'title' => 'REGISTRATION CANCELLATION POLICY',
        'content_html' => $cancellationHtml,
        'sort_order' => 2,
        'created_at' => now(),
        'updated_at' => now()
    ]);
    echo "Inserted new cancellation policy\n";
}

echo "Done.\n";
