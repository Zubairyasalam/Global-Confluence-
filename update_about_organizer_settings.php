<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\SiteSetting;

$defaults = [
    // Header
    ['group' => 'about_organizer', 'key' => 'org_section_subtitle', 'label' => 'Section Subtitle', 'type' => 'text', 'value' => 'About The Organizers'],
    ['group' => 'about_organizer', 'key' => 'org_section_title', 'label' => 'Section Title', 'type' => 'text', 'value' => 'Host Institutions & Departments'],

    // Tab 1: MCC
    ['group' => 'about_organizer', 'key' => 'mcc_tab_title', 'label' => 'MCC Tab Nav Title', 'type' => 'text', 'value' => 'Madras Christian College'],
    ['group' => 'about_organizer', 'key' => 'mcc_tab_sub', 'label' => 'MCC Tab Nav Subtitle', 'type' => 'text', 'value' => 'MCC • Chennai'],
    ['group' => 'about_organizer', 'key' => 'mcc_tag', 'label' => 'MCC Tagline', 'type' => 'text', 'value' => 'Madras Christian College'],
    ['group' => 'about_organizer', 'key' => 'mcc_title', 'label' => 'MCC Title', 'type' => 'text', 'value' => 'A Legacy of Academic Excellence'],
    ['group' => 'about_organizer', 'key' => 'mcc_p1', 'label' => 'MCC Paragraph 1', 'type' => 'textarea', 'value' => "Madras Christian College (MCC), established in 1837, is one of India's premier institutions of higher learning with a rich heritage of academic excellence, character formation and nation building."],
    ['group' => 'about_organizer', 'key' => 'mcc_p2', 'label' => 'MCC Paragraph 2', 'type' => 'textarea', 'value' => "Affiliated to the University of Madras and accredited with 'A' Grade by NAAC, MCC offers a vibrant environment for holistic education across disciplines."],
    ['group' => 'about_organizer', 'key' => 'mcc_p3', 'label' => 'MCC Paragraph 3', 'type' => 'textarea', 'value' => "The Department of Microbiology at MCC has a strong legacy of quality teaching, innovative research and contributions to the advancement of microbial sciences with a focus on societal impact and global relevance."],

    // MCC Highlights
    ['group' => 'about_organizer', 'key' => 'mcc_feat1_title', 'label' => 'Highlight 1 Title', 'type' => 'text', 'value' => 'ESTABLISHED IN 1837'],
    ['group' => 'about_organizer', 'key' => 'mcc_feat1_sub', 'label' => 'Highlight 1 Subtitle', 'type' => 'text', 'value' => 'A legacy of 189 years of academic excellence'],
    ['group' => 'about_organizer', 'key' => 'mcc_feat1_icon', 'label' => 'Highlight 1 Icon', 'type' => 'text', 'value' => 'fa-solid fa-landmark'],

    ['group' => 'about_organizer', 'key' => 'mcc_feat2_title', 'label' => 'Highlight 2 Title', 'type' => 'text', 'value' => "'A' GRADE BY NAAC"],
    ['group' => 'about_organizer', 'key' => 'mcc_feat2_sub', 'label' => 'Highlight 2 Subtitle', 'type' => 'text', 'value' => 'Recognized for quality and institutional excellence'],
    ['group' => 'about_organizer', 'key' => 'mcc_feat2_icon', 'label' => 'Highlight 2 Icon', 'type' => 'text', 'value' => 'fa-solid fa-award'],

    ['group' => 'about_organizer', 'key' => 'mcc_feat3_title', 'label' => 'Highlight 3 Title', 'type' => 'text', 'value' => 'AUTONOMOUS INSTITUTION'],
    ['group' => 'about_organizer', 'key' => 'mcc_feat3_sub', 'label' => 'Highlight 3 Subtitle', 'type' => 'text', 'value' => 'Affiliated to the University of Madras'],
    ['group' => 'about_organizer', 'key' => 'mcc_feat3_icon', 'label' => 'Highlight 3 Icon', 'type' => 'text', 'value' => 'fa-solid fa-graduation-cap'],

    ['group' => 'about_organizer', 'key' => 'mcc_feat4_title', 'label' => 'Highlight 4 Title', 'type' => 'text', 'value' => 'HOLISTIC EDUCATION'],
    ['group' => 'about_organizer', 'key' => 'mcc_feat4_sub', 'label' => 'Highlight 4 Subtitle', 'type' => 'text', 'value' => 'Nurturing intellect, character and leadership'],
    ['group' => 'about_organizer', 'key' => 'mcc_feat4_icon', 'label' => 'Highlight 4 Icon', 'type' => 'text', 'value' => 'fa-solid fa-users'],

    ['group' => 'about_organizer', 'key' => 'mcc_feat5_title', 'label' => 'Highlight 5 Title', 'type' => 'text', 'value' => 'RESEARCH & INNOVATION'],
    ['group' => 'about_organizer', 'key' => 'mcc_feat5_sub', 'label' => 'Highlight 5 Subtitle', 'type' => 'text', 'value' => 'Encouraging impactful research for a better world'],
    ['group' => 'about_organizer', 'key' => 'mcc_feat5_icon', 'label' => 'Highlight 5 Icon', 'type' => 'text', 'value' => 'fa-solid fa-microscope'],

    // Tab 2: MMIP
    ['group' => 'about_organizer', 'key' => 'mmip_tab_title', 'label' => 'MMIP Tab Nav Title', 'type' => 'text', 'value' => 'MCC-MRF Innovation Park'],
    ['group' => 'about_organizer', 'key' => 'mmip_tab_sub', 'label' => 'MMIP Tab Nav Subtitle', 'type' => 'text', 'value' => 'MMIP'],
    ['group' => 'about_organizer', 'key' => 'mmip_tag', 'label' => 'MMIP Tagline', 'type' => 'text', 'value' => 'MCC-MRF Innovation Park'],
    ['group' => 'about_organizer', 'key' => 'mmip_title', 'label' => 'MMIP Title', 'type' => 'text', 'value' => 'A Pioneering Innovation Ecosystem'],
    ['group' => 'about_organizer', 'key' => 'mmip_p1', 'label' => 'MMIP Paragraph 1', 'type' => 'textarea', 'value' => 'MCC–MRF Innovation Park (MMIP), established at Madras Christian College with the generous support of the MRF Foundation, is a pioneering innovation ecosystem dedicated to research, innovation, entrepreneurship, and startup development. Spread across 45,000 sq. ft., MMIP is the largest innovation park among liberal arts and science colleges in India, and one of the first-of-its-kind innovation parks established within a liberal arts and science institution.'],
    ['group' => 'about_organizer', 'key' => 'mmip_p2', 'label' => 'MMIP Paragraph 2', 'type' => 'textarea', 'value' => 'MMIP integrates research, design thinking, technology, and entrepreneurship into a multidisciplinary academic environment, demonstrating that innovation can flourish across disciplines beyond engineering. It serves as a scalable model for higher education institutions seeking to promote innovation-driven education, interdisciplinary collaboration, and entrepreneurial thinking.'],

    // Tab 3: Microbiology
    ['group' => 'about_organizer', 'key' => 'micro_tab_title', 'label' => 'Microbiology Tab Nav Title', 'type' => 'text', 'value' => 'Dept. of Microbiology'],
    ['group' => 'about_organizer', 'key' => 'micro_tab_sub', 'label' => 'Microbiology Tab Nav Subtitle', 'type' => 'text', 'value' => 'Est. 2002 • Research Unit'],
    ['group' => 'about_organizer', 'key' => 'micro_tag', 'label' => 'Microbiology Tagline', 'type' => 'text', 'value' => 'Madras Christian College'],
    ['group' => 'about_organizer', 'key' => 'micro_title', 'label' => 'Microbiology Title', 'type' => 'text', 'value' => 'Department of Microbiology'],
    ['group' => 'about_organizer', 'key' => 'about_dept', 'label' => 'Microbiology Description', 'type' => 'textarea', 'value' => "The Department of Microbiology at Madras Christian College was established in 2002–03 with the mission of imparting education and advancing research in Applied Microbiology. Since its inception, the department has maintained a strong commitment to academic excellence, leadership development, research and societal relevance.\n\nWith well-equipped laboratories and sophisticated instrumentation, the department encourages student focused learning, laboratory-based project work, scholarly activities and innovative research. Its academic and research infrastructure has supported the recognition by the University of Madras to offer a Ph.D. programme since 2018. The department also fosters a diverse and inclusive academic community, with students from across India and other countries pursuing undergraduate and postgraduate programmes in Microbiology."],

    // Tab 4: Chemistry
    ['group' => 'about_organizer', 'key' => 'chem_tab_title', 'label' => 'Chemistry Tab Nav Title', 'type' => 'text', 'value' => 'Dept. of Chemistry (SFS)'],
    ['group' => 'about_organizer', 'key' => 'chem_tab_sub', 'label' => 'Chemistry Tab Nav Subtitle', 'type' => 'text', 'value' => 'Est. 2003 • M.Sc. Program'],
    ['group' => 'about_organizer', 'key' => 'chem_tag', 'label' => 'Chemistry Tagline', 'type' => 'text', 'value' => 'Madras Christian College'],
    ['group' => 'about_organizer', 'key' => 'chem_title', 'label' => 'Chemistry Title', 'type' => 'text', 'value' => 'Department of Chemistry (SFS)'],
    ['group' => 'about_organizer', 'key' => 'about_chemistry', 'label' => 'Chemistry Description', 'type' => 'textarea', 'value' => "The Department of Chemistry under the Self Financed Stream at Madras Christian College was established in 2003 and offers a postgraduate programme in Chemistry.\n\nThe programme is designed as a comprehensive course in Chemistry, providing students with a strong foundation and broad-based knowledge across major areas including Organic, Inorganic, Physical, Analytical, Environmental, and Medicinal Chemistry. The Department emphasizes conceptual understanding, laboratory skills, scientific thinking, and practical application, enabling students to develop the academic and professional competencies required for higher studies, competitive examinations, teaching, and careers in the chemical sciences."]
];

foreach ($defaults as $d) {
    SiteSetting::updateOrCreate(['key' => $d['key']], $d);
}

echo "About Organizer settings populated successfully.\n";
