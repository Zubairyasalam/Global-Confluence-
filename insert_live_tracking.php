<?php
use Illuminate\Database\Eloquent\Model;
Model::unguard();

\App\Models\SiteSetting::firstOrCreate(
    ['key' => 'venue_high_live_tracking'],
    ['value' => 'https://maps.google.com/?q=Madras+Christian+College', 'group' => 'venue_highlights', 'type' => 'text', 'label' => 'Live Tracking Location Link']
);

echo "Live tracking setting added.\n";
