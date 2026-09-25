<?php

use Illuminate\Database\Eloquent\Model;

Model::unguard();

$settings = [
    ['key' => 'deadlines_title', 'value' => 'Important <span>Deadlines</span>', 'group' => 'deadlines', 'type' => 'text', 'label' => 'Main Title (use <span> for highlight)'],
    ['key' => 'deadlines_subtitle', 'value' => 'Key Dates To Mark In Your Calendar', 'group' => 'deadlines', 'type' => 'text', 'label' => 'Subtitle'],
    
    ['key' => 'deadlines_stat1_num', 'value' => '3', 'group' => 'deadlines', 'type' => 'text', 'label' => 'Stat 1 Number'],
    ['key' => 'deadlines_stat1_label', 'value' => 'Key Dates', 'group' => 'deadlines', 'type' => 'text', 'label' => 'Stat 1 Label'],
    ['key' => 'deadlines_stat2_num', 'value' => '3', 'group' => 'deadlines', 'type' => 'text', 'label' => 'Stat 2 Number'],
    ['key' => 'deadlines_stat2_label', 'value' => 'Days Conference', 'group' => 'deadlines', 'type' => 'text', 'label' => 'Stat 2 Label'],
    ['key' => 'deadlines_stat3_num', 'value' => '2027', 'group' => 'deadlines', 'type' => 'text', 'label' => 'Stat 3 Number'],
    ['key' => 'deadlines_stat3_label', 'value' => 'Event Year', 'group' => 'deadlines', 'type' => 'text', 'label' => 'Stat 3 Label'],

    ['key' => 'deadlines_banner_text', 'value' => '"25% Off on Super Early Bird Special Discount – Valid April to September !"', 'group' => 'deadlines', 'type' => 'text', 'label' => 'Banner Text'],
    ['key' => 'deadlines_banner_sub', 'value' => 'Contact us now and we will make your event unique & unforgettable', 'group' => 'deadlines', 'type' => 'text', 'label' => 'Banner Subtitle'],
    ['key' => 'deadlines_banner_btn', 'value' => 'Register now', 'group' => 'deadlines', 'type' => 'text', 'label' => 'Banner Button Text'],
    ['key' => 'deadlines_banner_link', 'value' => '/registration', 'group' => 'deadlines', 'type' => 'text', 'label' => 'Banner Button Link'],
];

foreach ($settings as $setting) {
    \App\Models\SiteSetting::firstOrCreate(['key' => $setting['key']], $setting);
}
echo "Done\n";
