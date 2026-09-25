<?php
use Illuminate\Database\Eloquent\Model;
Model::unguard();

$settings = [
    ['key' => 'footer_website', 'value' => 'https://mcc.edu.in/', 'group' => 'footer', 'type' => 'text', 'label' => 'Website URL'],
    ['key' => 'footer_bio', 'value' => 'We bring together brilliant minds from around the world to create transformative platforms for knowledge exchange, collaboration, and innovation.', 'group' => 'footer', 'type' => 'textarea', 'label' => 'Footer Short Description'],
    ['key' => 'footer_copyright', 'value' => '©2026 GLOBAL ONE HEALTH CONFLUENCE Design and Developed by MCC-MRF Innovation Park', 'group' => 'footer', 'type' => 'text', 'label' => 'Copyright Text'],
    ['key' => 'footer_logo', 'value' => 'images/logo.png', 'group' => 'footer', 'type' => 'image', 'label' => 'Footer Logo Image'],
];

foreach ($settings as $setting) {
    \App\Models\SiteSetting::updateOrCreate(
        ['key' => $setting['key']],
        $setting
    );
}

echo "Footer settings inserted successfully.\n";
