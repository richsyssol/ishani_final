<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'icon',
        'description',
        'product_descriptor',
        'benefits',
        'collection_text_template'
    ];
    protected $casts = ['benefits' => 'array'];

    /**
     * Get all products for the category.
     */

     public function getEffectiveBenefitsAttribute()
{
    // Check if benefits is not null and not empty array
    if ($this->benefits && count(array_filter($this->benefits))) {
        return array_map(fn($b) => (object)$b, $this->benefits);
    }
    
    return [DefaultBenefit::getDefault()];
}
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get the icon attribute with proper formatting.
     */
    
}