<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Track;

Track::query()->delete();

$tracks = [
    [
        'id' => 1,
        'title' => 'Track I: Emerging infectious diseases through a One health lens',
        'bullet_points' => [
            'Zoonosis',
            'Vector borne diseases',
            'Next generation pandemic preparedness',
            'Environmental Reservoirs and AMR',
            'Molecular Therapeutics and countermeasure innovations',
            'Metagenomics in the wild',
            'Novel antimicrobials'
        ],
        'sort_order' => 1
    ],
    [
        'id' => 2,
        'title' => 'Track II: Strengthening Health Systems from Theory to Practice: Embedding Social Infrastructure and Public Governance in One Health Capacities',
        'bullet_points' => [
            'Institutional Governance & Multi-Sectoral Policy',
            'Public health policy and One Health governance',
            'Social Infrastructure & Community Resilience',
            'Workforce Development & Operational Capacity',
            'Addressing Social Determinants of Health',
            'Crisis and outbreak management',
            'Community-led health equity'
        ],
        'sort_order' => 2
    ],
    [
        'id' => 3,
        'title' => 'Track III: Integrating Environment and Climate Change in One Health',
        'bullet_points' => [
            'Climate Change and Pathogen Dynamics',
            'Biodiversity conservation and Biosecurity',
            'Ecosystem resilience',
            'Climate change and Environmental health',
            'Waste management and circular bioeconomy',
            'Mitigating Pollution',
            'Sustainable production systems'
        ],
        'sort_order' => 3
    ],
    [
        'id' => 4,
        'title' => 'Track IV: Translating Sustainable Chemistry and Future Technologies to One Health',
        'bullet_points' => [
            'Green Chemistry & Eco-Safe Material Design',
            'Advanced Technologies for Environmental and Pathogen Remediation',
            'Translational Innovation & Regulatory Harmonization',
            'One Health and Chemical Challenges',
            'Emerging contaminants and environmental chemistry',
            'Sustainable solutions for environmental challenges'
        ],
        'sort_order' => 4
    ],
    [
        'id' => 5,
        'title' => 'Track V: Ensuring health intervention through the Indian Knowledge System',
        'bullet_points' => [
            'Traditional Healthcare Systems (Siddha, Ayurveda, Yoga, Unani and Folk Medicine)',
            'Ethnomedicine and Community Health Practices',
            'Medicinal Plants and Natural Product Research',
            'Traditional Food Systems, Nutrition and Functional Foods',
            'Biodiversity Conservation and Indigenous Ecological Knowledge',
            'Validation of Traditional Knowledge through Modern Science',
            'Integrative Medicine and Precision Traditional Therapeutics',
            'One Health Perspectives in Indian Knowledge Systems',
            'Digital Documentation and Preservation of Indigenous Knowledge',
            'Policy, Ethics and Intellectual Property Rights in Traditional Knowledge',
            'AI and Omics Approaches for Traditional Medicine Research',
            'Translational Research and Commercialization of IKS-based Innovations'
        ],
        'sort_order' => 5
    ],
    [
        'id' => 6,
        'title' => 'Track VI: Regenerative Health: Redefining Industrial One Health Paradigms',
        'bullet_points' => [
            'Responsible Pharmaceutical Manufacturing',
            'Next-Generation Veterinary Biologics',
            'Green Agrochemicals & Biopesticides',
            'Corporate Stewardship & Supply Chain Resilience',
            'Venture Capital in Planetary Health',
            'Cross-Sectoral Commercial Collaboration',
            'Integrating comprehensive One Health metrics into Environmental, Social, and Governance (ESG) corporate reporting standards'
        ],
        'sort_order' => 6
    ]
];

foreach ($tracks as $track) {
    Track::create($track);
}

echo "All 6 Tracks updated successfully in Database!\n";
