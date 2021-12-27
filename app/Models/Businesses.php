<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Businesses extends Model
{
    use HasFactory;

    protected $fillable = ['business_name', 'industry_id', 'business_image', 'business_location', 'business_description', 'user_id'];
}
