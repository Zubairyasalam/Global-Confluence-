<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deadline extends Model
{
    protected $fillable = [
        'deadline_date',
        'title',
        'is_active',
        'sort_order'
    ];
}
