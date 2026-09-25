<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Speaker;

$speaker = Speaker::updateOrCreate(
    ['name' => 'Dr. Krishnaswamy VijayRaghavan'],
    [
        'type' => 'keynote',
        'category' => 'keynote',
        'university' => 'National Centre for Biological Sciences (NCBS)',
        'country' => 'India',
        'title' => 'Former Principal Scientific Adviser, Government of India',
        'image_path' => 'images/speakers/cropped_vijayraghavan.png',
        'sort_order' => 1,
        'field' => 'Developmental Biology, Genetics & Neurogenetics',
        'current_role' => 'Academic Advisory Board Member, ATREE; Former Principal Scientific Adviser to the Government of India',
        'education' => 'B.Tech (1975) & M.Tech (1977) in Chemical Engineering, IIT Kanpur; PhD in Molecular Biology (1983), TIFR; Postdoctoral research, California Institute of Technology (1984-88)',
        'honours' => 'Fellow, The Royal Society (2012); Padma Shri (2013); Shanti Swarup Bhatnagar Prize (1998)',
        'biography' => "Dr. Krishnaswamy VijayRaghavan is a distinguished professor and former director of the National Centre for Biological Sciences (NCBS), and served as Principal Scientific Adviser to the Government of India from 2018. His research addresses the fundamental principles and mechanisms that govern the nervous system and muscles during development, and how neuromuscular systems direct locomotor behaviours in model organisms.\n\nHe trained as a chemical engineer at IIT Kanpur before turning to molecular biology, completing his doctoral work at the Tata Institute of Fundamental Research (TIFR) and postdoctoral research at the California Institute of Technology. He went on to serve as Secretary of India's Department of Biotechnology (DBT) and is a senior editor of the journal eLife, in addition to sitting on the board of governors of the Okinawa Institute of Science and Technology.",
        'key_achievements' => "• Fellow of The Royal Society (2012) and recipient of the Padma Shri (2013), one of India's highest civilian honours.\n• A newly discovered gecko species, Hemidactylus vijayraghavani, was named in his honour (2018).\n• Foreign Associate, US National Academy of Sciences (2014); Fellow, The World Academy of Sciences (2010).\n• Shanti Swarup Bhatnagar Prize (1998) — India's premier science award — and the J.C. Bose Fellowship (2006).\n• Fellow of the Indian National Science Academy (1999) and the Indian Academy of Sciences (1997).\n• Distinguished Alumnus Award, IIT Kanpur (2003).",
        'relevance' => "As a former national science policy chief and a globally recognised developmental biologist, Dr. VijayRaghavan can speak authoritatively on science policy, biodiversity and conservation science, neurogenetics, and the translation of fundamental biological research into national capability — a strong fit for audiences spanning academia, conservation, and public policy."
    ]
);

echo "Successfully updated Speaker ID: " . $speaker->id . "\n";
