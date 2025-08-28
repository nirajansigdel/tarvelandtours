<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoverImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image'
    ];

    // ✅ Add this to fix array-to-string conversion error
    protected $casts = [
        'image' => 'array',
    ];
}
