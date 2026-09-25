<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Speaker;

$speaker = Speaker::updateOrCreate(
    ['name' => 'Professor Mohan K. Balasubramanian'],
    [
        'type' => 'distinguished',
        'category' => 'distinguished',
        'university' => 'Warwick Medical School, University of Warwick',
        'country' => 'United Kingdom',
        'title' => 'Wellcome Trust Senior Investigator | Pro-Dean (Biomedical Research)',
        'h_index' => '47',
        'image_path' => 'images/speakers/cropped_mohan.png',
        'sort_order' => 1,
        'field' => 'Cell Biology — Molecular Mechanisms of Cytokinesis',
        'current_role' => 'Wellcome Trust Senior Investigator and Pro-Dean (Biomedical Research), Warwick Medical School, University of Warwick',
        'education' => 'B.Sc. Chemistry, Madras University; postgraduate studies in Microbiology & Biotechnology, Baroda, India; PhD, University of Saskatchewan, Canada; Postdoctoral research, Vanderbilt University, USA',
        'honours' => 'Wolfson Merit Award Holder; h-index of 47 with 146+ publications',
        'biography' => "Professor Mohan Balasubramanian studies the molecular mechanisms driving cytokinesis — the process by which a single cell physically divides into two. His laboratory combines yeast genetics, high-resolution imaging, and biochemistry, primarily using the fission yeasts Schizosaccharomyces pombe and S. japonicus as model systems to dissect how the actomyosin contractile ring assembles and constricts during cell division.\n\nHe graduated in chemistry from Madras University, India, and pursued postgraduate studies in microbiology and biotechnology in Baroda, India, before completing his doctoral research at the University of Saskatchewan, Canada, where he began his study of fission-yeast cell division. Following postdoctoral work at Vanderbilt University, USA, he joined the Institute of Molecular Agrobiology in Singapore in 1997, moved to the Temasek Life Sciences Laboratory in Singapore in 2002, and relocated to the University of Warwick, UK, in 2014.",
        'key_achievements' => "• Wellcome Trust Senior Investigator and Wolfson Merit Award holder, recognising sustained, high-impact contributions to cell biology.\n• Author of over 140 peer-reviewed publications on cytokinesis, with more than 1,500 citations and an h-index of 47.\n• Identified and characterised several core cytokinesis genes (including tropomyosin, myosin light chain, and profilin components) foundational to the field.\n• Serves as Pro-Dean (Biomedical Research) at Warwick Medical School, shaping the university's biomedical research strategy.\n• Long-standing collaborative research network spanning the UK, USA, Singapore, and India.",
        'relevance' => "Professor Balasubramanian offers deep expertise in fundamental cell biology and the genetics of cell division, of direct relevance to microbiology, cell and molecular biology audiences. His career path — from Tamil Nadu to leading international laboratories — also makes for a compelling narrative on scientific mentorship and global research careers."
    ]
);

echo "Successfully updated Speaker ID: " . $speaker->id . "\n";
