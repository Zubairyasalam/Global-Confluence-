<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AwardApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'award_name',
        'file_path',
        'original_filename'
    ];
}
