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
        'location',
        'transportation',
        'content',
        'image',
        'product_types',
        'status',
    ];

    protected $casts = [
        'date' => 'date',
        'people' => 'integer',
        'product_types' => 'array',
        'status' => 'boolean',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}


