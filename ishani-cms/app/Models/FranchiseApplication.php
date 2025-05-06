<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FranchiseApplication extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'preferred_city',
        'investment_capacity',
        'business_experience',
        'consent_marketing'
    ];

    protected $casts = [
    'consent_marketing' => 'boolean'
];
}
