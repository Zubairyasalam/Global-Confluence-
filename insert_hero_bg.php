<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

\App\Models\SiteSetting::firstOrCreate(
    ['key' => 'hero_bg_image'],
    ['group' => 'hero', 'value' => 'images/hero-bg.png', 'type' => 'image', 'label' => 'Hero Background Image']
);
echo "Hero background image setting inserted.\n";
