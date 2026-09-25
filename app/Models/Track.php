<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = [
        'title',
        'bullet_points',
        'sort_order'
    ];

    protected $casts = [
        'bullet_points' => 'array',
    ];
}
