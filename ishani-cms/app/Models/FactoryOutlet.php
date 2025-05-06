<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactoryOutlet extends Model
{
    use HasFactory;

    protected $fillable = [
        'header',
        'text_content',
        'location_line_1',
        'location_line_2',
        'location_line_3',
        'location_line_4',
        'opening_hours_line_1',
        'opening_hours_line_2',
        'contact_number',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    // Accessor for full address
    public function getFullAddressAttribute()
    {
        return collect([
            $this->location_line_1,
            $this->location_line_2,
            $this->location_line_3,
            $this->location_line_4
        ])->filter()->join("\n");
    }

    // Accessor for opening hours
    public function getFullOpeningHoursAttribute()
    {
        return collect([
            $this->opening_hours_line_1,
            $this->opening_hours_line_2
        ])->filter()->join("\n");
    }
}