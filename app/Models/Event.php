<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'description',
        'event_date',
        'registration_open',
        'photo',
        'price',
        'is_visible',
        'location',
        'quota',
        'registration_deadline',
    ];
    public function isRegistered($userId)
{
    return $this->registrations()->where('user_id', $userId)->exists();
}
public function registrations()
{
    return $this->hasMany(Registration::class);
}
public function tickets()
{
    return $this->hasMany(Ticket::class, 'event_id');
}

protected $casts = [
    'event_date' => 'datetime',
    'registration_deadline' => 'datetime',
];
}