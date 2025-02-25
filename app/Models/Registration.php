<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Registration extends Model
{
    protected $fillable = ['user_id', 'event_id', 'name', 'email', 'payment_proof', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function ticket()
    {
        return $this->hasOne(Ticket::class, 'registration_id');
    }
    public function payment()
{
    return $this->hasOne(Payment::class, 'registration_id');
}
protected static function booted()
{
    static::updated(function ($registration) {
        if ($registration->status === 'approved' && !$registration->ticket) {
            $eventController = app(\App\Http\Controllers\EventController::class);
            $qrPath = $eventController->generateQrCode($registration);

            Ticket::create([
                'registration_id' => $registration->id,
                'user_id' => $registration->user_id,
                'event_id' => $registration->event_id,
                'qr_code' => $qrPath, // Simpan path QR Code
            ]);
        }
    });
}

}