<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'src',
        'alt',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

     protected static function booted()
    {
        static::creating(function ($model) {
            // Only set order if not provided
            if (empty($model->order)) {
                $model->order = static::max('order') + 1;
            }
        });

        // Clear cache on changes
        static::saved(fn () => cache()->forget('gallery_items'));
        static::deleted(fn () => cache()->forget('gallery_items'));
    }
}
