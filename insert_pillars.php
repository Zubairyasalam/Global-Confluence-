<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$settings = [
    ['key' => 'pillars_title', 'value' => 'Five Pillars of the Confluence', 'group' => 'pillars', 'type' => 'text', 'label' => 'Section Title'],
    ['key' => 'pillars_subtitle', 'value' => 'Interdisciplinary framework driving sustainable global health through science, policy & partnership', 'group' => 'pillars', 'type' => 'textarea', 'label' => 'Section Subtitle'],
    
    // Pillar 1
    ['key' => 'pillar_1_tag', 'value' => 'Research', 'group' => 'pillars', 'type' => 'text', 'label' => 'Pillar 1 Tag'],
    ['key' => 'pillar_1_title', 'value' => 'Scientific Excellence', 'group' => 'pillars', 'type' => 'text', 'label' => 'Pillar 1 Title'],
    ['key' => 'pillar_1_desc', 'value' => 'Facilitating high-quality interdisciplinary scientific discourse spanning microbiology, chemistry, biotechnology, environmental sciences, public health, and molecular medicine.', 'group' => 'pillars', 'type' => 'textarea', 'label' => 'Pillar 1 Description'],
    ['key' => 'pillar_1_icon', 'value' => 'fa-solid fa-microscope', 'group' => 'pillars', 'type' => 'text', 'label' => 'Pillar 1 Icon (FontAwesome class)'],
    
    // Pillar 2
    ['key' => 'pillar_2_tag', 'value' => 'Innovation', 'group' => 'pillars', 'type' => 'text', 'label' => 'Pillar 2 Tag'],
    ['key' => 'pillar_2_title', 'value' => 'Translational Innovation', 'group' => 'pillars', 'type' => 'text', 'label' => 'Pillar 2 Title'],
    ['key' => 'pillar_2_desc', 'value' => 'Promoting research translation through biotechnology, diagnostics, biosensors, sustainable chemistry, advanced materials, green technologies, and circular bioeconomy.', 'group' => 'pillars', 'type' => 'textarea', 'label' => 'Pillar 2 Description'],
    ['key' => 'pillar_2_icon', 'value' => 'fa-solid fa-flask-vial', 'group' => 'pillars', 'type' => 'text', 'label' => 'Pillar 2 Icon'],

    // Pillar 3
    ['key' => 'pillar_3_tag', 'value' => 'Policy', 'group' => 'pillars', 'type' => 'text', 'label' => 'Pillar 3 Tag'],
    ['key' => 'pillar_3_title', 'value' => 'Policy & Governance', 'group' => 'pillars', 'type' => 'text', 'label' => 'Pillar 3 Title'],
    ['key' => 'pillar_3_desc', 'value' => 'Strengthening dialogue among researchers, policymakers, governmental agencies, and international organizations for evidence-informed health governance.', 'group' => 'pillars', 'type' => 'textarea', 'label' => 'Pillar 3 Description'],
    ['key' => 'pillar_3_icon', 'value' => 'fa-solid fa-scale-balanced', 'group' => 'pillars', 'type' => 'text', 'label' => 'Pillar 3 Icon'],

    // Pillar 4
    ['key' => 'pillar_4_tag', 'value' => 'Heritage', 'group' => 'pillars', 'type' => 'text', 'label' => 'Pillar 4 Tag'],
    ['key' => 'pillar_4_title', 'value' => 'Indigenous Integration', 'group' => 'pillars', 'type' => 'text', 'label' => 'Pillar 4 Title'],
    ['key' => 'pillar_4_desc', 'value' => 'Exploring the role of Indian Knowledge Systems and traditional healthcare practices in complementing modern One Health approaches.', 'group' => 'pillars', 'type' => 'textarea', 'label' => 'Pillar 4 Description'],
    ['key' => 'pillar_4_icon', 'value' => 'fa-solid fa-leaf', 'group' => 'pillars', 'type' => 'text', 'label' => 'Pillar 4 Icon'],

    // Pillar 5
    ['key' => 'pillar_5_tag', 'value' => 'Network', 'group' => 'pillars', 'type' => 'text', 'label' => 'Pillar 5 Tag'],
    ['key' => 'pillar_5_title', 'value' => 'Global Partnerships', 'group' => 'pillars', 'type' => 'text', 'label' => 'Pillar 5 Title'],
    ['key' => 'pillar_5_desc', 'value' => 'Building long-term collaborative networks among academia, healthcare, industry, research institutions, and international organizations.', 'group' => 'pillars', 'type' => 'textarea', 'label' => 'Pillar 5 Description'],
    ['key' => 'pillar_5_icon', 'value' => 'fa-solid fa-earth-americas', 'group' => 'pillars', 'type' => 'text', 'label' => 'Pillar 5 Icon'],
];

foreach ($settings as $setting) {
    \App\Models\SiteSetting::firstOrCreate(['key' => $setting['key']], $setting);
}

echo "Pillars settings inserted.\n";
