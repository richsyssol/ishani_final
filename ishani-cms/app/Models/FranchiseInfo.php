<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FranchiseInfo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'benefits',
        'support',
        'expansion_cities',
        'brochure_file' 
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'expansion_cities' => 'array',
    ];

    /**
     * Get the first (and only) instance or create if not exists.
     *
     * @return \App\Models\FranchiseInfo
     */
    public static function getInstance()
    {
        return static::firstOrCreate([]);
    }
}