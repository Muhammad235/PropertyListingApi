<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyCharacteristics extends Model
{
    use HasFactory;

    protected $fillable = ['property_id', 'price','bedrooms', 'sqrt', 'price_sqrt', 'property_type', 'bathrooms', 'status'
    ];
}
