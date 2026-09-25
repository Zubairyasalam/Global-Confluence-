<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$settings = [
    ['key' => 'objectives_desc', 'value' => 'The Global One Health Confluence 2026 brings together leaders in science, policy, and practice to address our most pressing health challenges through a unified interdisciplinary approach.', 'group' => 'objectives', 'type' => 'textarea', 'label' => 'Section Description'],
    ['key' => 'obj_1_title', 'value' => 'Promote Interdisciplinary Collaboration', 'group' => 'objectives', 'type' => 'text', 'label' => 'Objective 1 Title'],
    ['key' => 'obj_1_desc', 'value' => 'To promote interdisciplinary collaboration across microbiology, health and sustainability.', 'group' => 'objectives', 'type' => 'textarea', 'label' => 'Objective 1 Description'],
    ['key' => 'obj_2_title', 'value' => 'Discuss Emerging Challenges', 'group' => 'objectives', 'type' => 'text', 'label' => 'Objective 2 Title'],
    ['key' => 'obj_2_desc', 'value' => 'To discuss emerging challenges and innovative solutions through global scientific discourse.', 'group' => 'objectives', 'type' => 'textarea', 'label' => 'Objective 2 Description'],
    ['key' => 'obj_3_title', 'value' => 'Encourage Research Translation', 'group' => 'objectives', 'type' => 'text', 'label' => 'Objective 3 Title'],
    ['key' => 'obj_3_desc', 'value' => 'To encourage research translation for real-world applications and impact.', 'group' => 'objectives', 'type' => 'textarea', 'label' => 'Objective 3 Description'],
    ['key' => 'obj_4_title', 'value' => 'Foster Global Partnerships', 'group' => 'objectives', 'type' => 'text', 'label' => 'Objective 4 Title'],
    ['key' => 'obj_4_desc', 'value' => 'To foster global partnerships for a One Health and sustainable future.', 'group' => 'objectives', 'type' => 'textarea', 'label' => 'Objective 4 Description']
];

foreach ($settings as $setting) {
    \App\Models\SiteSetting::firstOrCreate(['key' => $setting['key']], $setting);
}

echo "Objectives settings inserted.\n";
