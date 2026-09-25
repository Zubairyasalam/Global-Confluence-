<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationField extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'label', 'type', 'placeholder', 'is_required', 'options', 'grid_column', 'sort_order'
    ];

    protected $casts = [
        'is_required' => 'boolean',
        'options' => 'array',
    ];
}
