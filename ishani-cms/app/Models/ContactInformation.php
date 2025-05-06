<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "contact_informations";
    protected $fillable = [
        'tel_number',
        'mobile_number',
        'email',
        'whatsapp_number',
        'corporate_address_line1',
        'corporate_address_line2',
        'corporate_address_line3',
        'corporate_address_line4',
        'corporate_address_line5',
        'factory_address_line1',
        'factory_address_line2',
        'factory_address_line3',
        'factory_address_line4',
        'factory_address_line5',
        'outlet_address_line1',
        'outlet_address_line2',
        'outlet_address_line3',
        'outlet_address_line4',
        'outlet_address_line5',
        'social_link_1',
        'social_link_2',
        'social_link_3',
        'social_link_4',
        'social_link_5',
        'open_hours',
        'by_road',
        'parking',
        'public_transport'
    ];
}