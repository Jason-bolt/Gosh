<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industries extends Model
{
    use HasFactory;

    protected $fillable = ['industry'];

    public function businesses_with_industry(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Businesses::class);
    }
}
