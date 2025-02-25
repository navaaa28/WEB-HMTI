<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function verifyTicket(Request $request)
{
    // Ambil data QR code dari request
    $qrData = $request->input('qr_code');
    \Log::info('QR Code received:', ['qr_code' => $qrData]);

    // Cari tiket berdasarkan qr_data
    $ticket = Ticket::where('qr_data', $qrData)->first();

    if (!$ticket) {
        \Log::error('Ticket not found for QR code:', ['qr_code' => $qrData]);
        return response()->json(['success' => false, 'message' => 'Tiket tidak ditemukan'], 404);
    }

    // Cek apakah tiket sudah digunakan
    if ($ticket->status === 'used') {
        return response()->json(['success' => false, 'message' => 'Tiket sudah digunakan'], 400);
    }

    // Ubah status tiket menjadi 'used'
    $ticket->update(['status' => 'used']);

    return response()->json(['success' => true, 'message' => 'Tiket berhasil diverifikasi']);
}
public function show($id)
{
    $ticket = Ticket::findOrFail($id);
    return view('tickets.show', compact('ticket'));
}
}