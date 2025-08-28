<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Demand extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'country_id',              // foreign key for country if applicable
        'heading',                 // string
        'subtitle',                // string nullable
        'from_date',               // date
        'to_date',                 // date
        'content',                 // text
        'image',                   // string path to image
        'vacancy',                 // integer or string (depends on your data)
        'number_of_people_required', // integer
        'type',                    // string (single type)
        'demand_types',            // JSON array of types
        'transporta',              // string (transportation details)
        'include',                 // string or text (included features)
        'price_rate',              // float or decimal (price/rate)
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'demand_types' => 'array',       // cast JSON to array automatically
        'from_date' => 'date',
        'to_date' => 'date',
        'price_rate' => 'float',
        'vacancy' => 'integer',
        'number_of_people_required' => 'integer',
    ];

    /**
     * Relationship with Country model.
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Scope a query to only include active demands (where to_date is today or in future).
     */
    public function scopeActive(Builder $query)
    {
        return $query->where('to_date', '>=', now()->toDateString());
    }
}
