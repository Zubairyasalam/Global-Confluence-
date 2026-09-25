<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\SiteSetting;

$settings = [
    // Header
    ['key' => 'reg_section_title', 'value' => 'Registration Plans', 'group' => 'registration'],
    ['key' => 'reg_section_sub', 'value' => 'Choose the appropriate registration tier to access the conference. Super early-bird rates are currently active.', 'group' => 'registration'],

    // Process Box
    ['key' => 'reg_proc_title', 'value' => 'Registration Process of GOHC - 2026', 'group' => 'registration'],
    ['key' => 'reg_proc_sub', 'value' => 'Participation in GOHC 2026 is open only to registered delegates..', 'group' => 'registration'],
    ['key' => 'reg_proc_heading', 'value' => 'Steps for Conference Registration', 'group' => 'registration'],

    // Steps
    ['key' => 'reg_step_1', 'value' => 'Prepare your abstract using the official template available on the conference website or by scanning the provided QR code.', 'group' => 'registration'],
    ['key' => 'reg_step_2', 'value' => 'Pay the applicable registration fee using the provided payment link.', 'group' => 'registration'],
    ['key' => 'reg_step_3', 'value' => 'Download and save the payment receipt in PDF or JPG format, as it is required for registration.', 'group' => 'registration'],
    ['key' => 'reg_step_4', 'value' => 'Complete the online registration form using the provided registration link.', 'group' => 'registration'],
    ['key' => 'reg_step_5', 'value' => 'Submit the registration form along with your abstract to complete the registration process.', 'group' => 'registration'],
];

foreach ($settings as $setting) {
    SiteSetting::updateOrCreate(
        ['key' => $setting['key']],
        [
            'value' => $setting['value'],
            'group' => $setting['group']
        ]
    );
}

echo "Registration process settings seeded successfully.\n";
