<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Speaker;

$speaker = Speaker::updateOrCreate(
    ['name' => 'Prof. Ts. Dr. Liew Kai Bin'],
    [
        'type' => 'distinguished',
        'university' => 'University of Cyberjaya (UoC)',
        'country' => 'Malaysia',
        'title' => 'Head, Department of Pharmaceutical Technology & Industry',
        'image_path' => 'images/speakers/liew_kai_bin.png',
        'sort_order' => 4,
        'field' => 'Pharmaceutical Technology — Advanced Oral Pharmaceutics, Nanoformulations & Cosmeceutics',
        'current_role' => 'Professor and Head, Department of Pharmaceutical Technology & Industry, Faculty of Pharmacy, University of Cyberjaya',
        'education' => 'BPharm (Hons), Universiti Sains Malaysia (USM); MSc (Pharmaceutical Technology), USM; PhD',
        'honours' => '1,500+ citations on Google Scholar; FRGS Grant Awardee (RM144,300); Registered Technologist (Ts.)',
        'biography' => "Prof. Ts. Dr. Liew Kai Bin is Head of the Department of Pharmaceutical Technology & Industry at the Faculty of Pharmacy, University of Cyberjaya (UoC), Malaysia. He holds a BPharm (Hons) and an MSc in Pharmaceutical Technology from Universiti Sains Malaysia (USM), together with a PhD, and is a registered Technologist (Ts.) recognised for bridging formulation science with real-world pharmaceutical innovation.\n\nHis research centres on advanced oral pharmaceutics and next-generation drug delivery systems, spanning nanoparticles and micelles, liposomal formulations for skin repair, fucoidan-based nanoparticles for anti-ageing cosmeceutics, and probiotic orodispersible films for oral health. His work also covers bioequivalence studies, anti-cancer compound discovery (including the natural flavonoid luteolin), and biopharmaceutics — consistently aimed at moving formulations from the laboratory bench toward commercialisation and patient impact.",
        'key_achievements' => "• Head of the Department of Pharmaceutical Technology & Industry, Faculty of Pharmacy, University of Cyberjaya.\n• Secured a Fundamental Research Grant Scheme (FRGS) award of RM144,300 from Malaysia's Ministry of Higher Education for research on the anticancer properties of luteolin.\n• Cited author (1,500+ citations on Google Scholar) with an active publication record in pharmaceutical technology, spanning nanoformulations, bioequivalence, and cosmeceutical drug delivery.\n• Recognised nationally as a Youth awardee for research contributions, alongside multiple national and international team research awards at UoC.\n• Active mentor of undergraduate and graduate students, embedding them as co-authors and conference presenters in ongoing translational research projects.\n• Research aligned with UN Sustainable Development Goals 3 (Good Health & Well-being) and 17 (Partnerships for the Goals), with active industry and international collaborations across Japan, India, and Indonesia.",
        'relevance' => "Prof. Liew offers strong, practice-oriented expertise in pharmaceutical technology, nanoformulation, and cosmeceutical innovation, with a clear translational and commercialisation focus. He is well suited to keynote engagements on drug delivery systems, nanotechnology in pharmaceutics, and research mentorship for pharmacy and biomedical science audiences, and speaks readily to the practical challenges of moving research from lab to market."
    ]
);

echo "Successfully updated Speaker ID: " . $speaker->id . "\n";
