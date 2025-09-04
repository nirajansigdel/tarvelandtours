<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'heading',
        'subtitle',
        'date',
        'duration',
        'people',
        'package',
        'original_price',
        'discounted_price',
        'location',
        'transportation',
        'content',
        'images',
        'product_types',
        'includes',
        'status',
    ];

    protected $casts = [
        'date' => 'date',
        'people' => 'integer',
        'product_types' => 'array',
        'images' => 'array',
        'includes' => 'array',
        'status' => 'boolean',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
