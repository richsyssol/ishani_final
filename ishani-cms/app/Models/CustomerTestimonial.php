<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerTestimonial extends Model
{
    protected $table = 'customer_testimonials';

    protected $fillable = [
        'quote',
        'name',
        'location',
        'rating',
        'order',
        'is_visible'
    ];

    protected $casts = [
        'is_visible' => 'boolean',
         'rating' => 'integer'
    ];

     public static function rules()
    {
        return [
            'rating' => 'required|integer|min:1|max:5',
            // ... other rules
        ];
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
