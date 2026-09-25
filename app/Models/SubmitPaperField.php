<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmitPaperField extends Model
{
    protected $fillable = [
        'name', 'label', 'type', 'placeholder',
        'is_required', 'options', 'grid_column', 'sort_order'
    ];

    protected $casts = [
        'is_required' => 'boolean',
        'options' => 'array',
    ];
}
