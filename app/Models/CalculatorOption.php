<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculatorOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'value',
        'icon',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'value' => 'decimal:2',
    ];
}
