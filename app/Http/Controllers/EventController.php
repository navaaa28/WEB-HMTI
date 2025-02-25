<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Registration;
use App\Models\Ticket;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Payment;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    
    public function generateQrCode(Registration $registration)
    {
        $event = $registration->event;
        $user = $registration->user;

        $qrData = "EVENT: {$event->name}\nNIM: {$user->nim}\nNAMA: {$user->name}\nREG_ID: {$registration->id}";
        $qrPath = 'qr_codes/event_' . $registration->event_id . '_user_' . $registration->user_id . '.png';

        QrCode::size(200)->format('png')->generate($qrData, storage_path('app/public/' . $qrPath));

        return $qrPath; // Mengembalikan path QR Code yang sudah dibuat
    }

    // Proses penyimpanan pembayaran
    public function storePayment(Request $request, Event $event)
    {
        try {
            // Debugging: Cek data yang dikirim
            Log::info('Request Data:', $request->all());

            // Validasi file bukti pembayaran
            $request->validate([
                'payment_proof' => 'required|image|mimes:jpg,png,jpeg|max:2048', // Maksimal 2MB
                'payment_method_id' => 'required|exists:payment_methods,id',
            ]);

            // Cek apakah user sudah memiliki pendaftaran yang masih dalam proses
            $existingRegistration = Registration::where('user_id', auth()->id())
                ->where('event_id', $event->id)
                ->whereIn('status', ['pending', 'approved'])
                ->first();

            if ($existingRegistration) {
                return redirect()->back()->with('error', 'Anda sudah melakukan pembayaran atau masih dalam proses.');
            }

            // Simpan file bukti pembayaran
            if ($request->hasFile('payment_proof')) {
                $path = $request->file('payment_proof')->store('payments', 'public');

                // Simpan ke database
                $registration = Registration::create([
                    'user_id' => auth()->id(),
                    'event_id' => $event->id,
                    'payment_method_id' => $request->payment_method_id,
                    'payment_proof' => $path,
                    'status' => 'pending', // Status awal
                ]);

                Log::info('Registration created:', $registration->toArray());

                return redirect()->route('events.register', $event->id)->with('success', 'Pembayaran berhasil dikirim! Tunggu konfirmasi panitia.');
            }

            return redirect()->back()->with('error', 'Gagal mengunggah bukti pembayaran.');
        } catch (\Exception $e) {
            Log::error('Error in storePayment:', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses pembayaran.');
        }
    }

    // Menampilkan form pendaftaran untuk event
    public function showRegisterForm($id)
    {
        $event = Event::findOrFail($id);
        $paymentMethods = PaymentMethod::all();
        return view('events.register', compact('event', 'paymentMethods'));
    }

    // Proses pendaftaran ke event
    public function register(Request $request, Event $event)
    {
        // Cek apakah pendaftaran dibuka
        if (!$event->registration_open) {
            return redirect()->back()->with('error', 'Pendaftaran untuk acara ini ditutup.');
        }

        // Cek apakah user sudah terdaftar di event ini
        $existingRegistration = auth()->user()->registrations()
            ->where('event_id', $event->id)
            ->whereIn('status', ['pending', 'approved']) // Hanya cek pending atau approved
            ->first();

        if ($existingRegistration) {
            return redirect()->back()->with('error', 'Anda sudah terdaftar dan masih dalam proses.');
        }

        // Cek apakah event ini berbayar atau gratis
        $isPaidEvent = $event->price > 0; // Event berbayar jika price > 0

        if ($isPaidEvent) {
            // Pastikan user sudah membayar jika event berbayar
            $payment = Registration::where('user_id', auth()->id())
                ->where('event_id', $event->id)
                ->whereNotNull('payment_proof') // Pastikan sudah mengunggah bukti pembayaran
                ->where('status', 'approved') // Pastikan pembayaran disetujui
                ->first();

            if (!$payment) {
                return redirect()->back()->with('error', 'Silakan selesaikan pembayaran sebelum mendapatkan tiket.');
            }
        }

        // Buat registrasi baru dengan status sesuai jenis event
        $registration = Registration::create([
            'user_id' => auth()->id(),
            'event_id' => $event->id,
            'status' => $isPaidEvent ? 'pending' : 'approved', // Jika gratis, langsung approve
        ]);

        // Generate tiket untuk event berbayar juga
        return $this->generateTicket($registration);
    }

    /**
     * Fungsi untuk generate tiket dan redirect ke halaman tiket
     */
    private function generateTicket(Registration $registration)
    {
        $event = $registration->event;
        $user = $registration->user;

        // Data QR code (string informasi event)
        $qrData = "EVENT: {$event->name}\nNIM: {$user->nim}\nNAMA: {$user->name}\nREG_ID: {$registration->id}";

        // Path file QR code
        $qrPath = 'qr_codes/event_' . $registration->event_id . '_user_' . $registration->user_id . '.png';

        // Generate QR code dan simpan ke storage
        QrCode::size(200)->format('png')->generate($qrData, storage_path('app/public/' . $qrPath));

        // Simpan tiket dengan path QR Code dan data QR code
        $ticket = Ticket::create([
            'registration_id' => $registration->id,
            'user_id' => $registration->user_id,
            'event_id' => $event->id,
            'qr_code' => $qrPath, // Simpan path file QR Code
            'qr_data' => $qrData, // Simpan data QR code (string informasi event)
        ]);

        return redirect()->route('tickets.show', $ticket->id)->with('success', 'Pendaftaran berhasil! Silakan simpan tiket Anda.');
    }

    // Menampilkan semua event
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    // Menampilkan detail event
    public function show($id)
    {
        $event = Event::findOrFail($id);
        $paymentMethods = PaymentMethod::all();
        return view('events.show', compact('event', 'paymentMethods'));
    }
}