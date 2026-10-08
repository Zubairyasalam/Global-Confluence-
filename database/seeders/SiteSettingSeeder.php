<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = array (
  0 => 
  array (
    'key' => 'contact_email',
    'value' => 'gohc2026@gmail.com',
    'type' => 'text',
    'group' => 'contact',
    'label' => 'Contact Email',
  ),
  1 => 
  array (
    'key' => 'contact_phone',
    'value' => '+91 9876543210',
    'type' => 'text',
    'group' => 'contact',
    'label' => 'Contact Phone',
  ),
  2 => 
  array (
    'key' => 'contact_address',
    'value' => 'Madras Christian College, Tambaram, Chennai',
    'type' => 'text',
    'group' => 'contact',
    'label' => 'Address',
  ),
  3 => 
  array (
    'key' => 'topbar_format',
    'value' => 'Online | In-person',
    'type' => 'text',
    'group' => 'contact',
    'label' => 'Event Format (Topbar)',
  ),
  4 => 
  array (
    'key' => 'hero_title',
    'value' => 'GLOBAL ONE HEALTH CONFLUENCE  2026',
    'type' => 'textarea',
    'group' => 'hero',
    'label' => 'Main Heading',
  ),
  5 => 
  array (
    'key' => 'hero_subtitle',
    'value' => 'Bridging Microbes, Molecules & Mankind for Sustainability',
    'type' => 'text',
    'group' => 'hero',
    'label' => 'Subtitle',
  ),
  6 => 
  array (
    'key' => 'hero_organized_by',
    'value' => 'Jointly organized by Department of Microbiology & Department of Chemistry (SFS), Madras Christian College',
    'type' => 'text',
    'group' => 'hero',
    'label' => 'Organized By',
  ),
  7 => 
  array (
    'key' => 'hero_dates',
    'value' => '21st and 22nd December 2026',
    'type' => 'text',
    'group' => 'hero',
    'label' => 'Event Dates',
  ),
  8 => 
  array (
    'key' => 'hero_location',
    'value' => 'Madras Christian College, Chennai',
    'type' => 'text',
    'group' => 'hero',
    'label' => 'Event Location',
  ),
  9 => 
  array (
    'key' => 'about_conference',
    'value' => 'The Global One Health Confluence 2026 is envisioned as a flagship international interdisciplinary forum that brings together leading scientists, academicians, clinicians, policymakers, industry leaders, innovators, entrepreneurs, and students to address emerging global health challenges through the One Health framework.

Recognizing the intricate interdependence between human health, animal health, environmental sustainability, and technological innovation, the conference seeks to foster scientific dialogue, collaborative research, translational innovation, and policy engagement. The event aligns with the United Nations Sustainable Development Goals (SDGs) and India\'s vision of promoting sustainable, inclusive, and evidence-based solutions for future health security.

Organized by the Departments of Microbiology and Chemistry (SFS), Madras Christian College, in collaboration with reputed national and international institutions, professional societies, research organizations, healthcare institutions, and industry partners, this confluence will serve as a premier platform for knowledge exchange, interdisciplinary networking, innovation showcasing, and strategic collaborations.',
    'type' => 'textarea',
    'group' => 'about',
    'label' => 'About Conference',
  ),
  10 => 
  array (
    'key' => 'about_mission',
    'value' => 'To connect researchers, thought leaders, and institutions through impactful events that inspire knowledge-sharing and real-world solutions.',
    'type' => 'textarea',
    'group' => 'about',
    'label' => 'Our Mission',
  ),
  11 => 
  array (
    'key' => 'about_vision',
    'value' => 'To build a global platform that showcases research, fosters collaboration, and drives innovation across disciplines.',
    'type' => 'textarea',
    'group' => 'about',
    'label' => 'Our Vision',
  ),
  12 => 
  array (
    'key' => 'about_mcc',
    'value' => 'Madras Christian College (MCC) is one of India’s premier educational institutions, founded by Scottish missionaries in 1837. Over the years, it has evolved into an institution committed to academic excellence, spiritual vitality, and social relevance.

In 2018, MCC was re-accredited by NAAC with an \'A\' Grade and ranks 14th in the NIRF rankings, reflecting its high academic standards, robust research output, and unwavering dedication to quality education.

MCC established the MCC Boyd-Tandon School of Business in 2016 with the vision of providing world-class business education. The Centre for Computational Informatics serves as a research hub dedicated to advancing computational science through cutting-edge research, impactful collaborations, and hands-on training.

To further strengthen innovation and entrepreneurship, MCC launched the Institution’s Innovation Council in 2020 and the MCC-MRF Innovation Park (MMIP) in 2021. These initiatives foster advanced research, support innovation-driven startups, and nurture the next generation of entrepreneurs.',
    'type' => 'textarea',
    'group' => 'about',
    'label' => 'About Madras Christian College',
  ),
  13 => 
  array (
    'key' => 'about_dept',
    'value' => 'The Department of Microbiology at Madras Christian College (MCC) was established in 2002 and has earned recognition for its academic excellence, leadership development, and commitment to research and social relevance.

The department offers a dynamic curriculum designed to equip students with the knowledge and skills required to explore emerging opportunities in the field of Microbiology, preparing them for both research and industry careers.

Since 2018, the department has been a full-fledged research unit offering Ph.D. programmes in Microbiology and Applied Microbiology. Research activities span diverse disciplines within Microbiology, including areas aligned with the conference themes and emerging scientific developments.

The department is widely recognized for its strong industry-academia collaborations, faculty and student-driven innovations, active research contributions, and a culture that encourages intellectual property creation and patent development.',
    'type' => 'textarea',
    'group' => 'about',
    'label' => 'About Department of Microbiology',
  ),
  14 => 
  array (
    'key' => 'mcc_stat1_title',
    'value' => '1837',
    'type' => 'text',
    'group' => 'about',
    'label' => 'MCC Stat 1 (Title)',
  ),
  15 => 
  array (
    'key' => 'mcc_stat1_sub',
    'value' => 'Founded In',
    'type' => 'text',
    'group' => 'about',
    'label' => 'MCC Stat 1 (Subtitle)',
  ),
  16 => 
  array (
    'key' => 'mcc_stat2_title',
    'value' => '\'A\' Grade',
    'type' => 'text',
    'group' => 'about',
    'label' => 'MCC Stat 2 (Title)',
  ),
  17 => 
  array (
    'key' => 'mcc_stat2_sub',
    'value' => 'NAAC Accredited',
    'type' => 'text',
    'group' => 'about',
    'label' => 'MCC Stat 2 (Subtitle)',
  ),
  18 => 
  array (
    'key' => 'mcc_stat3_title',
    'value' => 'Rank 14',
    'type' => 'text',
    'group' => 'about',
    'label' => 'MCC Stat 3 (Title)',
  ),
  19 => 
  array (
    'key' => 'mcc_stat3_sub',
    'value' => 'NIRF Rankings',
    'type' => 'text',
    'group' => 'about',
    'label' => 'MCC Stat 3 (Subtitle)',
  ),
  20 => 
  array (
    'key' => 'about_simats',
    'value' => 'Saveetha Institute of Medical and Technical Sciences (SIMATS) is a prestigious Deemed-to-be-University located in Chennai, Tamil Nadu. Established in 2005, SIMATS has rapidly grown into a premier multidisciplinary institution offering high-quality education and research across Medicine, Dentistry, Engineering, Law, and Allied Health Sciences.

SIMATS is accredited by NAAC with the highest \'A++\' Grade, signifying its world-class teaching standards, state-of-the-art infrastructure, and strong emphasis on research and development. The university ranks 11th in the \'University\' category under the National Institutional Ranking Framework (NIRF) in 2024.

With a focus on innovation and clinical excellence, SIMATS hosts advanced simulation labs, comprehensive research centers, and maintains active collaborations with top international institutions and industry leaders globally.',
    'type' => 'textarea',
    'group' => 'about',
    'label' => 'About SIMATS',
  ),
  21 => 
  array (
    'key' => 'simats_stat1_title',
    'value' => '2005',
    'type' => 'text',
    'group' => 'about',
    'label' => 'SIMATS Stat 1 (Title)',
  ),
  22 => 
  array (
    'key' => 'simats_stat1_sub',
    'value' => 'Established',
    'type' => 'text',
    'group' => 'about',
    'label' => 'SIMATS Stat 1 (Subtitle)',
  ),
  23 => 
  array (
    'key' => 'simats_stat2_title',
    'value' => '\'A++\' Grade',
    'type' => 'text',
    'group' => 'about',
    'label' => 'SIMATS Stat 2 (Title)',
  ),
  24 => 
  array (
    'key' => 'simats_stat2_sub',
    'value' => 'NAAC Accredited',
    'type' => 'text',
    'group' => 'about',
    'label' => 'SIMATS Stat 2 (Subtitle)',
  ),
  25 => 
  array (
    'key' => 'simats_stat3_title',
    'value' => 'Rank 11',
    'type' => 'text',
    'group' => 'about',
    'label' => 'SIMATS Stat 3 (Title)',
  ),
  26 => 
  array (
    'key' => 'simats_stat3_sub',
    'value' => 'NIRF University',
    'type' => 'text',
    'group' => 'about',
    'label' => 'SIMATS Stat 3 (Subtitle)',
  ),
  27 => 
  array (
    'key' => 'about_chemistry',
    'value' => 'The Department of Chemistry (Self-Financed Stream - SFS) at Madras Christian College (MCC) was established in 2003 to provide comprehensive and industry-relevant chemical education. The department offers a highly sought-after M.Sc. in Chemistry program designed to bridge theoretical concepts with experimental application.

The curriculum is structured around modern developments in chemical sciences, covering advanced organic, inorganic, physical, analytical, and environmental chemistry. With well-equipped dedicated laboratories and independent research infrastructure, students are exposed to hands-on training and advanced analytical instrumentation.

To prepare students for professional success, the department fosters collaborations with national research laboratories and leading pharmaceutical and chemical industries, enabling students to undertake high-impact academic projects and internship opportunities.',
    'type' => 'textarea',
    'group' => 'about',
    'label' => 'About Department of Chemistry (SFS)',
  ),
  28 => 
  array (
    'key' => 'participants_desc',
    'value' => 'Join the confluence to bridge microbes, molecules & mankind for a sustainable future.',
    'type' => 'textarea',
    'group' => 'participants',
    'label' => 'Section Description',
  ),
  29 => 
  array (
    'key' => 'participant_1',
    'value' => 'Students &
Research Scholars',
    'type' => 'textarea',
    'group' => 'participants',
    'label' => 'Participant Type 1',
  ),
  30 => 
  array (
    'key' => 'participant_2',
    'value' => 'Academicians &
Policy Makers',
    'type' => 'textarea',
    'group' => 'participants',
    'label' => 'Participant Type 2',
  ),
  31 => 
  array (
    'key' => 'participant_3',
    'value' => 'Research
Scientists',
    'type' => 'textarea',
    'group' => 'participants',
    'label' => 'Participant Type 3',
  ),
  32 => 
  array (
    'key' => 'participant_4',
    'value' => 'Health
Professionals',
    'type' => 'text',
    'group' => 'participants',
    'label' => 'Participant Type 4',
  ),
  33 => 
  array (
    'key' => 'participant_5',
    'value' => 'Industry Experts
(Pharma & Health)',
    'type' => 'text',
    'group' => 'participants',
    'label' => 'Participant Type 5',
  ),
  34 => 
  array (
    'key' => 'workshop_title',
    'value' => 'Hands-On Metagenomics',
    'type' => 'text',
    'group' => 'workshop',
    'label' => 'Main Title',
  ),
  35 => 
  array (
    'key' => 'workshop_desc',
    'value' => 'Join us for an exclusive one-day hands-on workshop on the day before the main conference. Participants will gain practical skills in metagenomic data analysis—from quality control and community profiling to assembly and visualization using tools like QIIME2 and relevant datasets.

Perfect for students, researchers, and faculty looking to strengthen their bioinformatics toolkit.',
    'type' => 'textarea',
    'group' => 'workshop',
    'label' => 'Description',
  ),
  36 => 
  array (
    'key' => 'workshop_f1_title',
    'value' => 'Practical Skills',
    'type' => 'text',
    'group' => 'workshop',
    'label' => 'Feature 1 Title',
  ),
  37 => 
  array (
    'key' => 'workshop_f1_desc',
    'value' => 'Learn quality control, community profiling, and assembly.',
    'type' => 'text',
    'group' => 'workshop',
    'label' => 'Feature 1 Description',
  ),
  38 => 
  array (
    'key' => 'workshop_f2_title',
    'value' => 'Industry Tools',
    'type' => 'text',
    'group' => 'workshop',
    'label' => 'Feature 2 Title',
  ),
  39 => 
  array (
    'key' => 'workshop_f2_desc',
    'value' => 'Hands-on visualization using tools like QIIME2 and real datasets.',
    'type' => 'text',
    'group' => 'workshop',
    'label' => 'Feature 2 Description',
  ),
  40 => 
  array (
    'key' => 'workshop_f3_title',
    'value' => 'Bioinformatics Toolkit',
    'type' => 'text',
    'group' => 'workshop',
    'label' => 'Feature 3 Title',
  ),
  41 => 
  array (
    'key' => 'workshop_f3_desc',
    'value' => 'Designed specifically for students, researchers, and faculty.',
    'type' => 'text',
    'group' => 'workshop',
    'label' => 'Feature 3 Description',
  ),
  42 => 
  array (
    'key' => 'thrust_areas_desc',
    'value' => 'Explore the latest advancements, critical challenges, and future innovations across our core diagnostic and scientific themes.',
    'type' => 'textarea',
    'group' => 'thrust_areas',
    'label' => 'Section Description',
  ),
  43 => 
  array (
    'key' => 'thrust_1',
    'value' => 'Artificial intelligence in infectious disease diagnostics',
    'type' => 'text',
    'group' => 'thrust_areas',
    'label' => 'Theme 1',
  ),
  44 => 
  array (
    'key' => 'thrust_2',
    'value' => 'AI in diagnostic microbiology',
    'type' => 'text',
    'group' => 'thrust_areas',
    'label' => 'Theme 2',
  ),
  45 => 
  array (
    'key' => 'thrust_3',
    'value' => 'Molecular diagnostics and genomics',
    'type' => 'text',
    'group' => 'thrust_areas',
    'label' => 'Theme 3',
  ),
  46 => 
  array (
    'key' => 'thrust_4',
    'value' => 'Digital health and intelligent systems',
    'type' => 'text',
    'group' => 'thrust_areas',
    'label' => 'Theme 4',
  ),
  47 => 
  array (
    'key' => 'thrust_5',
    'value' => 'Clinical applications and future directions',
    'type' => 'text',
    'group' => 'thrust_areas',
    'label' => 'Theme 5',
  ),
  48 => 
  array (
    'key' => 'thrust_6',
    'value' => 'Antimicrobial resistance and rapid detection',
    'type' => 'text',
    'group' => 'thrust_areas',
    'label' => 'Theme 6',
  ),
  49 => 
  array (
    'key' => 'thrust_7',
    'value' => 'Emerging infectious diseases',
    'type' => 'text',
    'group' => 'thrust_areas',
    'label' => 'Theme 7',
  ),
  50 => 
  array (
    'key' => 'thrust_8',
    'value' => 'Point-of-care diagnostics',
    'type' => 'text',
    'group' => 'thrust_areas',
    'label' => 'Theme 8',
  ),
  51 => 
  array (
    'key' => 'thrust_9',
    'value' => 'Clinical case studies',
    'type' => 'text',
    'group' => 'thrust_areas',
    'label' => 'Theme 9',
  ),
  52 => 
  array (
    'key' => 'abstract_desc_1',
    'value' => 'Abstracts are invited for original research work that has not been published or submitted elsewhere.',
    'type' => 'textarea',
    'group' => 'abstract',
    'label' => 'Description Paragraph 1',
  ),
  53 => 
  array (
    'key' => 'abstract_desc_2',
    'value' => 'Students, research scholars, faculty members, and industry participants may submit abstracts for <strong>oral and/or poster presentations</strong>.',
    'type' => 'textarea',
    'group' => 'abstract',
    'label' => 'Description Paragraph 2',
  ),
  54 => 
  array (
    'key' => 'abstract_req_font',
    'value' => 'Times New Roman, Size 12',
    'type' => 'text',
    'group' => 'abstract',
    'label' => 'Font Requirement',
  ),
  55 => 
  array (
    'key' => 'abstract_req_spacing',
    'value' => '1.5 line spacing',
    'type' => 'text',
    'group' => 'abstract',
    'label' => 'Spacing Requirement',
  ),
  56 => 
  array (
    'key' => 'abstract_req_length',
    'value' => 'Maximum of 250 words',
    'type' => 'text',
    'group' => 'abstract',
    'label' => 'Length Requirement',
  ),
  57 => 
  array (
    'key' => 'abstract_req_keywords',
    'value' => 'Maximum of 5 keywords',
    'type' => 'text',
    'group' => 'abstract',
    'label' => 'Keywords Requirement',
  ),
  58 => 
  array (
    'key' => 'awards_desc',
    'value' => 'To recognize outstanding research contributions, we are proud to present awards for the most exceptional presentations at the summit.',
    'type' => 'textarea',
    'group' => 'awards',
    'label' => 'Description',
  ),
  59 => 
  array (
    'key' => 'awards_oral_title',
    'value' => 'Best Oral Presentation',
    'type' => 'text',
    'group' => 'awards',
    'label' => 'Oral Award Title',
  ),
  60 => 
  array (
    'key' => 'awards_oral_desc',
    'value' => 'Awarded to the most impactful and articulate oral research presentation.',
    'type' => 'text',
    'group' => 'awards',
    'label' => 'Oral Award Description',
  ),
  61 => 
  array (
    'key' => 'awards_poster_title',
    'value' => 'Best Poster Award',
    'type' => 'text',
    'group' => 'awards',
    'label' => 'Poster Award Title',
  ),
  62 => 
  array (
    'key' => 'awards_poster_desc',
    'value' => 'Awarded for outstanding visual communication and scientific clarity.',
    'type' => 'text',
    'group' => 'awards',
    'label' => 'Poster Award Description',
  ),
  63 => 
  array (
    'key' => 'venue_discover_title',
    'value' => 'Discover Madras Christian College',
    'type' => 'text',
    'group' => 'venue',
    'label' => 'Discover Title',
  ),
  64 => 
  array (
    'key' => 'venue_discover_text',
    'value' => 'Founded in 1837, Madras Christian College (MCC) is one of Asia\'s oldest and most prestigious academic institutions. Set within a sprawling, lush 320-acre scrub jungle campus in Tambaram, Chennai, MCC offers a serene, intellectually stimulating environment that provides a perfect backdrop for international conferences, global collaboration, and cutting-edge scientific exchange.',
    'type' => 'textarea',
    'group' => 'venue',
    'label' => 'Discover Text',
  ),
  65 => 
  array (
    'key' => 'venue_heritage_title',
    'value' => 'A Hub of Heritage & Innovation',
    'type' => 'text',
    'group' => 'venue',
    'label' => 'Heritage Title',
  ),
  66 => 
  array (
    'key' => 'venue_heritage_text',
    'value' => 'MCC seamlessly blends a rich historical legacy with modern scientific inquiry. With a profound history of producing renowned scholars, researchers, and global leaders, the institution continues to foster excellence. Its proximity to prominent research hubs in Chennai and its own state-of-the-art facilities make it an ideal meeting point for the BioMed Summit 2027.',
    'type' => 'textarea',
    'group' => 'venue',
    'label' => 'Heritage Text',
  ),
  67 => 
  array (
    'key' => 'venue_biodiversity_title',
    'value' => 'Campus Biodiversity & Environment',
    'type' => 'text',
    'group' => 'venue',
    'label' => 'Biodiversity Title',
  ),
  68 => 
  array (
    'key' => 'venue_biodiversity_text',
    'value' => 'The MCC campus is a documented sanctuary of rare flora and fauna, providing delegates with a refreshing escape from the urban hustle. During the conference, attendees can enjoy:',
    'type' => 'textarea',
    'group' => 'venue',
    'label' => 'Biodiversity Text',
  ),
  69 => 
  array (
    'key' => 'venue_biodiversity_list',
    'value' => 'Exploring the expansive, protected scrub jungle ecosystem
Historic British-era architectural landmarks seamlessly integrated with modern halls
A tranquil, pollution-free atmosphere ideal for focused scientific networking
The vibrant cultural heritage and traditional South Indian hospitality of Chennai',
    'type' => 'textarea',
    'group' => 'venue',
    'label' => 'Biodiversity Bullets (One per line)',
  ),
  70 => 
  array (
    'key' => 'venue_accessibility_title',
    'value' => 'Easy Accessibility',
    'type' => 'text',
    'group' => 'venue',
    'label' => 'Accessibility Title',
  ),
  71 => 
  array (
    'key' => 'venue_accessibility_text',
    'value' => 'Located in the bustling metropolis of Chennai, MCC is exceptionally well-connected. It is easily accessible via the Chennai International Airport (MAA), which offers direct flights worldwide. Furthermore, the Tambaram Railway Station and major transit hubs are situated directly opposite the campus, ensuring seamless domestic and international travel for all delegates.',
    'type' => 'textarea',
    'group' => 'venue',
    'label' => 'Accessibility Text',
  ),
  72 => 
  array (
    'key' => 'venue_facilities_title',
    'value' => 'World-Class Conference Facilities',
    'type' => 'text',
    'group' => 'venue',
    'label' => 'Facilities Title',
  ),
  73 => 
  array (
    'key' => 'venue_facilities_text',
    'value' => 'MCC boasts a wide array of premium venues, including historic grand auditoriums and highly equipped modern smart-halls. With advanced audio-visual technology, high-speed connectivity, and spacious seating, the campus provides a highly professional, comfortable, and accommodating environment for large-scale plenary sessions and specialized workshops alike.',
    'type' => 'textarea',
    'group' => 'venue',
    'label' => 'Facilities Text',
  ),
  74 => 
  array (
    'key' => 'awards_intro',
    'value' => 'At Biomed Summit, we celebrate the spirit of research, innovation, and academic excellence. To foster advancement and honor exceptional contributions, we proudly present the Conference Awards to outstanding researchers, scholars, and innovators.',
    'type' => 'textarea',
    'group' => 'awards_page',
    'label' => 'Intro Paragraph',
  ),
  75 => 
  array (
    'key' => 'sponsors_intro',
    'value' => 'Partnering with us as a sponsor or exhibitor gives your organization a unique opportunity to stand at the forefront of global innovation. Our international summits connect you directly with leading researchers, decision-makers, and industry pioneers — offering high-value visibility, strategic networking, and brand credibility. From showcasing your latest innovations to forging meaningful collaborations, this is your chance to amplify your impact, generate quality leads, and position your brand where the future is being shaped.',
    'type' => 'textarea',
    'group' => 'sponsors',
    'label' => 'Intro Paragraph',
  ),
  76 => 
  array (
    'key' => 'sponsors_benefits',
    'value' => 'Enhance your brand visibility among international audiences
Showcase your technologies, products, or services to leading institutions and professionals
Connect directly with key decision-makers and industry influencers
Build global partnerships and collaborative networks
Participate in high-value networking sessions, panels, and technical discussions
Receive branding across digital, print, and on-site materials
Generate qualified leads and accelerate business development
Establish your brand as a thought leader in your industry',
    'type' => 'textarea',
    'group' => 'sponsors',
    'label' => 'Key Benefits',
  ),
  77 => 
  array (
    'key' => 'hero_bg_image',
    'value' => 'images/hero-bg.png',
    'type' => 'image',
    'group' => 'hero',
    'label' => 'Hero Background Image',
  ),
  78 => 
  array (
    'key' => 'objectives_desc',
    'value' => 'The Global One Health Confluence 2026 brings together leaders in science, policy, and practice to address our most pressing health challenges through a unified interdisciplinary approach.',
    'type' => 'textarea',
    'group' => 'objectives',
    'label' => 'Section Description',
  ),
  79 => 
  array (
    'key' => 'obj_1_title',
    'value' => 'Promote Interdisciplinary Collaboration',
    'type' => 'text',
    'group' => 'objectives',
    'label' => 'Objective 1 Title',
  ),
  80 => 
  array (
    'key' => 'obj_1_desc',
    'value' => 'To promote interdisciplinary collaboration across microbiology, health and sustainability.',
    'type' => 'textarea',
    'group' => 'objectives',
    'label' => 'Objective 1 Description',
  ),
  81 => 
  array (
    'key' => 'obj_2_title',
    'value' => 'Discuss Emerging Challenges',
    'type' => 'text',
    'group' => 'objectives',
    'label' => 'Objective 2 Title',
  ),
  82 => 
  array (
    'key' => 'obj_2_desc',
    'value' => 'To discuss emerging challenges and innovative solutions through global scientific discourse.',
    'type' => 'textarea',
    'group' => 'objectives',
    'label' => 'Objective 2 Description',
  ),
  83 => 
  array (
    'key' => 'obj_3_title',
    'value' => 'Encourage Research Translation',
    'type' => 'text',
    'group' => 'objectives',
    'label' => 'Objective 3 Title',
  ),
  84 => 
  array (
    'key' => 'obj_3_desc',
    'value' => 'To encourage research translation for real-world applications and impact.',
    'type' => 'textarea',
    'group' => 'objectives',
    'label' => 'Objective 3 Description',
  ),
  85 => 
  array (
    'key' => 'obj_4_title',
    'value' => 'Foster Global Partnerships',
    'type' => 'text',
    'group' => 'objectives',
    'label' => 'Objective 4 Title',
  ),
  86 => 
  array (
    'key' => 'obj_4_desc',
    'value' => 'To foster global partnerships for a One Health and sustainable future.',
    'type' => 'textarea',
    'group' => 'objectives',
    'label' => 'Objective 4 Description',
  ),
  87 => 
  array (
    'key' => 'pillars_title',
    'value' => 'Five Pillars of the Confluence',
    'type' => 'text',
    'group' => 'pillars',
    'label' => 'Section Title',
  ),
  88 => 
  array (
    'key' => 'pillars_subtitle',
    'value' => 'Interdisciplinary framework driving sustainable global health through science, policy & partnership',
    'type' => 'textarea',
    'group' => 'pillars',
    'label' => 'Section Subtitle',
  ),
  89 => 
  array (
    'key' => 'pillar_1_tag',
    'value' => 'Research',
    'type' => 'text',
    'group' => 'pillars',
    'label' => 'Pillar 1 Tag',
  ),
  90 => 
  array (
    'key' => 'pillar_1_title',
    'value' => 'Scientific Excellence',
    'type' => 'text',
    'group' => 'pillars',
    'label' => 'Pillar 1 Title',
  ),
  91 => 
  array (
    'key' => 'pillar_1_desc',
    'value' => 'Facilitating high-quality interdisciplinary scientific discourse spanning microbiology, chemistry, biotechnology, environmental sciences, public health, and molecular medicine.',
    'type' => 'textarea',
    'group' => 'pillars',
    'label' => 'Pillar 1 Description',
  ),
  92 => 
  array (
    'key' => 'pillar_1_icon',
    'value' => 'fa-solid fa-microscope',
    'type' => 'text',
    'group' => 'pillars',
    'label' => 'Pillar 1 Icon',
  ),
  93 => 
  array (
    'key' => 'pillar_2_tag',
    'value' => 'Innovation',
    'type' => 'text',
    'group' => 'pillars',
    'label' => 'Pillar 2 Tag',
  ),
  94 => 
  array (
    'key' => 'pillar_2_title',
    'value' => 'Translational Innovation',
    'type' => 'text',
    'group' => 'pillars',
    'label' => 'Pillar 2 Title',
  ),
  95 => 
  array (
    'key' => 'pillar_2_desc',
    'value' => 'Promoting research translation through biotechnology, diagnostics, biosensors, sustainable chemistry, advanced materials, green technologies, and circular bioeconomy.',
    'type' => 'textarea',
    'group' => 'pillars',
    'label' => 'Pillar 2 Description',
  ),
  96 => 
  array (
    'key' => 'pillar_2_icon',
    'value' => 'fa-solid fa-flask-vial',
    'type' => 'text',
    'group' => 'pillars',
    'label' => 'Pillar 2 Icon',
  ),
  97 => 
  array (
    'key' => 'pillar_3_tag',
    'value' => 'Policy',
    'type' => 'text',
    'group' => 'pillars',
    'label' => 'Pillar 3 Tag',
  ),
  98 => 
  array (
    'key' => 'pillar_3_title',
    'value' => 'Policy & Governance',
    'type' => 'text',
    'group' => 'pillars',
    'label' => 'Pillar 3 Title',
  ),
  99 => 
  array (
    'key' => 'pillar_3_desc',
    'value' => 'Strengthening dialogue among researchers, policymakers, governmental agencies, and international organizations for evidence-informed health governance.',
    'type' => 'textarea',
    'group' => 'pillars',
    'label' => 'Pillar 3 Description',
  ),
  100 => 
  array (
    'key' => 'pillar_3_icon',
    'value' => 'fa-solid fa-scale-balanced',
    'type' => 'text',
    'group' => 'pillars',
    'label' => 'Pillar 3 Icon',
  ),
  101 => 
  array (
    'key' => 'pillar_4_tag',
    'value' => 'Heritage',
    'type' => 'text',
    'group' => 'pillars',
    'label' => 'Pillar 4 Tag',
  ),
  102 => 
  array (
    'key' => 'pillar_4_title',
    'value' => 'Indigenous Integration',
    'type' => 'text',
    'group' => 'pillars',
    'label' => 'Pillar 4 Title',
  ),
  103 => 
  array (
    'key' => 'pillar_4_desc',
    'value' => 'Exploring the role of Indian Knowledge Systems and traditional healthcare practices in complementing modern One Health approaches.',
    'type' => 'textarea',
    'group' => 'pillars',
    'label' => 'Pillar 4 Description',
  ),
  104 => 
  array (
    'key' => 'pillar_4_icon',
    'value' => 'fa-solid fa-leaf',
    'type' => 'text',
    'group' => 'pillars',
    'label' => 'Pillar 4 Icon',
  ),
  105 => 
  array (
    'key' => 'pillar_5_tag',
    'value' => 'Network',
    'type' => 'text',
    'group' => 'pillars',
    'label' => 'Pillar 5 Tag',
  ),
  106 => 
  array (
    'key' => 'pillar_5_title',
    'value' => 'Global Partnerships',
    'type' => 'text',
    'group' => 'pillars',
    'label' => 'Pillar 5 Title',
  ),
  107 => 
  array (
    'key' => 'pillar_5_desc',
    'value' => 'Building long-term collaborative networks among academia, healthcare, industry, research institutions, and international organizations.',
    'type' => 'textarea',
    'group' => 'pillars',
    'label' => 'Pillar 5 Description',
  ),
  108 => 
  array (
    'key' => 'pillar_5_icon',
    'value' => 'fa-solid fa-earth-americas',
    'type' => 'text',
    'group' => 'pillars',
    'label' => 'Pillar 5 Icon',
  ),
  109 => 
  array (
    'key' => 'hero_btn1_text',
    'value' => 'REGISTER NOW',
    'type' => 'text',
    'group' => 'hero',
    'label' => 'Primary Button Text',
  ),
  110 => 
  array (
    'key' => 'hero_btn1_link',
    'value' => '/registration',
    'type' => 'text',
    'group' => 'hero',
    'label' => 'Primary Button Link',
  ),
  111 => 
  array (
    'key' => 'hero_btn2_text',
    'value' => 'APPLY FOR AWARDS',
    'type' => 'text',
    'group' => 'hero',
    'label' => 'Secondary Button Text',
  ),
  112 => 
  array (
    'key' => 'hero_btn2_link',
    'value' => '/awards',
    'type' => 'text',
    'group' => 'hero',
    'label' => 'Secondary Button Link',
  ),
  113 => 
  array (
    'key' => 'obj_5_title',
    'value' => 'Knowledge Exchange',
    'type' => 'text',
    'group' => 'objectives',
    'label' => 'Objective 5 Title',
  ),
  114 => 
  array (
    'key' => 'obj_5_desc',
    'value' => 'Provide a platform for knowledge exchange and networking, empowering researchers, students and innovators to showcase impactful research.',
    'type' => 'textarea',
    'group' => 'objectives',
    'label' => 'Objective 5 Description',
  ),
  115 => 
  array (
    'key' => 'org_section_subtitle',
    'value' => 'About The Organizers',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Section Subtitle',
  ),
  116 => 
  array (
    'key' => 'org_section_title',
    'value' => 'Host Institutions & Departments',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Section Title',
  ),
  117 => 
  array (
    'key' => 'mcc_tab_title',
    'value' => 'Madras Christian College',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'MCC Tab Nav Title',
  ),
  118 => 
  array (
    'key' => 'mcc_tab_sub',
    'value' => 'MCC • Chennai',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'MCC Tab Nav Subtitle',
  ),
  119 => 
  array (
    'key' => 'mcc_tag',
    'value' => 'Madras Christian College',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'MCC Tagline',
  ),
  120 => 
  array (
    'key' => 'mcc_title',
    'value' => 'A Legacy of Academic Excellence',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'MCC Title',
  ),
  121 => 
  array (
    'key' => 'mcc_p1',
    'value' => 'Madras Christian College (MCC), established in 1837, is one of India\'s premier institutions of higher learning with a rich heritage of academic excellence, character formation and nation building.',
    'type' => 'textarea',
    'group' => 'about_organizer',
    'label' => 'MCC Paragraph 1',
  ),
  122 => 
  array (
    'key' => 'mcc_p2',
    'value' => 'Affiliated to the University of Madras and accredited with \'A\' Grade by NAAC, MCC offers a vibrant environment for holistic education across disciplines.',
    'type' => 'textarea',
    'group' => 'about_organizer',
    'label' => 'MCC Paragraph 2',
  ),
  123 => 
  array (
    'key' => 'mcc_p3',
    'value' => 'The Department of Microbiology at MCC has a strong legacy of quality teaching, innovative research and contributions to the advancement of microbial sciences with a focus on societal impact and global relevance.',
    'type' => 'textarea',
    'group' => 'about_organizer',
    'label' => 'MCC Paragraph 3',
  ),
  124 => 
  array (
    'key' => 'mcc_feat1_title',
    'value' => 'ESTABLISHED IN 1837',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Highlight 1 Title',
  ),
  125 => 
  array (
    'key' => 'mcc_feat1_sub',
    'value' => 'A legacy of 189 years of academic excellence',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Highlight 1 Subtitle',
  ),
  126 => 
  array (
    'key' => 'mcc_feat1_icon',
    'value' => 'fa-solid fa-landmark',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Highlight 1 Icon',
  ),
  127 => 
  array (
    'key' => 'mcc_feat2_title',
    'value' => '\'A\' GRADE BY NAAC',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Highlight 2 Title',
  ),
  128 => 
  array (
    'key' => 'mcc_feat2_sub',
    'value' => 'Recognized for quality and institutional excellence',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Highlight 2 Subtitle',
  ),
  129 => 
  array (
    'key' => 'mcc_feat2_icon',
    'value' => 'fa-solid fa-award',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Highlight 2 Icon',
  ),
  130 => 
  array (
    'key' => 'mcc_feat3_title',
    'value' => 'AUTONOMOUS INSTITUTION',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Highlight 3 Title',
  ),
  131 => 
  array (
    'key' => 'mcc_feat3_sub',
    'value' => 'Affiliated to the University of Madras',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Highlight 3 Subtitle',
  ),
  132 => 
  array (
    'key' => 'mcc_feat3_icon',
    'value' => 'fa-solid fa-graduation-cap',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Highlight 3 Icon',
  ),
  133 => 
  array (
    'key' => 'mcc_feat4_title',
    'value' => 'HOLISTIC EDUCATION',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Highlight 4 Title',
  ),
  134 => 
  array (
    'key' => 'mcc_feat4_sub',
    'value' => 'Nurturing intellect, character and leadership',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Highlight 4 Subtitle',
  ),
  135 => 
  array (
    'key' => 'mcc_feat4_icon',
    'value' => 'fa-solid fa-users',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Highlight 4 Icon',
  ),
  136 => 
  array (
    'key' => 'mcc_feat5_title',
    'value' => 'RESEARCH & INNOVATION',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Highlight 5 Title',
  ),
  137 => 
  array (
    'key' => 'mcc_feat5_sub',
    'value' => 'Encouraging impactful research for a better world',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Highlight 5 Subtitle',
  ),
  138 => 
  array (
    'key' => 'mcc_feat5_icon',
    'value' => 'fa-solid fa-microscope',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Highlight 5 Icon',
  ),
  139 => 
  array (
    'key' => 'mmip_tab_title',
    'value' => 'MCC-MRF Innovation Park',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'MMIP Tab Nav Title',
  ),
  140 => 
  array (
    'key' => 'mmip_tab_sub',
    'value' => 'MMIP',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'MMIP Tab Nav Subtitle',
  ),
  141 => 
  array (
    'key' => 'mmip_tag',
    'value' => 'MCC-MRF Innovation Park',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'MMIP Tagline',
  ),
  142 => 
  array (
    'key' => 'mmip_title',
    'value' => 'A Pioneering Innovation Ecosystem',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'MMIP Title',
  ),
  143 => 
  array (
    'key' => 'mmip_p1',
    'value' => 'MCC–MRF Innovation Park (MMIP), established at Madras Christian College with the generous support of the MRF Foundation, is a pioneering innovation ecosystem dedicated to research, innovation, entrepreneurship, and startup development. Spread across 45,000 sq. ft., MMIP is the largest innovation park among liberal arts and science colleges in India, and one of the first-of-its-kind innovation parks established within a liberal arts and science institution.',
    'type' => 'textarea',
    'group' => 'about_organizer',
    'label' => 'MMIP Paragraph 1',
  ),
  144 => 
  array (
    'key' => 'mmip_p2',
    'value' => 'MMIP integrates research, design thinking, technology, and entrepreneurship into a multidisciplinary academic environment, demonstrating that innovation can flourish across disciplines beyond engineering. It serves as a scalable model for higher education institutions seeking to promote innovation-driven education, interdisciplinary collaboration, and entrepreneurial thinking.',
    'type' => 'textarea',
    'group' => 'about_organizer',
    'label' => 'MMIP Paragraph 2',
  ),
  145 => 
  array (
    'key' => 'micro_tab_title',
    'value' => 'Dept. of Microbiology',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Microbiology Tab Nav Title',
  ),
  146 => 
  array (
    'key' => 'micro_tab_sub',
    'value' => 'Est. 2002 • Research Unit',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Microbiology Tab Nav Subtitle',
  ),
  147 => 
  array (
    'key' => 'micro_tag',
    'value' => 'Madras Christian College',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Microbiology Tagline',
  ),
  148 => 
  array (
    'key' => 'micro_title',
    'value' => 'Department of Microbiology',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Microbiology Title',
  ),
  149 => 
  array (
    'key' => 'chem_tab_title',
    'value' => 'Dept. of Chemistry (SFS)',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Chemistry Tab Nav Title',
  ),
  150 => 
  array (
    'key' => 'chem_tab_sub',
    'value' => 'Est. 2003 • M.Sc. Program',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Chemistry Tab Nav Subtitle',
  ),
  151 => 
  array (
    'key' => 'chem_tag',
    'value' => 'Madras Christian College',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Chemistry Tagline',
  ),
  152 => 
  array (
    'key' => 'chem_title',
    'value' => 'Department of Chemistry (SFS)',
    'type' => 'text',
    'group' => 'about_organizer',
    'label' => 'Chemistry Title',
  ),
  153 => 
  array (
    'key' => 'objectives_section_title',
    'value' => 'Conference Objectives',
    'type' => 'text',
    'group' => 'objectives',
    'label' => 'Section Title',
  ),
  154 => 
  array (
    'key' => 'obj_1_icon',
    'value' => 'fa-solid fa-sitemap',
    'type' => 'text',
    'group' => 'objectives',
    'label' => 'Objective 1 Icon',
  ),
  155 => 
  array (
    'key' => 'obj_2_icon',
    'value' => 'fa-solid fa-globe',
    'type' => 'text',
    'group' => 'objectives',
    'label' => 'Objective 2 Icon',
  ),
  156 => 
  array (
    'key' => 'obj_3_icon',
    'value' => 'fa-solid fa-leaf',
    'type' => 'text',
    'group' => 'objectives',
    'label' => 'Objective 3 Icon',
  ),
  157 => 
  array (
    'key' => 'obj_4_icon',
    'value' => 'fa-solid fa-handshake',
    'type' => 'text',
    'group' => 'objectives',
    'label' => 'Objective 4 Icon',
  ),
  158 => 
  array (
    'key' => 'obj_5_icon',
    'value' => 'fa-solid fa-lightbulb',
    'type' => 'text',
    'group' => 'objectives',
    'label' => 'Objective 5 Icon',
  ),
  159 => 
  array (
    'key' => 'highlights_title',
    'value' => 'Conference Highlights',
    'type' => 'text',
    'group' => 'highlights',
    'label' => 'Highlights Title',
  ),
  160 => 
  array (
    'key' => 'highlights_subtitle',
    'value' => 'Key features and interactive forums scheduled for the Global One Health Confluence 2026',
    'type' => 'text',
    'group' => 'highlights',
    'label' => 'Highlights Subtitle',
  ),
  161 => 
  array (
    'key' => 'pub_title',
    'value' => 'Scientific Publications',
    'type' => 'text',
    'group' => 'highlights',
    'label' => 'Publications Title',
  ),
  162 => 
  array (
    'key' => 'pub_subtitle',
    'value' => 'Selected peer-reviewed manuscripts will be considered for publication in:',
    'type' => 'text',
    'group' => 'highlights',
    'label' => 'Publications Subtitle',
  ),
  163 => 
  array (
    'key' => 'pub_item_1',
    'value' => 'Scopus-indexed journals',
    'type' => 'text',
    'group' => 'highlights',
    'label' => 'Publication Item 1',
  ),
  164 => 
  array (
    'key' => 'pub_item_2',
    'value' => 'Edited ISBN conference proceedings',
    'type' => 'text',
    'group' => 'highlights',
    'label' => 'Publication Item 2',
  ),
  165 => 
  array (
    'key' => 'pub_item_3',
    'value' => 'Special issues with partnering international journals (subject to peer review)',
    'type' => 'text',
    'group' => 'highlights',
    'label' => 'Publication Item 3',
  ),
  166 => 
  array (
    'key' => 'part_tag',
    'value' => 'WHO CAN ATTEND',
    'type' => 'text',
    'group' => 'participants',
    'label' => 'Section Tagline',
  ),
  167 => 
  array (
    'key' => 'part_title',
    'value' => 'Our Participants',
    'type' => 'text',
    'group' => 'participants',
    'label' => 'Section Title',
  ),
  168 => 
  array (
    'key' => 'part_sub',
    'value' => 'Join the confluence to bridge microbes, molecules & mankind for a sustainable future.',
    'type' => 'text',
    'group' => 'participants',
    'label' => 'Section Subtitle',
  ),
  169 => 
  array (
    'key' => 'part_1_label',
    'value' => 'Students &
Research Scholars',
    'type' => 'text',
    'group' => 'participants',
    'label' => 'Participant 1 Label',
  ),
  170 => 
  array (
    'key' => 'part_1_icon',
    'value' => 'fa-solid fa-graduation-cap',
    'type' => 'text',
    'group' => 'participants',
    'label' => 'Participant 1 Icon',
  ),
  171 => 
  array (
    'key' => 'part_2_label',
    'value' => 'Academicians &
Policy Makers',
    'type' => 'text',
    'group' => 'participants',
    'label' => 'Participant 2 Label',
  ),
  172 => 
  array (
    'key' => 'part_2_icon',
    'value' => 'fa-solid fa-microscope',
    'type' => 'text',
    'group' => 'participants',
    'label' => 'Participant 2 Icon',
  ),
  173 => 
  array (
    'key' => 'part_3_label',
    'value' => 'Research
Scientists',
    'type' => 'text',
    'group' => 'participants',
    'label' => 'Participant 3 Label',
  ),
  174 => 
  array (
    'key' => 'part_3_icon',
    'value' => 'fa-solid fa-flask',
    'type' => 'text',
    'group' => 'participants',
    'label' => 'Participant 3 Icon',
  ),
  175 => 
  array (
    'key' => 'part_4_label',
    'value' => 'Health
Professionals',
    'type' => 'text',
    'group' => 'participants',
    'label' => 'Participant 4 Label',
  ),
  176 => 
  array (
    'key' => 'part_4_icon',
    'value' => 'fa-solid fa-book-open-reader',
    'type' => 'text',
    'group' => 'participants',
    'label' => 'Participant 4 Icon',
  ),
  177 => 
  array (
    'key' => 'part_5_label',
    'value' => 'Industry Experts (Pharma
& Health)',
    'type' => 'text',
    'group' => 'participants',
    'label' => 'Participant 5 Label',
  ),
  178 => 
  array (
    'key' => 'part_5_icon',
    'value' => 'fa-solid fa-industry',
    'type' => 'text',
    'group' => 'participants',
    'label' => 'Participant 5 Icon',
  ),
  179 => 
  array (
    'key' => 'outcomes_title',
    'value' => 'Key Expected Outcomes',
    'type' => 'text',
    'group' => 'outcomes',
    'label' => 'Outcomes Section Title',
  ),
  180 => 
  array (
    'key' => 'outcomes_sub',
    'value' => 'Tangible impacts and key deliverables driving the Global One Health vision forward through innovation, policy, and education.',
    'type' => 'text',
    'group' => 'outcomes',
    'label' => 'Outcomes Section Subtitle',
  ),
  181 => 
  array (
    'key' => 'out_1_tag',
    'value' => 'Collaboration',
    'type' => 'text',
    'group' => 'outcomes',
    'label' => 'Outcome 1 Tag',
  ),
  182 => 
  array (
    'key' => 'out_1_title',
    'value' => 'Strengthened interdisciplinary collaborations',
    'type' => 'text',
    'group' => 'outcomes',
    'label' => 'Outcome 1 Title',
  ),
  183 => 
  array (
    'key' => 'out_1_icon',
    'value' => 'fa-solid fa-users-gear',
    'type' => 'text',
    'group' => 'outcomes',
    'label' => 'Outcome 1 Icon',
  ),
  184 => 
  array (
    'key' => 'out_2_tag',
    'value' => 'Global',
    'type' => 'text',
    'group' => 'outcomes',
    'label' => 'Outcome 2 Tag',
  ),
  185 => 
  array (
    'key' => 'out_2_title',
    'value' => 'International research partnerships',
    'type' => 'text',
    'group' => 'outcomes',
    'label' => 'Outcome 2 Title',
  ),
  186 => 
  array (
    'key' => 'out_2_icon',
    'value' => 'fa-solid fa-globe',
    'type' => 'text',
    'group' => 'outcomes',
    'label' => 'Outcome 2 Icon',
  ),
  187 => 
  array (
    'key' => 'out_3_tag',
    'value' => 'Research',
    'type' => 'text',
    'group' => 'outcomes',
    'label' => 'Outcome 3 Tag',
  ),
  188 => 
  array (
    'key' => 'out_3_title',
    'value' => 'High-quality scientific publications',
    'type' => 'text',
    'group' => 'outcomes',
    'label' => 'Outcome 3 Title',
  ),
  189 => 
  array (
    'key' => 'out_3_icon',
    'value' => 'fa-solid fa-book-bookmark',
    'type' => 'text',
    'group' => 'outcomes',
    'label' => 'Outcome 3 Icon',
  ),
  190 => 
  array (
    'key' => 'out_4_tag',
    'value' => 'Innovation',
    'type' => 'text',
    'group' => 'outcomes',
    'label' => 'Outcome 4 Tag',
  ),
  191 => 
  array (
    'key' => 'out_4_title',
    'value' => 'Translation of research into innovation',
    'type' => 'text',
    'group' => 'outcomes',
    'label' => 'Outcome 4 Title',
  ),
  192 => 
  array (
    'key' => 'out_4_icon',
    'value' => 'fa-solid fa-lightbulb',
    'type' => 'text',
    'group' => 'outcomes',
    'label' => 'Outcome 4 Icon',
  ),
  193 => 
  array (
    'key' => 'out_5_tag',
    'value' => 'Policy',
    'type' => 'text',
    'group' => 'outcomes',
    'label' => 'Outcome 5 Tag',
  ),
  194 => 
  array (
    'key' => 'out_5_title',
    'value' => 'Policy recommendations for One Health',
    'type' => 'text',
    'group' => 'outcomes',
    'label' => 'Outcome 5 Title',
  ),
  195 => 
  array (
    'key' => 'out_5_icon',
    'value' => 'fa-solid fa-landmark',
    'type' => 'text',
    'group' => 'outcomes',
    'label' => 'Outcome 5 Icon',
  ),
  196 => 
  array (
    'key' => 'out_6_tag',
    'value' => 'Education',
    'type' => 'text',
    'group' => 'outcomes',
    'label' => 'Outcome 6 Tag',
  ),
  197 => 
  array (
    'key' => 'out_6_title',
    'value' => 'Capacity building for early-career researchers',
    'type' => 'text',
    'group' => 'outcomes',
    'label' => 'Outcome 6 Title',
  ),
  198 => 
  array (
    'key' => 'out_6_icon',
    'value' => 'fa-solid fa-graduation-cap',
    'type' => 'text',
    'group' => 'outcomes',
    'label' => 'Outcome 6 Icon',
  ),
  199 => 
  array (
    'key' => 'journey_title',
    'value' => 'Our Journey to Impact',
    'type' => 'text',
    'group' => 'journey',
    'label' => 'Journey Section Title',
  ),
  200 => 
  array (
    'key' => 'journey_sub',
    'value' => 'A strategic 4-step pathway driving global collaboration into sustainable transformation.',
    'type' => 'text',
    'group' => 'journey',
    'label' => 'Journey Section Subtitle',
  ),
  201 => 
  array (
    'key' => 'journey_1_title',
    'value' => 'CONNECT',
    'type' => 'text',
    'group' => 'journey',
    'label' => 'Step 1 Title',
  ),
  202 => 
  array (
    'key' => 'journey_1_desc',
    'value' => 'Bringing global minds together for meaningful collaboration.',
    'type' => 'textarea',
    'group' => 'journey',
    'label' => 'Step 1 Description',
  ),
  203 => 
  array (
    'key' => 'journey_2_title',
    'value' => 'SHARE',
    'type' => 'text',
    'group' => 'journey',
    'label' => 'Step 2 Title',
  ),
  204 => 
  array (
    'key' => 'journey_2_desc',
    'value' => 'Sharing knowledge, innovations and best practices.',
    'type' => 'textarea',
    'group' => 'journey',
    'label' => 'Step 2 Description',
  ),
  205 => 
  array (
    'key' => 'journey_3_title',
    'value' => 'INNOVATE',
    'type' => 'text',
    'group' => 'journey',
    'label' => 'Step 3 Title',
  ),
  206 => 
  array (
    'key' => 'journey_3_desc',
    'value' => 'Creating solutions for a healthier planet and resilient communities.',
    'type' => 'textarea',
    'group' => 'journey',
    'label' => 'Step 3 Description',
  ),
  207 => 
  array (
    'key' => 'journey_4_title',
    'value' => 'IMPACT',
    'type' => 'text',
    'group' => 'journey',
    'label' => 'Step 4 Title',
  ),
  208 => 
  array (
    'key' => 'journey_4_desc',
    'value' => 'Driving sustainable change for generations to come.',
    'type' => 'textarea',
    'group' => 'journey',
    'label' => 'Step 4 Description',
  ),
  209 => 
  array (
    'key' => 'abstract_tag',
    'value' => 'PRIMARY GUIDELINES',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  210 => 
  array (
    'key' => 'abstract_title',
    'value' => 'Abstract Submission',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  211 => 
  array (
    'key' => 'abstract_item_1',
    'value' => 'Abstracts should be original and highly relevant to the conference themes.',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  212 => 
  array (
    'key' => 'abstract_item_2',
    'value' => 'Word Limit: Strictly 250–300 words',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  213 => 
  array (
    'key' => 'abstract_item_3',
    'value' => 'Format Structure: Title, Authors, Affiliation, Background, Objectives, Methods, Results, Conclusion, Keywords',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  214 => 
  array (
    'key' => 'abstract_item_4',
    'value' => 'File Type: Submit exclusively in MS Word format (.doc or .docx)',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  215 => 
  array (
    'key' => 'abstract_item_5',
    'value' => 'Registration: Presenting author must register for the conference.',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  216 => 
  array (
    'key' => 'abstract_item_6',
    'value' => 'Review Process: All abstracts will undergo a rigorous peer review.',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  217 => 
  array (
    'key' => 'oral_title',
    'value' => 'Oral Presentation',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  218 => 
  array (
    'key' => 'oral_item_1',
    'value' => 'Format: PowerPoint Presentation (PPT) format only',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  219 => 
  array (
    'key' => 'oral_item_2',
    'value' => 'Total Time: 7 Minutes maximum',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  220 => 
  array (
    'key' => 'oral_item_3',
    'value' => 'Presentation Window: 5 Minutes',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  221 => 
  array (
    'key' => 'oral_item_4',
    'value' => 'Q & A Session: 2 Minutes allocated for audience questions',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  222 => 
  array (
    'key' => 'poster_title',
    'value' => 'Poster Presentation',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  223 => 
  array (
    'key' => 'poster_item_1',
    'value' => 'Language: Posters should be presented in English.',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  224 => 
  array (
    'key' => 'poster_item_2',
    'value' => 'Design: Content must be clear, concise and visually appealing.',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  225 => 
  array (
    'key' => 'poster_item_3',
    'value' => 'Required Elements: Title, Authors, Affiliation, Introduction, Methods, Results, Conclusion.',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  226 => 
  array (
    'key' => 'poster_item_4',
    'value' => 'Attendance: Presenters must be present during the poster session.',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  227 => 
  array (
    'key' => 'poster_dim_label',
    'value' => 'POSTER DIMENSIONS',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  228 => 
  array (
    'key' => 'poster_dim_val',
    'value' => '90 cm (Width) × 120 cm (Height)',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  229 => 
  array (
    'key' => 'pub_desc',
    'value' => 'Selected peer-reviewed manuscripts will be considered for publication in our partnering international journals and indexed proceedings, offering global visibility for your research.',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  230 => 
  array (
    'key' => 'pub_1_title',
    'value' => 'Scopus-Indexed Journals',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  231 => 
  array (
    'key' => 'pub_1_desc',
    'value' => 'Manuscripts meeting high academic standards will be recommended for fast-track publication in recognized Scopus-indexed journals.',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  232 => 
  array (
    'key' => 'pub_2_title',
    'value' => 'ISBN Proceedings',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  233 => 
  array (
    'key' => 'pub_2_desc',
    'value' => 'Accepted abstracts and short papers will be compiled and published in official edited conference proceedings with a registered ISBN.',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  234 => 
  array (
    'key' => 'pub_3_title',
    'value' => 'Special Issues',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  235 => 
  array (
    'key' => 'pub_3_desc',
    'value' => 'Exceptional papers may be selected for special thematic issues with partnering international journals, subject to standard peer-review.',
    'type' => 'text',
    'group' => 'guidelines',
    'label' => NULL,
  ),
  236 => 
  array (
    'key' => 'reg_section_title',
    'value' => 'Registration Plans',
    'type' => 'text',
    'group' => 'registration',
    'label' => NULL,
  ),
  237 => 
  array (
    'key' => 'reg_section_sub',
    'value' => 'Choose the appropriate registration tier to access the conference. Super early-bird rates are currently active.',
    'type' => 'text',
    'group' => 'registration',
    'label' => NULL,
  ),
  238 => 
  array (
    'key' => 'reg_proc_title',
    'value' => 'Registration Process of GOHC - 2026',
    'type' => 'text',
    'group' => 'registration',
    'label' => NULL,
  ),
  239 => 
  array (
    'key' => 'reg_proc_sub',
    'value' => 'Participation in GOHC 2026 is open only to registered delegates..',
    'type' => 'text',
    'group' => 'registration',
    'label' => NULL,
  ),
  240 => 
  array (
    'key' => 'reg_proc_heading',
    'value' => 'Steps for Conference Registration',
    'type' => 'text',
    'group' => 'registration',
    'label' => NULL,
  ),
  241 => 
  array (
    'key' => 'reg_step_1',
    'value' => 'Prepare your abstract using the official template available on the conference website or by scanning the provided QR code.',
    'type' => 'text',
    'group' => 'registration',
    'label' => NULL,
  ),
  242 => 
  array (
    'key' => 'reg_step_2',
    'value' => 'Pay the applicable registration fee using the provided payment link.',
    'type' => 'text',
    'group' => 'registration',
    'label' => NULL,
  ),
  243 => 
  array (
    'key' => 'reg_step_3',
    'value' => 'Download and save the payment receipt in PDF or JPG format, as it is required for registration.',
    'type' => 'text',
    'group' => 'registration',
    'label' => NULL,
  ),
  244 => 
  array (
    'key' => 'reg_step_4',
    'value' => 'Complete the online registration form using the provided registration link.',
    'type' => 'text',
    'group' => 'registration',
    'label' => NULL,
  ),
  245 => 
  array (
    'key' => 'reg_step_5',
    'value' => 'Submit the registration form along with your abstract to complete the registration process.',
    'type' => 'text',
    'group' => 'registration',
    'label' => NULL,
  ),
  246 => 
  array (
    'key' => 'sched_title',
    'value' => 'PROGRAMME SCHEDULE',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  247 => 
  array (
    'key' => 'sched_sub',
    'value' => 'Complete schedule of sessions, guest lectures, and presentations for Day 1 and Day 2.',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  248 => 
  array (
    'key' => 'sched_day1_title',
    'value' => 'DAY – I SCHEDULE',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  249 => 
  array (
    'key' => 'sched_day1_time',
    'value' => '9:30 AM – 6:00 PM',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  250 => 
  array (
    'key' => 'sched_day2_title',
    'value' => 'DAY – II SCHEDULE',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  251 => 
  array (
    'key' => 'sched_day2_time',
    'value' => '9:30 AM – 5:30 PM',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  252 => 
  array (
    'key' => 'sched_tracks_title',
    'value' => 'TRACK-WISE INCHARGE',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  253 => 
  array (
    'key' => 'sched_tracks_sub',
    'value' => 'Parallel technical tracks covering specialized domains of Global One Health Confluence 2026.',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  254 => 
  array (
    'key' => 'day1_1_time',
    'value' => '9:30 AM – 11:30 AM',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  255 => 
  array (
    'key' => 'day1_1_title',
    'value' => 'Inauguration',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  256 => 
  array (
    'key' => 'day1_1_badge',
    'value' => '',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  257 => 
  array (
    'key' => 'day1_1_icon',
    'value' => 'fa-clock',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  258 => 
  array (
    'key' => 'day1_2_time',
    'value' => '11:30 AM – 11:45 AM',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  259 => 
  array (
    'key' => 'day1_2_title',
    'value' => 'Tea Break',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  260 => 
  array (
    'key' => 'day1_2_badge',
    'value' => 'Refreshment',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  261 => 
  array (
    'key' => 'day1_2_icon',
    'value' => 'fa-mug-hot',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  262 => 
  array (
    'key' => 'day1_3_time',
    'value' => '11:45 AM – 12:30 PM',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  263 => 
  array (
    'key' => 'day1_3_title',
    'value' => 'Guest Lecture - I',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  264 => 
  array (
    'key' => 'day1_3_badge',
    'value' => '',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  265 => 
  array (
    'key' => 'day1_3_icon',
    'value' => 'fa-clock',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  266 => 
  array (
    'key' => 'day1_4_time',
    'value' => '12:30 PM – 1:15 PM',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  267 => 
  array (
    'key' => 'day1_4_title',
    'value' => 'Guest Lecture - II',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  268 => 
  array (
    'key' => 'day1_4_badge',
    'value' => '',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  269 => 
  array (
    'key' => 'day1_4_icon',
    'value' => 'fa-clock',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  270 => 
  array (
    'key' => 'day1_5_time',
    'value' => '1:15 PM – 2:15 PM',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  271 => 
  array (
    'key' => 'day1_5_title',
    'value' => 'Lunch Break',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  272 => 
  array (
    'key' => 'day1_5_badge',
    'value' => 'Break',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  273 => 
  array (
    'key' => 'day1_5_icon',
    'value' => 'fa-utensils',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  274 => 
  array (
    'key' => 'day1_6_time',
    'value' => '2:15 PM – 3:00 PM',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  275 => 
  array (
    'key' => 'day1_6_title',
    'value' => 'Guest Lecture - III',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  276 => 
  array (
    'key' => 'day1_6_badge',
    'value' => '',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  277 => 
  array (
    'key' => 'day1_6_icon',
    'value' => 'fa-clock',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  278 => 
  array (
    'key' => 'day1_7_time',
    'value' => '3:00 PM – 6:00 PM',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  279 => 
  array (
    'key' => 'day1_7_title',
    'value' => 'Paper Presentation - Tracks I, II & III',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  280 => 
  array (
    'key' => 'day1_7_badge',
    'value' => 'Parallel Session',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  281 => 
  array (
    'key' => 'day1_7_icon',
    'value' => 'fa-clock',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  282 => 
  array (
    'key' => 'day1_8_time',
    'value' => '3:00 PM – 6:00 PM',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  283 => 
  array (
    'key' => 'day1_8_title',
    'value' => 'Poster Presentation - Tracks I, II & III',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  284 => 
  array (
    'key' => 'day1_8_badge',
    'value' => 'Parallel Session',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  285 => 
  array (
    'key' => 'day1_8_icon',
    'value' => 'fa-clock',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  286 => 
  array (
    'key' => 'day1_count',
    'value' => '8',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  287 => 
  array (
    'key' => 'day2_1_time',
    'value' => '9:30 AM – 10:15 AM',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  288 => 
  array (
    'key' => 'day2_1_title',
    'value' => 'Guest Lecture - IV',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  289 => 
  array (
    'key' => 'day2_1_badge',
    'value' => '',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  290 => 
  array (
    'key' => 'day2_1_icon',
    'value' => 'fa-clock',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  291 => 
  array (
    'key' => 'day2_2_time',
    'value' => '10:15 AM – 11:00 AM',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  292 => 
  array (
    'key' => 'day2_2_title',
    'value' => 'Guest Lecture - V',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  293 => 
  array (
    'key' => 'day2_2_badge',
    'value' => '',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  294 => 
  array (
    'key' => 'day2_2_icon',
    'value' => 'fa-clock',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  295 => 
  array (
    'key' => 'day2_3_time',
    'value' => '11:00 AM – 11:15 AM',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  296 => 
  array (
    'key' => 'day2_3_title',
    'value' => 'Tea Break',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  297 => 
  array (
    'key' => 'day2_3_badge',
    'value' => 'Refreshment',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  298 => 
  array (
    'key' => 'day2_3_icon',
    'value' => 'fa-mug-hot',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  299 => 
  array (
    'key' => 'day2_4_time',
    'value' => '11:15 AM – 1:15 PM',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  300 => 
  array (
    'key' => 'day2_4_title',
    'value' => 'Oral & Poster Presentations - Tracks IV & V',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  301 => 
  array (
    'key' => 'day2_4_badge',
    'value' => 'Parallel Session',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  302 => 
  array (
    'key' => 'day2_4_icon',
    'value' => 'fa-clock',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  303 => 
  array (
    'key' => 'day2_5_time',
    'value' => '1:15 PM – 2:15 PM',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  304 => 
  array (
    'key' => 'day2_5_title',
    'value' => 'Lunch Break',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  305 => 
  array (
    'key' => 'day2_5_badge',
    'value' => 'Break',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  306 => 
  array (
    'key' => 'day2_5_icon',
    'value' => 'fa-utensils',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  307 => 
  array (
    'key' => 'day2_6_time',
    'value' => '2:15 PM – 3:30 PM',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  308 => 
  array (
    'key' => 'day2_6_title',
    'value' => 'Guest Lecture - VI & Panel Discussion',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  309 => 
  array (
    'key' => 'day2_6_badge',
    'value' => '',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  310 => 
  array (
    'key' => 'day2_6_icon',
    'value' => 'fa-clock',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  311 => 
  array (
    'key' => 'day2_7_time',
    'value' => '3:30 PM – 4:30 PM',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  312 => 
  array (
    'key' => 'day2_7_title',
    'value' => 'Valedictory & Award Ceremony',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  313 => 
  array (
    'key' => 'day2_7_badge',
    'value' => 'Special Event',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  314 => 
  array (
    'key' => 'day2_7_icon',
    'value' => 'fa-trophy',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  315 => 
  array (
    'key' => 'day2_count',
    'value' => '7',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  316 => 
  array (
    'key' => 'awards_section_title',
    'value' => 'CONFERENCE AWARDS',
    'type' => 'text',
    'group' => 'awards',
    'label' => NULL,
  ),
  317 => 
  array (
    'key' => 'awards_section_sub',
    'value' => 'Celebrating exceptional scholastic achievements, research excellence, and entrepreneurial vision with cash prizes and distiction.',
    'type' => 'textarea',
    'group' => 'awards',
    'label' => NULL,
  ),
  318 => 
  array (
    'key' => 'award_1_title',
    'value' => 'Faculty Award for excellence in
One Health research',
    'type' => 'textarea',
    'group' => 'awards',
    'label' => NULL,
  ),
  319 => 
  array (
    'key' => 'award_1_amount',
    'value' => '₹ 25,000',
    'type' => 'text',
    'group' => 'awards',
    'label' => NULL,
  ),
  320 => 
  array (
    'key' => 'award_1_icon',
    'value' => 'fa-solid fa-award',
    'type' => 'text',
    'group' => 'awards',
    'label' => NULL,
  ),
  321 => 
  array (
    'key' => 'award_2_title',
    'value' => 'One Health Distinguished
Research Scholar Award',
    'type' => 'textarea',
    'group' => 'awards',
    'label' => NULL,
  ),
  322 => 
  array (
    'key' => 'award_2_amount',
    'value' => '₹ 10,000',
    'type' => 'text',
    'group' => 'awards',
    'label' => NULL,
  ),
  323 => 
  array (
    'key' => 'award_2_icon',
    'value' => 'fa-solid fa-award',
    'type' => 'text',
    'group' => 'awards',
    'label' => NULL,
  ),
  324 => 
  array (
    'key' => 'award_3_title',
    'value' => 'Young Innovator &
Entrepreneur Award',
    'type' => 'textarea',
    'group' => 'awards',
    'label' => NULL,
  ),
  325 => 
  array (
    'key' => 'award_3_amount',
    'value' => '₹ 25,000',
    'type' => 'text',
    'group' => 'awards',
    'label' => NULL,
  ),
  326 => 
  array (
    'key' => 'award_3_icon',
    'value' => 'fa-solid fa-award',
    'type' => 'text',
    'group' => 'awards',
    'label' => NULL,
  ),
  327 => 
  array (
    'key' => 'awards_footer_note',
    'value' => 'Prizes will be awarded for best Oral, Poster
Presentations and Best Innovation Pitch',
    'type' => 'textarea',
    'group' => 'awards',
    'label' => NULL,
  ),
  328 => 
  array (
    'key' => 'awards_footer_icon',
    'value' => 'fa-solid fa-file-excel',
    'type' => 'text',
    'group' => 'awards',
    'label' => NULL,
  ),
  329 => 
  array (
    'key' => 'footer_copyright',
    'value' => '©2026 GLOBAL ONE HEALTH CONFLUENCE Design and Developed by MCC-MRF Innovation Park',
    'type' => 'text',
    'group' => 'footer',
    'label' => 'Copyright Text',
  ),
  330 => 
  array (
    'key' => 'pre_conf_hero_title',
    'value' => 'PRE-CONFERENCE WORKSHOP',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  3301 => 
  array (
    'key' => 'pre_conf_hero_sub1',
    'value' => 'Pre-Conference Consultative Workshop on',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  3302 => 
  array (
    'key' => 'pre_conf_hero_sub2',
    'value' => 'GLOBAL ONE HEALTH CONFLUENCE 2026',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  3303 => 
  array (
    'key' => 'pre_conf_hero_sub3',
    'value' => 'Bridging Microbes, Molecules & Mankind for Sustainability',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  3304 => 
  array (
    'key' => 'pre_conf_preamble_title',
    'value' => 'PREAMBLE',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  3305 => 
  array (
    'key' => 'pre_conf_preamble_icon',
    'value' => 'fa-solid fa-book-open',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  3306 => 
  array (
    'key' => 'pre_conf_obj_title',
    'value' => 'KEY OBJECTIVES',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  3307 => 
  array (
    'key' => 'pre_conf_obj_icon',
    'value' => 'fa-regular fa-compass',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  3308 => 
  array (
    'key' => 'pre_conf_preamble',
    'value' => 'The Pre-Conference Consultation of Global One Health Confluence 2026 aims to bring together eminent experts, academicians, researchers, healthcare professionals, policymakers and resource persons from diverse disciplines to provide focused and meaningful inputs for the scientific, thematic and collaborative planning of the conference. The consultation will facilitate interdisciplinary dialogue on key One Health priorities, including antimicrobial resistance, infectious and zoonotic diseases, veterinary and public health, environmental and planetary health, food and agricultural sustainability, Siddha and Indian Knowledge Systems (IKS), biotechnology, nanotechnology, innovation, public health and policy governance. It will provide an opportunity to identify emerging challenges, regional priorities and research needs relevant to Tamil Nadu and to develop scientifically relevant sessions, lectures, panel discussions and collaborative activities for GOHC 2026. The consultation will further encourage the exchange of expertise, experiences and innovative ideas among participating institutions and stakeholders, while strengthening academia–industry–healthcare–government partnerships and identifying opportunities for joint research, knowledge exchange, capacity building and translational initiatives. The inputs and recommendations emerging from the consultation will contribute towards shaping a comprehensive and impactful conference programme aligned with the theme "Bridging Microbes, Molecules & Mankind for Sustainability", while promoting integrated, evidence-based and sustainable approaches to human, animal and environmental health.',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  331 => 
  array (
    'key' => 'pre_conf_schedule_note',
    'value' => 'Proposed date: 25th September 2026 | Venue: Blue-whale auditorium, MMIP | Mode: Hybrid',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  332 => 
  array (
    'key' => 'pre_conf_panel',
    'value' => 'Panel discussion with Doctors and health care experts (Tentative)',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  333 => 
  array (
    'key' => 'pre_conf_obj_1',
    'value' => 'To obtain expert inputs for the scientific and thematic planning of Global One Health Confluence 2026.',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  334 => 
  array (
    'key' => 'pre_conf_obj_2',
    'value' => 'To facilitate interdisciplinary dialogue on human health, animal health, environmental health and allied One Health domains.',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  335 => 
  array (
    'key' => 'pre_conf_obj_3',
    'value' => 'To discuss regional priorities related to antimicrobial resistance, infectious diseases, zoonotic diseases, veterinary public health, IKS and public health.',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  336 => 
  array (
    'key' => 'pre_conf_obj_4',
    'value' => 'To integrate diverse expert perspectives into the scientific sessions and thematic discussions of GOHC 2026.',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  337 => 
  array (
    'key' => 'pre_conf_obj_5',
    'value' => 'To strengthen institutional and professional collaboration towards advancing sustainable and integrated One Health approaches.',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  338 => 
  array (
    'key' => 'pre_conf_speaker_1_name',
    'value' => 'Prof. Dr. Raman Muthusamy',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  339 => 
  array (
    'key' => 'pre_conf_speaker_1_image',
    'value' => 'images/raman_muthusamy_cropped.png',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  340 => 
  array (
    'key' => 'pre_conf_speaker_1_affiliation',
    'value' => 'Advisor & Cluster Head, One Health, Center for Global Healrtth Research, Saveetha Medical College, Former Director, Translational Research platform for Veterinary Biologicals, TANUVAS, Chennai',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  341 => 
  array (
    'key' => 'pre_conf_speaker_1_expertise',
    'value' => 'One Health, AMR, Zoonotic disease and translational research',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  342 => 
  array (
    'key' => 'pre_conf_speaker_2_name',
    'value' => 'Dr. S. Suresh Kannan',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  343 => 
  array (
    'key' => 'pre_conf_speaker_2_image',
    'value' => 'images/suresh_kannan.png',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  344 => 
  array (
    'key' => 'pre_conf_speaker_2_affiliation',
    'value' => 'Professor & Head, Department of Veterinary Public Health and Epidemiology, Madras Veterinary college, Chennai',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  345 => 
  array (
    'key' => 'pre_conf_speaker_2_expertise',
    'value' => 'One health, zoonotic disease surveillance, AMR and veterinary public health',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  346 => 
  array (
    'key' => 'pre_conf_speaker_3_name',
    'value' => 'Dr. M. Meenakshi Sundaram',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  347 => 
  array (
    'key' => 'pre_conf_speaker_3_image',
    'value' => 'images/meenakshi_sundaram.png',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  348 => 
  array (
    'key' => 'pre_conf_speaker_3_affiliation',
    'value' => 'Dean, Professor & Head, Department of Kuzhandhai Muruthuvam, National Institute of Siddha, Chennai',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  349 => 
  array (
    'key' => 'pre_conf_speaker_3_expertise',
    'value' => 'Indian Knowledge system',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  350 => 
  array (
    'key' => 'pre_conf_speaker_4_name',
    'value' => 'Dr. V. Vijaykumar',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  351 => 
  array (
    'key' => 'pre_conf_speaker_4_image',
    'value' => '',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  352 => 
  array (
    'key' => 'pre_conf_speaker_4_affiliation',
    'value' => 'Expert Advisor for child health, National Health Mission, Chennai',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  353 => 
  array (
    'key' => 'pre_conf_speaker_4_expertise',
    'value' => 'Public health integration and environmental determinants and health policy',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  354 => 
  array (
    'key' => 'pre_conf_speaker_5_name',
    'value' => 'Dr. Ramdev Krishnan. J',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  355 => 
  array (
    'key' => 'pre_conf_speaker_5_image',
    'value' => 'images/ramdev_krishnan.png',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  356 => 
  array (
    'key' => 'pre_conf_speaker_5_affiliation',
    'value' => 'Head of Operations, Mazumdarshaw Medical Foundation (MSMF)-TBI Narayana Health, Bangalore',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  357 => 
  array (
    'key' => 'pre_conf_speaker_5_expertise',
    'value' => 'AI in health-care',
    'type' => 'text',
    'group' => 'pre_conference',
    'label' => NULL,
  ),
  358 => 
  array (
    'key' => 'track_1_name',
    'value' => 'Track I',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  359 => 
  array (
    'key' => 'track_1_topic',
    'value' => 'Emerging infectious diseases through a One health lens',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  360 => 
  array (
    'key' => 'track_1_adjudicator',
    'value' => 'Dr. Ananthi Rachel Livingstone, Head of the Dept.',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  361 => 
  array (
    'key' => 'track_1_staff',
    'value' => 'Dr.S. Niren Andrew, Assistant Professor, Department of Microbiology,Madras Christian College, Chennai-59 & Mrs.Adline Jennefa Daniel, Assistant Professor, Department of Zoology, Madras Christian College, Chennai-59',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  362 => 
  array (
    'key' => 'track_1_color',
    'value' => '#009688',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  363 => 
  array (
    'key' => 'track_2_name',
    'value' => 'Track II',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  364 => 
  array (
    'key' => 'track_2_topic',
    'value' => 'Strengthening Health Systems from Theory to Practice: Embedding Social Infrastructure and Public Governance in One Health Capacities',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  365 => 
  array (
    'key' => 'track_2_adjudicator',
    'value' => 'Dr. R. Sridhar, Vice-Principal (Admin), Associate Professor',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  366 => 
  array (
    'key' => 'track_2_staff',
    'value' => 'Dr.S.Premina, Assistant Professor, Department of Microbiology,Madras Christian College, Chennai-59 & Dr.Milton Devadayavu N, Assistant Professor, Department of Public Administration, Madras Christian College, Chennai-59',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  367 => 
  array (
    'key' => 'track_2_color',
    'value' => '#3b82f6',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  368 => 
  array (
    'key' => 'track_3_name',
    'value' => 'Track III',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  369 => 
  array (
    'key' => 'track_3_topic',
    'value' => 'Integrating Environment and Climate Change in One Health',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  370 => 
  array (
    'key' => 'track_3_adjudicator',
    'value' => 'Dr. E. Joyce Sudandara Priya, Head of the Dept.',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  371 => 
  array (
    'key' => 'track_3_staff',
    'value' => 'Dr. P. Hanumantha Rao, Associate Professor, Department of Microbiology,Madras Christian College, Chennai-59 & Dr.U. Senthilkumar, Assistant Professor, Department of Botany, Madras Christian College, Chennai-59',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  372 => 
  array (
    'key' => 'track_3_color',
    'value' => '#8b5cf6',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  373 => 
  array (
    'key' => 'track_4_name',
    'value' => 'Track IV',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  374 => 
  array (
    'key' => 'track_4_topic',
    'value' => 'Translating Sustainable Chemistry and Future Technologies to One Health',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  375 => 
  array (
    'key' => 'track_4_adjudicator',
    'value' => 'Dr. E. Iyyappan, Head of the Department',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  376 => 
  array (
    'key' => 'track_4_staff',
    'value' => 'Dr.S.Abirami, Assistant Professor, Department of Microbiology,Madras Christian College, Chennai-59 & Dr. R. Vijay Solomon, Assistant Professor, Department of Chemistry (Aided), Madras Christian College, Chennai-59',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  377 => 
  array (
    'key' => 'track_4_color',
    'value' => '#ec4899',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  378 => 
  array (
    'key' => 'track_5_name',
    'value' => 'Track V',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  379 => 
  array (
    'key' => 'track_5_topic',
    'value' => 'Ensuring health intervention through the Indian Knowledge System',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  380 => 
  array (
    'key' => 'track_5_adjudicator',
    'value' => 'Prof. Dr.S. Sivakkumar, Professor / Gunapadam',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  381 => 
  array (
    'key' => 'track_5_staff',
    'value' => 'Dr.V.Vedha, Assistant Professor, Department of Microbiology,Madras Christian College, Chennai-59 & Dr. K. Vijayalakshmi, Assistant Professor, Department of Chemistry (SFS), Madras Christian College, Chennai-59',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  382 => 
  array (
    'key' => 'track_5_color',
    'value' => '#f59e0b',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  383 => 
  array (
    'key' => 'track_6_name',
    'value' => 'Track VI',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  384 => 
  array (
    'key' => 'track_6_topic',
    'value' => 'Regenerative Health: Redefining Industrial One Health Paradigms',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  385 => 
  array (
    'key' => 'track_6_adjudicator',
    'value' => 'Dr. T.Sathish Kumar, Associate Professor',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  386 => 
  array (
    'key' => 'track_6_staff',
    'value' => 'Dr. T.Sathish Kumar, Associate Professor, Department of Microbiology,Madras Christian College, Chennai-59 & Dr.S. Daniel Abraham, Assistant Professor, Department of Chemistry (SFS), Madras Christian College, Chennai-59',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  387 => 
  array (
    'key' => 'track_6_color',
    'value' => '#10b981',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  388 => 
  array (
    'key' => 'track_count',
    'value' => '6',
    'type' => 'text',
    'group' => 'schedule',
    'label' => NULL,
  ),
  389 => 
  array (
    'key' => 'contact_whatsapp_link',
    'value' => 'https://wa.me/918148018894',
    'type' => 'text',
    'group' => 'general',
    'label' => NULL,
  ),
);
        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
