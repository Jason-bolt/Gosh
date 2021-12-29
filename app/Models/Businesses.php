<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Businesses extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['business_name', 'industry_id', 'business_image', 'business_location', 'business_description', 'business_brief', 'user_id'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function business_industry(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Industries::class);
    }
}
