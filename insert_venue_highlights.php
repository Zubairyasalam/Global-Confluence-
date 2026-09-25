<?php
use Illuminate\Database\Eloquent\Model;
Model::unguard();

$settings = [
    ['key' => 'venue_high_title', 'value' => 'Venue & <span>Highlights</span>', 'type' => 'text', 'label' => 'Main Title (use <span> for highlight)'],
    ['key' => 'venue_high_img1', 'value' => 'images/mcc_main.jpg', 'type' => 'image', 'label' => 'Tall Image (Left)'],
    ['key' => 'venue_high_img2', 'value' => 'images/mcc4.jpg', 'type' => 'image', 'label' => 'Top Stacked Image (Middle)'],
    ['key' => 'venue_high_img3', 'value' => 'images/mcc_images.jpg', 'type' => 'image', 'label' => 'Bottom Stacked Image (Middle)'],
    ['key' => 'venue_high_map', 'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.756314815256!2d80.12157431482143!3d12.92336669088665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a525f1719b49b39%3A0xcb1b5907406a0a03!2sMadras%20Christian%20College!5e0!3m2!1sen!2sin!4v1717409254320!5m2!1sen!2sin', 'type' => 'text', 'label' => 'Google Maps Embed URL (src attribute only)'],
];

foreach ($settings as $setting) {
    \App\Models\SiteSetting::firstOrCreate(
        ['key' => $setting['key']],
        ['value' => $setting['value'], 'group' => 'venue_highlights', 'type' => $setting['type'], 'label' => $setting['label']]
    );
}

echo "Venue Highlights settings added.\n";
