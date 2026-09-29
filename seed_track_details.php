<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\SiteSetting;

$tracksData = [
    [
        'name' => 'Track I',
        'topic' => 'Emerging infectious diseases through a One health lens',
        'adjudicator' => 'Dr. Ananthi Rachel Livingstone, Head of the Dept.',
        'staff' => 'Dr.S. Niren Andrew, Assistant Professor, Department of Microbiology,Madras Christian College, Chennai-59 & Mrs.Adline Jennefa Daniel, Assistant Professor, Department of Zoology, Madras Christian College, Chennai-59',
        'color' => '#009688'
    ],
    [
        'name' => 'Track II',
        'topic' => 'Strengthening Health Systems from Theory to Practice: Embedding Social Infrastructure and Public Governance in One Health Capacities',
        'adjudicator' => 'Dr. R. Sridhar, Vice-Principal (Admin), Associate Professor',
        'staff' => 'Dr.S.Premina, Assistant Professor, Department of Microbiology,Madras Christian College, Chennai-59 & Dr.Milton Devadayavu N, Assistant Professor, Department of Public Administration, Madras Christian College, Chennai-59',
        'color' => '#3b82f6'
    ],
    [
        'name' => 'Track III',
        'topic' => 'Integrating Environment and Climate Change in One Health',
        'adjudicator' => 'Dr. E. Joyce Sudandara Priya, Head of the Dept.',
        'staff' => 'Dr. P. Hanumantha Rao, Associate Professor, Department of Microbiology,Madras Christian College, Chennai-59 & Dr.U. Senthilkumar, Assistant Professor, Department of Botany, Madras Christian College, Chennai-59',
        'color' => '#8b5cf6'
    ],
    [
        'name' => 'Track IV',
        'topic' => 'Translating Sustainable Chemistry and Future Technologies to One Health',
        'adjudicator' => 'Dr. E. Iyyappan, Head of the Department',
        'staff' => 'Dr.S.Abirami, Assistant Professor, Department of Microbiology,Madras Christian College, Chennai-59 & Dr. R. Vijay Solomon, Assistant Professor, Department of Chemistry (Aided), Madras Christian College, Chennai-59',
        'color' => '#ec4899'
    ],
    [
        'name' => 'Track V',
        'topic' => 'Ensuring health intervention through the Indian Knowledge System',
        'adjudicator' => 'Prof. Dr.S. Sivakkumar, Professor / Gunapadam',
        'staff' => 'Dr.V.Vedha, Assistant Professor, Department of Microbiology,Madras Christian College, Chennai-59 & Dr. K. Vijayalakshmi, Assistant Professor, Department of Chemistry (SFS), Madras Christian College, Chennai-59',
        'color' => '#f59e0b'
    ],
    [
        'name' => 'Track VI',
        'topic' => 'Regenerative Health: Redefining Industrial One Health Paradigms',
        'adjudicator' => 'Dr. T.Sathish Kumar, Associate Professor',
        'staff' => 'Dr. T.Sathish Kumar, Associate Professor, Department of Microbiology,Madras Christian College, Chennai-59 & Dr.S. Daniel Abraham, Assistant Professor, Department of Chemistry (SFS), Madras Christian College, Chennai-59',
        'color' => '#10b981'
    ]
];

$count = 0;
foreach ($tracksData as $t) {
    $count++;
    SiteSetting::updateOrCreate(['key' => "track_{$count}_name"], ['value' => $t['name'], 'group' => 'schedule']);
    SiteSetting::updateOrCreate(['key' => "track_{$count}_topic"], ['value' => $t['topic'], 'group' => 'schedule']);
    SiteSetting::updateOrCreate(['key' => "track_{$count}_adjudicator"], ['value' => $t['adjudicator'], 'group' => 'schedule']);
    SiteSetting::updateOrCreate(['key' => "track_{$count}_staff"], ['value' => $t['staff'], 'group' => 'schedule']);
    SiteSetting::updateOrCreate(['key' => "track_{$count}_color"], ['value' => $t['color'], 'group' => 'schedule']);
}
SiteSetting::updateOrCreate(['key' => 'track_count'], ['value' => $count, 'group' => 'schedule']);
echo "Track schedule settings seeded successfully.\n";
