<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable=[
        'long_description',
        'images',
        'short_description'
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
