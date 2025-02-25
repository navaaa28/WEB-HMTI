<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Event;
use App\Models\Registration;
use Illuminate\Support\Facades\Http;


class PaymentController extends Controller
{

    
    public function processPayment(Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);

        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_ENV') === 'production';
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $orderId = uniqid();
        $transactionDetails = [
            'order_id' => $orderId,
            'gross_amount' => $event->price,
        ];

        $customerDetails = [
            'first_name' => auth()->user()->name,
            'email' => auth()->user()->email,
        ];

        $params = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails,
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('payments.pay', compact('snapToken', 'event', 'orderId'));
    }

    public function paymentSuccess(Request $request, $orderId)
    {
        // Simpan data registrasi setelah pembayaran sukses
        Registration::create([
            'user_id' => auth()->id(),
            'event_id' => session('event_id'),
            'status' => 'paid',
            'order_id' => $orderId
        ]);

        return redirect()->route('events.index')->with('success', 'Pembayaran berhasil! Anda telah terdaftar.');
    }
    public function updatePaymentStatus($orderId)
{
    $response = Http::withBasicAuth(env('MIDTRANS_SERVER_KEY'), '')
        ->get("https://api.sandbox.midtrans.com/v2/{$orderId}/status");

    $transaction = $response->json();

    if ($transaction['transaction_status'] == 'settlement') {
        // Update status pembayaran di database
        Registration::where('order_id', $orderId)->update(['status' => 'paid']);
        return response()->json(['message' => 'Pembayaran sukses'], 200);
    }

    return response()->json(['message' => 'Pembayaran masih pending'], 400);
}

}
