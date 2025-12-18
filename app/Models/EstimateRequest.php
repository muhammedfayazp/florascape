<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimateRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_type',
        'square_feet',
        'services',
        'estimate_min',
        'estimate_max',
        'estimate_average',
        'user_name',
        'user_email',
        'user_phone',
        'status',
        'admin_notes',
    ];

    protected $casts = [
        'services' => 'array',
        'square_feet' => 'decimal:2',
        'estimate_min' => 'decimal:2',
        'estimate_max' => 'decimal:2',
        'estimate_average' => 'decimal:2',
    ];
}
