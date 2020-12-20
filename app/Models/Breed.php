<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Breed extends Eloquent
{
    protected $fillable = [
        'id',
        'name',
        'adaptability',
        'affection_level',
        'alt_names',
        'cfa_url'
    ];
}