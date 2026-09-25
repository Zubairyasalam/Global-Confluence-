<?php

use Illuminate\Database\Eloquent\Model;
use App\Models\SiteSetting;

Model::unguard();

$settings = [
    ['key' => 'obj_1_title', 'value' => 'Promote Interdisciplinary Collaboration', 'group' => 'objectives', 'type' => 'text', 'label' => 'Objective 1 Title'],
    ['key' => 'obj_1_desc', 'value' => 'Promote interdisciplinary collaboration across microbiology, chemistry and allied disciplines through the One Health framework.', 'group' => 'objectives', 'type' => 'textarea', 'label' => 'Objective 1 Description'],
    
    ['key' => 'obj_2_title', 'value' => 'Address Emerging Challenges', 'group' => 'objectives', 'type' => 'text', 'label' => 'Objective 2 Title'],
    ['key' => 'obj_2_desc', 'value' => 'Address emerging global health challenges through innovative, evidence-based scientific solutions.', 'group' => 'objectives', 'type' => 'textarea', 'label' => 'Objective 2 Description'],
    
    ['key' => 'obj_3_title', 'value' => 'Foster Translational Research', 'group' => 'objectives', 'type' => 'text', 'label' => 'Objective 3 Title'],
    ['key' => 'obj_3_desc', 'value' => 'Foster translational research and innovation for human health, animal health and environmental sustainability.', 'group' => 'objectives', 'type' => 'textarea', 'label' => 'Objective 3 Description'],
    
    ['key' => 'obj_4_title', 'value' => 'Build Global Partnerships', 'group' => 'objectives', 'type' => 'text', 'label' => 'Objective 4 Title'],
    ['key' => 'obj_4_desc', 'value' => 'Build national and international partnerships among academia, research institutions, healthcare, industry and policymakers.', 'group' => 'objectives', 'type' => 'textarea', 'label' => 'Objective 4 Description'],

    ['key' => 'obj_5_title', 'value' => 'Knowledge Exchange Platform', 'group' => 'objectives', 'type' => 'text', 'label' => 'Objective 5 Title'],
    ['key' => 'obj_5_desc', 'value' => 'Provide a platform for knowledge exchange and networking, empowering researchers, students and innovators to showcase impactful research.', 'group' => 'objectives', 'type' => 'textarea', 'label' => 'Objective 5 Description']
];

foreach ($settings as $setting) {
    SiteSetting::updateOrCreate(
        ['key' => $setting['key']],
        $setting
    );
}

echo "Objectives updated successfully.\n";
