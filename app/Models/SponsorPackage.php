<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SponsorPackage extends Model
{
    protected $fillable = [
        'name', 'price', 'features', 'ribbon_color', 'type', 'sort_order', 'is_active'
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean'
    ];
}
