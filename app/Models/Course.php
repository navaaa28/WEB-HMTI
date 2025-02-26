<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = [
        'name',
        'code',
        'description',
        'semester'
    ];

    public function materials(): HasMany
    {
        return $this->hasMany(Material::class);
    }
}