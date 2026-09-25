<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'organization', 'interested_in',
        'form_data', 'payment_status', 'payment_method', 'total_amount',
        'category_name', 'addons'
    ];

    protected $casts = [
        'form_data' => 'array',
        'addons' => 'array',
    ];
}
