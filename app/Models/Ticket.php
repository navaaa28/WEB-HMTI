<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['registration_id', 'qr_code', 'user_id', 'event_id',  'qr_data', 'status']; // Sesuaikan dengan kolom yang ada

    public function registration()
    {
        return $this->belongsTo(Registration::class, 'registration_id');
    }

    public function user()
    {
        return $this->hasOneThrough(
            User::class,          // Target model (users)
            Registration::class,  // Model perantara (registrations)
            'id',                 // Foreign key pada registrations
            'id',                 // Foreign key pada users
            'registration_id',   // Local key pada tickets
            'user_id'            // Local key pada registrations
        );
    }
    public function event()
    {
        return $this->hasOneThrough(
            Event::class,        // Target model (events)
            Registration::class, // Model perantara (registrations)
            'id',                // Foreign key pada registrations
            'id',                // Foreign key pada events
            'registration_id',   // Local key pada tickets
            'event_id'           // Local key pada registrations
        );
    }
}