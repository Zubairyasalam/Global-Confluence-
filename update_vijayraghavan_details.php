<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Speaker;

// Update or replace existing VijayRaghavan entry
Speaker::where('name', 'like', '%VijayRaghavan%')->delete();

Speaker::create([
    'name' => 'Padma Shri Prof. K. VijayRaghavan',
    'type' => 'keynote',
    'title' => 'Former Principal Scientific Adviser to the Government of India',
    'current_role' => 'Emeritus Professor, National Centre for Biological Sciences (NCBS), Tata Institute of Fundamental Research (TIFR), Bengaluru, India',
    'university' => 'NCBS, TIFR',
    'country' => 'India',
    'image_path' => 'images/vijayraghavan.jpg',
    'field' => 'Developmental Biology, Genetics & Neurogenetics',
    'sort_order' => 2,
    'biography' => "Padma Shri Prof. K. VijayRaghavan is a distinguished developmental biologist and former Principal Scientific Adviser to the Government of India (2018–2022). He is an Emeritus Professor and former Director of the National Centre for Biological Sciences (NCBS), Tata Institute of Fundamental Research (TIFR), Bengaluru.\n\nHis research addresses the fundamental principles and mechanisms that govern the nervous system and muscles during development. He trained as a chemical engineer at IIT Kanpur before completing his doctoral work at TIFR and postdoctoral research at Caltech. He also served as Secretary of India's Department of Biotechnology (DBT).",
    'education' => 'B.Tech (1975) & M.Tech (1977) in Chemical Engineering, IIT Kanpur; PhD in Molecular Biology (1983), TIFR; Postdoctoral research, Caltech (1984–88).',
    'honours' => 'Padma Shri (2013); Fellow of the Royal Society (FRS, 2012); Foreign Associate, US National Academy of Sciences (2014); Shanti Swarup Bhatnagar Prize (1998).',
    'key_achievements' => "• Former Principal Scientific Adviser to the Government of India.\n• Recipient of Padma Shri (2013), one of India's highest civilian honors.\n• Fellow of the Royal Society (FRS, 2012).\n• Shanti Swarup Bhatnagar Prize recipient (1998).",
    'relevance' => 'As a former national science policy chief and leading developmental biologist, Prof. VijayRaghavan brings profound insight into science governance, neurogenetics, biotechnology capability, and multi-sectoral One Health research.'
]);

echo "Padma Shri Prof. K. VijayRaghavan updated successfully!\n";
