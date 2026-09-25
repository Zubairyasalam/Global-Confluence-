<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$html = '<div style="text-align: center; padding: 60px 20px; color: #555; background: #f8f9fa; border: 1px solid #eaeaea; border-radius: 12px; font-size: 1.2rem; max-width: 600px; margin: 0 auto;">
    <i class="fa-solid fa-building-user" style="font-size: 3rem; color: #ccc; margin-bottom: 20px; display: block;"></i>
    <h3 style="font-size: 1.5rem; color: #333; margin-bottom: 10px; font-weight: 700;">Information Coming Soon</h3>
    <p style="font-size: 1rem; color: #666; margin: 0; line-height: 1.6;">Details about the organizer will be updated shortly. Please check back later.</p>
</div>';

\App\Models\SiteSetting::updateOrCreate(
    ['group' => 'about_organizer', 'key' => 'about_organizer_content'],
    ['value' => $html]
);

echo "Placeholder updated successfully.\n";
