<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    protected $fillable = [
        'type',
        'name',
        'h_index',
        'university',
        'country',
        'title',
        'image_path',
        'sort_order',
        'biography',
        'field',
        'current_role',
        'education',
        'honours',
        'key_achievements',
        'relevance',
    ];
}
