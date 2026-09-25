<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Speaker;

$speaker = Speaker::updateOrCreate(
    ['name' => 'Dr. Adrian Loo Hock Beng'],
    [
        'type' => 'distinguished',
        'university' => 'National University of Singapore (NUS)',
        'country' => 'Singapore',
        'title' => 'Associate Professor in Practice, Dept. of Biological Sciences, NUS',
        'image_path' => 'images/speakers/adrian_loo.png',
        'sort_order' => 5,
        'field' => 'Wildlife Management, Biodiversity Conservation & Conservation Technology',
        'current_role' => 'Associate Professor in Practice, Dept. of Biological Sciences, NUS; Former Group Director (Wildlife Management), NParks',
        'education' => 'PhD in Botany, National University of Singapore (NUS); Postdoctoral Fellow, Royal Botanic Gardens, Kew (London) & Lee Kuan Yew Postdoctoral Fellow',
        'honours' => 'Lee Kuan Yew Postdoctoral Fellow; Member, XPRIZE Rainforest Advisory Board; Former Group Director, NParks Singapore',
        'biography' => "Dr. Adrian Loo Hock Beng is an Associate Professor in Practice in the Department of Biological Sciences at the National University of Singapore (NUS). With extensive leadership experience in wildlife management, biodiversity conservation, and environmental policy, he previously served as Group Director for Wildlife Management and Senior Director for Community Projects at the National Parks Board (NParks), Singapore.\n\nDr. Loo earned his PhD in Botany from NUS, conducting research on montane palms in Peninsular Malaysia, followed by postdoctoral research at the Royal Botanic Gardens, Kew in London and a Lee Kuan Yew Postdoctoral Fellowship at NUS. Throughout his career, he has pioneered innovative human-wildlife conflict mitigation strategies, established the Centre for Wildlife Forensics, chaired national wildlife working groups, and led transformative community conservation initiatives including Singapore's One Million Trees movement.",
        'key_achievements' => "• Group Director for Wildlife Management & Senior Director for Community Projects at NParks, Singapore.\n• Chair of the Singapore Otter Working Group and Co-Chair of the Long-Tailed Macaque Working Group, establishing benchmark urban wildlife management frameworks.\n• Instrumental in founding the Centre for Wildlife Forensics to combat illegal wildlife trade in Southeast Asia.\n• Awarded the prestigious Lee Kuan Yew Postdoctoral Fellowship following research at Kew Gardens, London.\n• Key leader in Singapore's 'One Million Trees' initiative, advancing nature-based climate solutions and urban rewilding.\n• Spearheading conservation technology research incorporating bioacoustics, environmental DNA (eDNA), AI monitoring, and population genetics.",
        'relevance' => "Dr. Loo brings profound, real-world expertise at the intersection of academic biodiversity research, urban wildlife management, and national conservation policy. His experience leading national agencies, developing wildlife forensics capabilities, and deploying modern conservation technology (AI, eDNA, bioacoustics) provides invaluable insights for audiences across biological sciences, ecology, and environmental sustainability."
    ]
);

echo "Successfully updated Speaker ID: " . $speaker->id . "\n";
