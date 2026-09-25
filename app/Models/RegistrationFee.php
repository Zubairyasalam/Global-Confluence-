<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistrationFee extends Model
{
    protected $fillable = [
        'category_name', 'price_inr', 'price_online', 'price_usd',
        'features', 'is_active', 'sort_order', 'is_highlighted',
    ];
}
