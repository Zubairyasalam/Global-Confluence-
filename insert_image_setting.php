<?php
use Illuminate\Database\Eloquent\Model;
Model::unguard();

\App\Models\SiteSetting::firstOrCreate(
    ['key' => 'deadlines_image'],
    ['value' => 'https://images.unsplash.com/photo-1506784983877-45594efa4cbe?q=80&w=600&h=500&fit=crop&crop=center', 'group' => 'deadlines', 'type' => 'image', 'label' => 'Section Image']
);
echo "Image setting added.\n";
