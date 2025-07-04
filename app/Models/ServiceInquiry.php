<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceInquiry extends Model
{
    use HasFactory;

    protected $fillable = ['service', 'name', 'email', 'phone', 'message'];
}
