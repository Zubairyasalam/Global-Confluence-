<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deadline extends Model
{
    protected $fillable = [
        'phase',
        'title',
        'date_text',
        'deadline_date',
        'description',
        'icon',
        'tag_label',
        'tag_icon',
        'color_theme',
        'is_active',
        'sort_order'
    ];
}
