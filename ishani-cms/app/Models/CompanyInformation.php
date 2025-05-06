<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_overview',
        'company_overview_image',
        'manufacturing_facility_header',
        'manufacturing_facility_description',
        'manufacturing_facility_images',
        'manufacturing_facility_images_alt',
        'leadership_team',
        'leadership_team_images_alt'
    ];

    protected $casts = [
        'manufacturing_facility_images' => 'array',
        'manufacturing_facility_images_alt' => 'array', // Add this
        'leadership_team' => 'array',
        'leadership_team_images_alt' => 'array'
    ];

    protected static function booted()
{
    static::saving(function ($model) {
        // Ensure alt texts array matches images array
        if ($model->manufacturing_facility_images && !$model->manufacturing_facility_images_alt) {
            $model->manufacturing_facility_images_alt = array_fill(
                0, 
                count($model->manufacturing_facility_images), 
                ['alt' => '']
            );
        }

        if ($model->leadership_team) {
            $model->leadership_team_images_alt = array_map(
                fn($i) => $model->leadership_team_images_alt[$i] ?? ['alt' => ''],
                array_keys($model->leadership_team)
            );
        }
    });
}


}