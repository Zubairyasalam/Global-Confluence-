<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\CommitteeMember;

// Clear ALL existing committee members
CommitteeMember::truncate();

$sort = 1;

// CHIEF PATRON
CommitteeMember::create(['name' => 'Dr. P. Wilson', 'designation' => "Principal & Secretary, MCC", 'category' => 'leadership', 'subcategory' => 'chief_patron', 'sort_order' => $sort++, 'is_active' => true]);

// PATRON (single)
CommitteeMember::create(['name' => 'Dr. J. Jannet Vennila', 'designation' => "Vice-Principal (SFS)", 'category' => 'leadership', 'subcategory' => 'patrons', 'sort_order' => $sort++, 'is_active' => true]);

// CONVENORS
CommitteeMember::create(['name' => 'Dr. V. Mahalakshmi', 'designation' => "Head, Department of Microbiology", 'category' => 'leadership', 'subcategory' => 'convenor', 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Dr. S. Sahila', 'designation' => "Head, Department of Chemistry (SFS)", 'category' => 'leadership', 'subcategory' => 'convenor', 'sort_order' => $sort++, 'is_active' => true]);

// CO-CONVENORS
CommitteeMember::create(['name' => 'Dr. Belinda', 'designation' => "Director, Extension Programmes", 'category' => 'leadership', 'subcategory' => 'co_convenors', 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Dr. M. Beutline Malgija', 'designation' => "Bioinformatician, MMIP", 'category' => 'leadership', 'subcategory' => 'co_convenors', 'sort_order' => $sort++, 'is_active' => true]);

// INTERNATIONAL ADVISORY COMMITTEE
CommitteeMember::create(['name' => 'Dr. Atul Kumar', 'designation' => "Assistant Researcher, Faculty of Medicine, Biomedical Center, Lund University, Sweden", 'category' => 'advisory_committee', 'subcategory' => 'international', 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Dr. R. Aldrin Denny', 'designation' => "Founder and CEO, Medizen Incorporation, Boston, USA", 'category' => 'advisory_committee', 'subcategory' => 'international', 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Dr. Shobana Sekhar', 'designation' => "Computational Biologist, USA", 'category' => 'advisory_committee', 'subcategory' => 'international', 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Dr. Md. Khalilur Rahman', 'designation' => "Professor, Department of Biochemistry & Molecular Biology, University of Dhaka, Bangladesh", 'category' => 'advisory_committee', 'subcategory' => 'international', 'sort_order' => $sort++, 'is_active' => true]);

// NATIONAL ADVISORY COMMITTEE
CommitteeMember::create(['name' => 'Dr. S. Parthsarathy', 'designation' => "Former Professor & Head, Department of Bioinformatics, Bharathidasan University, Trichirapalli", 'category' => 'advisory_committee', 'subcategory' => 'national', 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Dr. P. P. Mathur', 'designation' => "Professor & Head, Department of Biochemistry & Molecular Biology and Dean, School of Life Sciences, Pondicherry University; Former Vice-Chancellor, KIIT University", 'category' => 'advisory_committee', 'subcategory' => 'national', 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Dr. Narasimhan D', 'designation' => "Member, Expert Committee on Access and Benefit Sharing, National Biodiversity Authority; National Evaluation Committee of PBRs", 'category' => 'advisory_committee', 'subcategory' => 'national', 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Dr. T. N. Ravishankar', 'designation' => "IMA Former President, TNSB", 'category' => 'advisory_committee', 'subcategory' => 'national', 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Dr. Kamalakannan Kailasam', 'designation' => "Professor, Scientist-G, Institute of Nano Science and Technology (INST), Mohali", 'category' => 'advisory_committee', 'subcategory' => 'national', 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Prof. Dr. G. Senthilvel', 'designation' => "Director, National Institute of Siddha (NIS), Chennai", 'category' => 'advisory_committee', 'subcategory' => 'national', 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Dr. Meenakshi Sundaram Malayappan', 'designation' => "M.D (S), Ph.D, Professor at National Institute of Siddha, Chennai", 'category' => 'advisory_committee', 'subcategory' => 'national', 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Dr. Vijayakumar Varadarajan', 'designation' => "Former Professor of Neonatology, MMC", 'category' => 'advisory_committee', 'subcategory' => 'national', 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Dr. M. Kathiresan', 'designation' => "P.C. Ray Department of Chemistry, National Institute of Technology Puducherry", 'category' => 'advisory_committee', 'subcategory' => 'national', 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Dr. Wilson Aruni', 'designation' => "Vice Chancellor, Amity University, Mumbai", 'category' => 'advisory_committee', 'subcategory' => 'national', 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Prof. K.R.S Sambasiva Rao', 'designation' => "Vice Chancellor at Dr. RVR NRI Institute of Technology Deemed to be University, Vijayawada, Andhra Pradesh, India", 'category' => 'advisory_committee', 'subcategory' => 'national', 'sort_order' => $sort++, 'is_active' => true]);

// ORGANISING SECRETARY
CommitteeMember::create(['name' => 'Dr. K. Kavitha', 'designation' => "Associate Professor, Department of Microbiology", 'category' => 'leadership', 'subcategory' => 'organizing_secretaries', 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Dr. Bebin. A', 'designation' => "Assistant Professor, Department of Chemistry (SFS)", 'category' => 'leadership', 'subcategory' => 'organizing_secretaries', 'sort_order' => $sort++, 'is_active' => true]);

// ORGANISING COMMITTEE
CommitteeMember::create(['name' => 'Dr. S. Niren Andrew', 'designation' => "Assistant Professor, Department of Microbiology", 'category' => 'organizing_committee', 'subcategory' => null, 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Dr. S. Premina', 'designation' => "Assistant Professor, Department of Microbiology", 'category' => 'organizing_committee', 'subcategory' => null, 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Dr. S. Abirami', 'designation' => "Assistant Professor, Department of Microbiology", 'category' => 'organizing_committee', 'subcategory' => null, 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Dr. P. Hanumantha Rao', 'designation' => "Associate Professor, Department of Microbiology", 'category' => 'organizing_committee', 'subcategory' => null, 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Dr. T. Sathish Kumar', 'designation' => "Associate Professor, Department of Microbiology", 'category' => 'organizing_committee', 'subcategory' => null, 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Dr. V. Vedha', 'designation' => "Assistant Professor, Department of Microbiology", 'category' => 'organizing_committee', 'subcategory' => null, 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Dr. K. Balakumar', 'designation' => "Assistant Professor, Department of Microbiology", 'category' => 'organizing_committee', 'subcategory' => null, 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Dr. Neginah Vijayasingh J', 'designation' => "Assistant Professor, Department of Microbiology", 'category' => 'organizing_committee', 'subcategory' => null, 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Dr. Daniel Abraham', 'designation' => "Assistant Professor, Department of Chemistry (SFS)", 'category' => 'organizing_committee', 'subcategory' => null, 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Dr. K. Vijayalakshmi', 'designation' => "Assistant Professor, Department of Chemistry (SFS)", 'category' => 'organizing_committee', 'subcategory' => null, 'sort_order' => $sort++, 'is_active' => true]);
CommitteeMember::create(['name' => 'Dr. T. Premalatha', 'designation' => "Medical Officer, Madras Christian College", 'category' => 'organizing_committee', 'subcategory' => null, 'sort_order' => $sort++, 'is_active' => true]);

echo "Committee updated! Total members: " . CommitteeMember::count() . "\n";
