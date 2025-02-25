<?php

namespace App\Observers;

use App\Models\Registration;
use App\Models\Ticket;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class RegistrationObserver
{
    /**
     * Handle the Registration "updated" event.
     */
    public function updated(Registration $registration): void
    {
        // Cek jika status berubah menjadi 'approved' dan tiket belum ada
        if ($registration->status === 'approved' && !$registration->ticket) {
            $event = $registration->event;
            $user = $registration->user;

            // Data QR code (string informasi event)
            $qrData = "EVENT: {$event->name}\nNIM: {$user->nim}\nNAMA: {$user->name}\nREG_ID: {$registration->id}";

            // Path file QR code
            $qrPath = 'qr_codes/event_' . $registration->event_id . '_user_' . $registration->user_id . '.png';

            // Generate QR code dan simpan ke storage
            QrCode::size(200)->format('png')->generate($qrData, storage_path('app/public/' . $qrPath));

            // Simpan tiket dengan path QR Code dan data QR code
            Ticket::create([
                'registration_id' => $registration->id,
                'user_id' => $registration->user_id,
                'event_id' => $registration->event_id,
                'qr_code' => $qrPath, // Simpan path file QR Code
                'qr_data' => $qrData, // Simpan data QR code (string informasi event)
            ]);
        }
    }

    /**
     * Handle the Registration "deleted" event.
     */
    public function deleted(Registration $registration): void
    {
        // Hapus tiket terkait jika registrasi dihapus
        $registration->ticket()->delete();
    }
}