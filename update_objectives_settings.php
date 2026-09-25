<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\SiteSetting;

$defaults = [
    ['group' => 'objectives', 'key' => 'objectives_section_title', 'label' => 'Section Title', 'type' => 'text', 'value' => 'Conference Objectives'],
    
    ['group' => 'objectives', 'key' => 'obj_1_title', 'label' => 'Objective 1 Title', 'type' => 'text', 'value' => 'Interdisciplinary Collaboration'],
    ['group' => 'objectives', 'key' => 'obj_1_desc', 'label' => 'Objective 1 Description', 'type' => 'textarea', 'value' => 'Promote interdisciplinary collaboration across microbiology, chemistry and allied disciplines through the One Health framework.'],
    ['group' => 'objectives', 'key' => 'obj_1_icon', 'label' => 'Objective 1 Icon', 'type' => 'text', 'value' => 'fa-solid fa-sitemap'],

    ['group' => 'objectives', 'key' => 'obj_2_title', 'label' => 'Objective 2 Title', 'type' => 'text', 'value' => 'Global Health Challenges'],
    ['group' => 'objectives', 'key' => 'obj_2_desc', 'label' => 'Objective 2 Description', 'type' => 'textarea', 'value' => 'Address emerging global health challenges through innovative, evidence-based scientific solutions.'],
    ['group' => 'objectives', 'key' => 'obj_2_icon', 'label' => 'Objective 2 Icon', 'type' => 'text', 'value' => 'fa-solid fa-globe'],

    ['group' => 'objectives', 'key' => 'obj_3_title', 'label' => 'Objective 3 Title', 'type' => 'text', 'value' => 'Translational Research'],
    ['group' => 'objectives', 'key' => 'obj_3_desc', 'label' => 'Objective 3 Description', 'type' => 'textarea', 'value' => 'Foster translational research and innovation for human health, animal health and environmental sustainability.'],
    ['group' => 'objectives', 'key' => 'obj_3_icon', 'label' => 'Objective 3 Icon', 'type' => 'text', 'value' => 'fa-solid fa-leaf'],

    ['group' => 'objectives', 'key' => 'obj_4_title', 'label' => 'Objective 4 Title', 'type' => 'text', 'value' => 'Global Partnerships'],
    ['group' => 'objectives', 'key' => 'obj_4_desc', 'label' => 'Objective 4 Description', 'type' => 'textarea', 'value' => 'Build national and international partnerships among academia, research institutions, healthcare, industry and policymakers.'],
    ['group' => 'objectives', 'key' => 'obj_4_icon', 'label' => 'Objective 4 Icon', 'type' => 'text', 'value' => 'fa-solid fa-handshake'],

    ['group' => 'objectives', 'key' => 'obj_5_title', 'label' => 'Objective 5 Title', 'type' => 'text', 'value' => 'Knowledge Exchange'],
    ['group' => 'objectives', 'key' => 'obj_5_desc', 'label' => 'Objective 5 Description', 'type' => 'textarea', 'value' => 'Provide a platform for knowledge exchange and networking, empowering researchers, students and innovators to showcase impactful research.'],
    ['group' => 'objectives', 'key' => 'obj_5_icon', 'label' => 'Objective 5 Icon', 'type' => 'text', 'value' => 'fa-solid fa-lightbulb']
];

foreach ($defaults as $d) {
    SiteSetting::updateOrCreate(['key' => $d['key']], $d);
}

echo "Objectives settings populated successfully.\n";
