<?php

use Illuminate\Database\Eloquent\Model;

Model::unguard();

$microbiologyText = <<<EOT
The Department of Microbiology at Madras Christian College was established in 2002–03 with the mission of imparting education and advancing research in Applied Microbiology. Since its inception, the department has maintained a strong commitment to academic excellence, leadership development, research and societal relevance.

With well-equipped laboratories and sophisticated instrumentation, the department encourages student focused learning, laboratory-based project work, scholarly activities and innovative research. Its academic and research infrastructure has supported the recognition by the University of Madras to offer a Ph.D. programme since 2018. The department also fosters a diverse and inclusive academic community, with students from across India and other countries pursuing undergraduate and postgraduate programmes in Microbiology.
EOT;

$chemistryText = <<<EOT
The Department of Chemistry under the Self Financed Stream at Madras Christian College was established in 2003 and offers a postgraduate programme in Chemistry.

The programme is designed as a comprehensive course in Chemistry, providing students with a strong foundation and broad-based knowledge across major areas including Organic, Inorganic, Physical, Analytical, Environmental, and Medicinal Chemistry. The Department emphasizes conceptual understanding, laboratory skills, scientific thinking, and practical application, enabling students to develop the academic and professional competencies required for higher studies, competitive examinations, teaching, and careers in the chemical sciences.
EOT;

\App\Models\SiteSetting::updateOrCreate(
    ['key' => 'about_dept'],
    ['value' => $microbiologyText, 'group' => 'about', 'type' => 'textarea', 'label' => 'About Department of Microbiology']
);

\App\Models\SiteSetting::updateOrCreate(
    ['key' => 'about_chemistry'],
    ['value' => $chemistryText, 'group' => 'about', 'type' => 'textarea', 'label' => 'About Department of Chemistry']
);

echo "Updated department contents successfully.\n";
