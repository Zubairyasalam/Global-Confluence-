<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\SiteSetting;

$preamble = "The Pre-Conference Consultation of Global One Health Confluence 2026 aims to bring together eminent experts, academicians, researchers, healthcare professionals, policymakers and resource persons from diverse disciplines to provide focused and meaningful inputs for the scientific, thematic and collaborative planning of the conference. The consultation will facilitate interdisciplinary dialogue on key One Health priorities, including antimicrobial resistance, infectious and zoonotic diseases, veterinary and public health, environmental and planetary health, food and agricultural sustainability, Siddha and Indian Knowledge Systems (IKS), biotechnology, nanotechnology, innovation, public health and policy governance. It will provide an opportunity to identify emerging challenges, regional priorities and research needs relevant to Tamil Nadu and to develop scientifically relevant sessions, lectures, panel discussions and collaborative activities for GOHC 2026. The consultation will further encourage the exchange of expertise, experiences and innovative ideas among participating institutions and stakeholders, while strengthening academia–industry–healthcare–government partnerships and identifying opportunities for joint research, knowledge exchange, capacity building and translational initiatives. The inputs and recommendations emerging from the consultation will contribute towards shaping a comprehensive and impactful conference programme aligned with the theme \"Bridging Microbes, Molecules & Mankind for Sustainability\", while promoting integrated, evidence-based and sustainable approaches to human, animal and environmental health.";

$objectives = [
    "To obtain expert inputs for the scientific and thematic planning of Global One Health Confluence 2026.",
    "To facilitate interdisciplinary dialogue on human health, animal health, environmental health and allied One Health domains.",
    "To discuss regional priorities related to antimicrobial resistance, infectious diseases, zoonotic diseases, veterinary public health, IKS and public health.",
    "To integrate diverse expert perspectives into the scientific sessions and thematic discussions of GOHC 2026.",
    "To strengthen institutional and professional collaboration towards advancing sustainable and integrated One Health approaches."
];

$note = "Proposed date: 25th September 2026 | Venue: Blue-whale auditorium, MMIP | Mode: Hybrid";

$speakers = [
    [
        'image' => 'images/raman_muthusamy_cropped.png',
        'name' => 'Prof. Dr. Raman Muthusamy',
        'affiliation' => 'Advisor & Cluster Head, One Health, Center for Global Healrtth Research, Saveetha Medical College, Former Director, Translational Research platform for Veterinary Biologicals, TANUVAS, Chennai',
        'expertise' => 'One Health, AMR, Zoonotic disease and translational research'
    ],
    [
        'image' => 'images/suresh_kannan.png',
        'name' => 'Dr. S. Suresh Kannan',
        'affiliation' => 'Professor & Head, Department of Veterinary Public Health and Epidemiology, Madras Veterinary college, Chennai',
        'expertise' => 'One health, zoonotic disease surveillance, AMR and veterinary public health'
    ],
    [
        'image' => 'images/meenakshi_sundaram.png',
        'name' => 'Dr. M. Meenakshi Sundaram',
        'affiliation' => 'Dean, Professor & Head, Department of Kuzhandhai Muruthuvam, National Institute of Siddha, Chennai',
        'expertise' => 'Indian Knowledge system'
    ],
    [
        'image' => 'images/vijaykumar.png',
        'name' => 'Dr. V. Vijaykumar',
        'affiliation' => 'Expert Advisor for child health, National Health Mission, Chennai',
        'expertise' => 'Public health integration and environmental determinants and health policy'
    ],
    [
        'image' => 'images/ramdev_krishnan.png',
        'name' => 'Dr. Ramdev Krishnan. J',
        'affiliation' => 'Head of Operations, Mazumdarshaw Medical Foundation (MSMF)-TBI Narayana Health, Bangalore',
        'expertise' => 'AI in health-care'
    ]
];

$panel = "Panel discussion with Doctors and health care experts (Tentative)";

// Pre-clear all pre_conference settings
SiteSetting::where('group', 'pre_conference')->delete();

SiteSetting::updateOrCreate(['key' => 'pre_conf_preamble', 'group' => 'pre_conference'], ['value' => $preamble]);
SiteSetting::updateOrCreate(['key' => 'pre_conf_schedule_note', 'group' => 'pre_conference'], ['value' => $note]);
SiteSetting::updateOrCreate(['key' => 'pre_conf_panel', 'group' => 'pre_conference'], ['value' => $panel]);

foreach ($objectives as $idx => $obj) {
    $i = $idx + 1;
    SiteSetting::updateOrCreate(['key' => "pre_conf_obj_{$i}", 'group' => 'pre_conference'], ['value' => $obj]);
}

foreach ($speakers as $idx => $speaker) {
    $i = $idx + 1;
    SiteSetting::updateOrCreate(['key' => "pre_conf_speaker_{$i}_name", 'group' => 'pre_conference'], ['value' => $speaker['name']]);
    SiteSetting::updateOrCreate(['key' => "pre_conf_speaker_{$i}_image", 'group' => 'pre_conference'], ['value' => $speaker['image']]);
    SiteSetting::updateOrCreate(['key' => "pre_conf_speaker_{$i}_affiliation", 'group' => 'pre_conference'], ['value' => $speaker['affiliation']]);
    SiteSetting::updateOrCreate(['key' => "pre_conf_speaker_{$i}_expertise", 'group' => 'pre_conference'], ['value' => $speaker['expertise']]);
}

echo "Pre-Conference data seeded successfully.\n";
