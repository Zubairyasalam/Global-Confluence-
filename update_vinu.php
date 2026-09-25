<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Speaker;

$speaker = Speaker::updateOrCreate(
    ['name' => 'Professor Ajayan Vinu'],
    [
        'type' => 'distinguished',
        'university' => 'University of Newcastle',
        'country' => 'Australia',
        'title' => 'Laureate Professor of Nanomaterials & Director, GICAN',
        'h_index' => '109',
        'image_path' => 'images/speakers/vinu.png',
        'sort_order' => 3,
        'field' => 'Nanoporous & Nanostructured Materials Chemistry',
        'current_role' => 'Laureate Professor of Nanomaterials and Director, Global Innovative Centre for Advanced Nanomaterials, University of Newcastle, Australia',
        'education' => 'B.Sc. & M.Sc. Chemistry, Manonmaniam Sundaranar Univ.; PhD, Anna Univ. & TU Kaiserslautern, Germany (2000-2003)',
        'honours' => 'Highly Cited Researcher (2024); Fellow, Royal Society of Chemistry; ~590 papers, ~43,500 citations, h-index of 109',
        'biography' => "Professor Ajayan Vinu is a globally acclaimed materials scientist and one of Australia's leading nanotechnologists. Growing up in a family with no academic background in India, he pursued undergraduate and Master's degrees in chemistry (first class) from Manonmaniam Sundaranar University, Tamil Nadu, before earning a doctoral fellowship in Germany and building an international career across Germany, Japan, and Australia.\n\nHe conducted his PhD research at the Technical University of Kaiserslautern, Germany (2000-2003), followed by research positions at the National Institute for Materials Science (NIMS), Japan (2004-2011). He then held professorships at the University of Queensland (2011-2015) and the University of South Australia (2015-2017), before joining the University of Newcastle, where he now directs the Global Innovative Centre for Advanced Nanomaterials. His research spans nanoporous materials for energy storage and conversion, carbon capture, drug delivery, catalysis, and solar fuel generation.",
        'key_achievements' => "• Author of approximately 590 papers in high-impact journals, with around 43,500 citations and an h-index of 109.\n• Ranked No. 1 in Australia (last 20 years) and No. 7 (last 50 years) among the world's top 2% of scientists in 'Materials' (Stanford University database, 2020).\n• Holder of 32 national and international patents and recipient of over AUD 30 million in research funding.\n• Fellow of the Royal Society of Chemistry (UK), Royal Australian Chemical Institute, World Academy of Ceramics, and World Academy of Art and Science.\n• Delivered roughly 300 invited lectures across 40+ countries, including 52 plenary and 37 keynote lectures.\n• Recipient of the Khwarizmi International Award (2008), Friedrich Wilhelm Bessel Award (2010), and CRSI Medal (2018).",
        'relevance' => "Professor Vinu is an experienced, seasoned keynote and plenary speaker with a track record of engaging international scientific audiences on nanomaterials, energy, and sustainability. His personal journey from a non-academic family in rural Tamil Nadu to global scientific leadership also offers a powerful, relatable narrative for student and early-career researcher audiences."
    ]
);

echo "Successfully updated Speaker ID: " . $speaker->id . "\n";
