<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'image',
        'is_featured',
        'is_popular',
        'is_new',
        'rating',
        'review_count',
        'calories',
        'preparation_time',
        'ingredients',
        'customizations'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_popular' => 'boolean',
        'is_new' => 'boolean',
        'price' => 'decimal:2',
        'rating' => 'decimal:1',
        'ingredients' => 'array',
        'customizations' => 'array'
    ];
}