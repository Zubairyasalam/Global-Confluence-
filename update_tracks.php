<?php
$file = 'c:\scrach\biomed-app\resources\views\sections\thrust-areas.blade.php';
$content = file_get_contents($file);

$newTracks = <<<HTML
            <div class="premium-topic-card">
                <h3 class="premium-topic-title">
                    <div>Track I: Emerging infectious diseases through a One health lens</div>
                </h3>
                <ul class="premium-topic-list">
                    <li><i class="fa-solid fa-check"></i> <span>Zoonosis</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Vector borne diseases</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Next generation pandemic preparedness</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Environmental Reservoirs and AMR</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Molecular Therapeutics and countermeasure innovations</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Metagenomics in the wild</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Novel antimicrobials</span></li>
                </ul>
            </div>

            <div class="premium-topic-card">
                <h3 class="premium-topic-title">
                    <div>Track II: Strengthening Health Systems from Theory to Practice: Embedding Social Infrastructure and Public Governance in One Health Capacities</div>
                </h3>
                <ul class="premium-topic-list">
                    <li><i class="fa-solid fa-check"></i> <span>Institutional Governance & Multi-Sectoral Policy</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Public health policy and One Health governance</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Social Infrastructure & Community Resilience</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Workforce Development & Operational Capacity</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Addressing Social Determinants of Health</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Crisis and outbreak management</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Community-led health equity</span></li>
                </ul>
            </div>

            <div class="premium-topic-card">
                <h3 class="premium-topic-title">
                    <div>Track III: Integrating Environment and Climate change in One Health</div>
                </h3>
                <ul class="premium-topic-list">
                    <li><i class="fa-solid fa-check"></i> <span>Climate Change and Pathogen Dynamics</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Biodiversity conservation and Biosecurity</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Ecosystem resilience</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Climate change and Environmental health</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Waste management and circular bioeconomy</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Mitigating Pollution</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Sustainable production systems</span></li>
                </ul>
            </div>

            <div class="premium-topic-card">
                <h3 class="premium-topic-title">
                    <div>Track IV: Translating Sustainable Chemistry and Future Technologies to One Health</div>
                </h3>
                <ul class="premium-topic-list">
                    <li><i class="fa-solid fa-check"></i> <span>Green Chemistry & Eco-Safe Material Design</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Advanced Technologies for Environmental and Pathogen Remediation</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Translational Innovation & Regulatory Harmonization</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>One Health and chemical challenges</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Emerging contaminants and environmental chemistry</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Sustainable solutions for environmental challenges</span></li>
                </ul>
            </div>

            <div class="premium-topic-card">
                <h3 class="premium-topic-title">
                    <div>Track V: Ensuring health intervention through the Indian Knowledge System</div>
                </h3>
                <ul class="premium-topic-list">
                    <li><i class="fa-solid fa-check"></i> <span>Traditional Healthcare Systems (Siddha, Ayurveda, Yoga, Unani and Folk Medicine)</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Ethnomedicine and Community Health Practices</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Medicinal Plants and Natural Product Research</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Traditional Food Systems, Nutrition and Functional Foods</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Biodiversity Conservation and Indigenous Ecological Knowledge</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Validation of Traditional Knowledge through Modern Science</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Integrative Medicine and Precision Traditional Therapeutics</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>One Health Perspectives in Indian Knowledge Systems</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Digital Documentation and Preservation of Indigenous Knowledge</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Policy, Ethics and Intellectual Property Rights in Traditional Knowledge</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>AI and Omics Approaches for Traditional Medicine Research</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Translational Research and Commercialization of IKS-based Innovations</span></li>
                </ul>
            </div>

            <div class="premium-topic-card">
                <h3 class="premium-topic-title">
                    <div>Track VI: Regenerative Health: Redefining Industrial One Health Paradigms</div>
                </h3>
                <ul class="premium-topic-list">
                    <li><i class="fa-solid fa-check"></i> <span>Responsible Pharmaceutical Manufacturing</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Next-Generation Veterinary Biologics</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Green Agrochemicals & Biopesticides</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Corporate Stewardship & Supply Chain Resilience</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Venture Capital in Planetary Health</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Cross-Sectoral Commercial Collaboration</span></li>
                    <li><i class="fa-solid fa-check"></i> <span>Integrating comprehensive One Health metrics into Environmental, Social, and Governance (ESG) corporate reporting standards</span></li>
                </ul>
            </div>
HTML;

$startPos = strpos($content, '<div class="thrust-grid-alt">');
$endPos = strpos($content, '</div>', strpos($content, '<div class="premium-topic-card">', $startPos));
// Actually, it's safer to find the closing div of thrust-grid-alt.
$pattern = '/<div class="thrust-grid-alt">.*?<\/div>\s*<\/div>\s*<\/div>/s';
// Wait, regex might be tricky. Let's just find exactly what we need.

// Line 176 is just after <div class="thrust-grid-alt">
// Line 270 is the closing </div> for the last premium-topic-card.
// I can just replace by reading lines.

$lines = file($file);
$out = [];
$skip = false;
foreach ($lines as $i => $line) {
    if (trim($line) === '<div class="thrust-grid-alt">') {
        $out[] = $line;
        $out[] = $newTracks . "\n";
        $skip = true;
        continue;
    }
    if ($skip && trim($line) === '</div>' && trim($lines[$i+1] ?? '') === '</div>' && trim($lines[$i+2] ?? '') === '</section>') {
        $skip = false;
        // this is the closing tag for thrust-grid-alt
        $out[] = $line;
        continue;
    }
    if (!$skip) {
        $out[] = $line;
    }
}

file_put_contents($file, implode("", $out));
echo "Successfully updated thrust-areas.blade.php\n";
