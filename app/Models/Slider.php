<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
     
    protected $fillable = ['type', 'slides'];

    protected $casts = [
        'slides' => 'array', // automatically cast JSON to array
    ];
}
