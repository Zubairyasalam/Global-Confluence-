<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Speaker;

// Delete Vinu speaker entry
Speaker::where('name', 'like', '%Vinu%')->delete();
Speaker::where('name', 'like', '%Murthy%')->delete();

Speaker::create([
    'type' => 'distinguished',
    'name' => 'Dr. G. S. Murthy',
    'title' => 'Professor & Head, Centre for Scientific Indian Knowledge Systems',
    'current_role' => 'Professor & Head, Centre for Scientific Indian Knowledge Systems, Indian Institute of Technology Indore, India',
    'university' => 'IIT Indore',
    'country' => 'India',
    'image_path' => 'images/gs_murthy.jpg',
    'sort_order' => 3,
    'field' => 'Scientific Indian Knowledge Systems & Interdisciplinary Engineering',
    'biography' => "Dr. G. S. Murthy is a Professor and Head of the Centre for Scientific Indian Knowledge Systems at the Indian Institute of Technology (IIT) Indore. His work focuses on scientific validation, preservation, and modern technological integration of traditional Indian knowledge systems, biosystems engineering, and sustainable technologies.",
    'education' => 'PhD in Biological & Agricultural Engineering; M.Tech & B.Tech in Agricultural & Food Engineering.',
    'honours' => 'Head of Centre for Scientific Indian Knowledge Systems, IIT Indore; Renowned academician in IKS and sustainable engineering.',
    'key_achievements' => "• Head of the Centre for Scientific Indian Knowledge Systems, IIT Indore.\n• Leading groundbreaking research on scientific validation and modern integration of traditional Indian knowledge.\n• Published extensively in international peer-reviewed journals.",
    'relevance' => 'Dr. Murthy brings authoritative expertise on Indian Knowledge Systems (IKS), traditional health practices, and modern scientific synthesis.'
]);

echo "Replaced Professor Ajayan Vinu with Dr. G. S. Murthy successfully!\n";
