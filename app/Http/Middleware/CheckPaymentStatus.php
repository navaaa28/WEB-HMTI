<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Payment;

class CheckPaymentStatus
{
    public function handle(Request $request, Closure $next)
    {
        $eventId = $request->route('event'); 
        $payment = Payment::where('user_id', auth()->id())
                          ->where('event_id', $eventId)
                          ->where('status', 'approved')
                          ->first();

        if (!$payment) {
            return redirect()->route('events.payment', $eventId)
                ->with('error', 'Anda belum menyelesaikan pembayaran atau pembayaran masih dalam proses.');
        }

        return $next($request);
    }
}

