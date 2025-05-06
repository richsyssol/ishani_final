<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'client_type',
        'before_image',
        'after_image',
        'description',
        'products_used',
        'date',
        'seo_title'
    ];

    protected $casts = [
        'products_used' => 'array',
    ];

    public function getBeforeImageUrlAttribute()
    {
        return $this->before_image ? asset('storage/' . $this->before_image) : null;
    }

    public function getAfterImageUrlAttribute()
    {
        return $this->after_image ? asset('storage/' . $this->after_image) : null;
    }

    // Scopes for filtering
    public function scopeLocation($query, $location)
    {
        return $query->where('location', $location);
    }

    public function scopeClientType($query, $clientType)
    {
        return $query->where('client_type', $clientType);
    }
}