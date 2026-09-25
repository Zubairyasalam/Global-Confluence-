<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Speaker;

$speaker = Speaker::updateOrCreate(
    ['name' => 'Dr. Priya Abraham'],
    [
        'type' => 'keynote',
        'category' => 'keynote',
        'university' => 'Christian Medical College (CMC), Vellore',
        'country' => 'India',
        'title' => 'Senior Professor, Department of Clinical Virology, CMC Vellore | Former Director, ICMR–NIV',
        'image_path' => 'images/speakers/priya_abraham.png',
        'sort_order' => 2,
        'field' => 'Clinical Virology & Viral Diagnostics',
        'current_role' => 'Former Director, ICMR-National Institute of Virology (NIV), Pune; Senior Professor, CMC Vellore',
        'education' => 'MD and PhD in Biology, Christian Medical College (CMC), Vellore (1981)',
        'honours' => 'Fellow, Indian National Science Academy (2023); Advisor to WHO and ICMR Scientific Advisory Committee',
        'biography' => "Dr. Priya Abraham is an Indian virologist and physician recognised for her leadership in viral diagnostics and research, most notably as Director of the ICMR-National Institute of Virology (NIV), Pune, from November 2019 to early 2024. She took charge of NIV barely two months before the first COVID-19 case was detected in India, and her institute went on to isolate the SARS-CoV-2 virus and lead the country's genomic surveillance and testing response.\n\nOriginally from Kottayam, Kerala, she earned her MD and PhD in biology from Christian Medical College (CMC), Vellore, in 1981, where she subsequently headed the Clinical Virology section, focusing initially on hepatitis and human papillomaviruses. Under her leadership, NIV reduced COVID-19 sample testing time from 12–14 hours to just four, while scaling testing capacity, distributing kits nationally, and monitoring emerging variants.",
        'key_achievements' => "• Led NIV's isolation of the first SARS-CoV-2 sample in India (March 2020) and the country's genomic surveillance response.\n• Elected Fellow of the Indian National Science Academy (September 2023).\n• Advised the World Health Organization on viral infections and served on the ICMR Scientific Advisory Committee.\n• Oversaw development of indigenous COVID-19 testing assays and supported vaccine and convalescent-plasma trials nationally.\n• Decades of prior leadership in clinical virology at CMC Vellore, mentoring generations of virologists and researchers.",
        'relevance' => "Dr. Abraham brings first-hand experience leading a national institution through a global pandemic, making her an outstanding speaker on public health preparedness, viral diagnostics, crisis leadership in science, and the translation of laboratory research into national policy response — highly relevant to microbiology and public health audiences."
    ]
);

echo "Successfully updated Speaker ID: " . $speaker->id . "\n";
