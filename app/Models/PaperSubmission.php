<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaperSubmission extends Model
{
    protected $fillable = [
        'title',
        'name',
        'email',
        'contact_number',
        'organization',
        'country',
        'interested_in',
        'track',
        'abstract_file_path',
        'form_data'
    ];

    protected $casts = [
        'form_data' => 'array',
    ];
}
