<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FranchiseTestimonial extends Model
{
    protected $fillable = [
        'name',
        'location',
        'quote',
        'rating'
    ];
    
    protected $casts = [
        'rating' => 'integer'
    ];
}
