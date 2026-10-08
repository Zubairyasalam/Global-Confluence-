<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'title', 'name', 'email', 'phone', 'gender', 'organization', 'city', 'country', 'postal_code',
        'interested_in', 'reg_category', 'form_data', 'payment_status', 'payment_method',
        'total_amount', 'category_name', 'addons', 'registration_type', 'presentation_event_type',
        'presentation_track', 'abstract_file', 'id_card_file', 'payment_receipt_file'
    ];

    protected $casts = [
        'form_data' => 'array',
        'addons' => 'array',
    ];
}
