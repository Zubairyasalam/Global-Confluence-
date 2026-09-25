<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Speaker;

// Delete Adrian Loo speaker entry
Speaker::where('name', 'like', '%Adrian%')->orWhere('name', 'like', '%Loo%')->delete();
Speaker::where('name', 'like', '%Ravikanth%')->delete();

Speaker::create([
    'type' => 'distinguished',
    'name' => 'Dr. G. Ravikanth',
    'title' => 'Senior Fellow & Convenor, Academy for Conservation Science and Sustainability Studies',
    'current_role' => 'Senior Fellow & Convenor, Academy for Conservation Science and Sustainability Studies, ATREE, Bengaluru, India',
    'university' => 'ATREE, Bengaluru',
    'country' => 'India',
    'image_path' => 'images/ravikanth.jpg',
    'sort_order' => 5,
    'field' => 'Conservation Genetics, Biodiversity & Ecosystem Sustainability',
    'biography' => "Dr. G. Ravikanth is a Senior Fellow and Convenor at the Academy for Conservation Science and Sustainability Studies, Ashoka Trust for Research in Ecology and the Environment (ATREE), Bengaluru. His research focuses on plant population genetics, conservation of threatened flora, DNA barcoding, and sustainable resource management.",
    'education' => 'PhD in Plant Genetics / Botany; MSc & BSc in Biological Sciences.',
    'honours' => 'Senior Fellow & Convenor, ATREE; Leading expert in South Asian forest genetic resources and biodiversity conservation.',
    'key_achievements' => "• Senior Fellow & Convenor, Academy for Conservation Science and Sustainability Studies, ATREE.\n• Leading extensive research on Western Ghats biodiversity, DNA barcoding, and endangered plant conservation.\n• Author of numerous high-impact publications in international conservation and genetics journals.",
    'relevance' => 'Dr. Ravikanth provides crucial expertise on ecosystem resilience, biodiversity conservation, and planetary health.'
]);

echo "Replaced Dr. Adrian Loo with Dr. G. Ravikanth successfully!\n";
