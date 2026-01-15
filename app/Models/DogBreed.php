<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DogBreed extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'origin_country',
        'height_cm',
        'weight_kg',
        'recognized_since',
    ];
}
