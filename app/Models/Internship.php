<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'location',
        'description',
        'requirements',
        'start_date',
        'end_date',
        'duration',
        'deadline',
        'image',
        'benefits',
        'contact_person',
        'contact_email',
        'contact_phone',
        'status',
        'apply_url'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'deadline' => 'date',
    ];
}