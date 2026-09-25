<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    protected $fillable = [
        'name',
        'icon',
        'icon_color',
        'short_description',
        'benefits',
        'eligibility',
        'guidelines',
        'sort_order',
    ];
}
