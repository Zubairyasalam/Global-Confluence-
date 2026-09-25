<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Speaker;

Speaker::updateOrCreate(
    [
        'name' => 'Dr. Soumya Swaminathan',
        'type' => 'keynote'
    ],
    [
        'title' => 'Chairperson, M. S. Swaminathan Research Foundation (MSSRF)',
        'current_role' => 'Former Chief Scientist and Deputy Director-General for Programmes, World Health Organization (WHO)',
        'university' => 'MSSRF',
        'country' => 'India',
        'image_path' => 'images/soumya_swaminathan.jpg',
        'field' => 'Fellow of the Royal Society | Global Public Health & Clinical Research',
        'sort_order' => 1,
        'biography' => "Dr. Soumya Swaminathan is a globally renowned pediatrician, clinical scientist, and public health leader. She served as the inaugural Chief Scientist at the World Health Organization (WHO) from 2019 to 2022, and previously as WHO's Deputy Director-General for Programmes.\n\nShe is currently the Chairperson of the M. S. Swaminathan Research Foundation (MSSRF) in Chennai, India. Prior to joining WHO, Dr. Swaminathan served as the Director-General of the Indian Council of Medical Research (ICMR) and Secretary of the Department of Health Research, Government of India. She is a Fellow of the Royal Society (FRS) and has made groundbreaking contributions to tuberculosis and HIV research.",
        'education' => 'MBBS, AFMC Pune; MD in Pediatrics, AIIMS New Delhi; Diplomate of National Board; Postdoctoral Fellowship in Pediatric Pulmonology, Children\'s Hospital Los Angeles, USC.',
        'honours' => 'Fellow of the Royal Society (FRS); Fellow of the National Academy of Sciences, India (NASI); Fellow of the Indian National Science Academy (INSA).',
        'key_achievements' => "• Inaugural Chief Scientist of the World Health Organization (WHO) (2019–2022).\n• Former Deputy Director-General for Programmes, WHO.\n• Former Director-General of the Indian Council of Medical Research (ICMR).\n• Fellow of the Royal Society (FRS).",
        'relevance' => 'As former WHO Chief Scientist and a world-renowned leader in medical research, Dr. Swaminathan offers invaluable insights on global pandemic preparedness, public health policy, research translation, and planetary One Health governance.'
    ]
);

// Ensure Dr. VijayRaghavan has sort_order 2
Speaker::where('name', 'like', '%VijayRaghavan%')->update(['sort_order' => 2]);

echo "Dr. Soumya Swaminathan added successfully to Keynote Speakers!\n";
