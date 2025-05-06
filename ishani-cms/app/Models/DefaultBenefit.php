<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DefaultBenefit extends Model
{
    protected $table = 'default_benefits'; // Singular table name
    protected $fillable = [
        'title',
        'description',
        'order'
    ];

    protected static function booted()
    {
        static::created(function () {
            // Ensure only one record exists
            if (self::count() > 1) {
                self::orderBy('id')->first()->delete();
            }
        });
    }
 public static function getDefault()
    {
        return self::firstOrCreate([], [
            'title' => 'Premium Quality',
            'description' => 'Manufactured to highest standards', 
            'icon' => '⭐'
        ]);
    }
     

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
