<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Breed extends Eloquent
{

    protected $hidden = ['breed_id','created_at','updated_at'];
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'name',
        'adaptability',
        'affection_level',
        'alt_names',
        // 'cfa_url',
        'child_friendly',
        'country_code',
        'country_codes',
        'description',
        'dog_friendly',
        'energy_level',
        'experimental',
        'grooming',
        'hairless',
        'health_issues',
        'hypoallergenic',
        // 'image_height',
        // 'image_id',
        // 'image_url',
        // 'image_width',
        'indoor',
        'intelligence',
        'lap',
        'life_span',
        'natural',
        'origin',
        'rare',
        'reference_image_id',
        'rex',
        'shedding_level',
        'short_legs',
        'social_needs',
        'stranger_friendly',
        'suppressed_tail',
        'temperament',
        // 'vcahospitals_url',
        // 'vetstreet_url',
        'vocalisation',
        'weight_imperial',
        'weight_metric',
        'wikipedia_url'
    ];

}