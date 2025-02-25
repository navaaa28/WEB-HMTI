<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MidtransController extends Controller
{
    public function approveTransaction($orderId)
    {
        $response = Http::withBasicAuth(env('MIDTRANS_SERVER_KEY'), '')
            ->post("https://api.sandbox.midtrans.com/v2/{$orderId}/approve");

        return response()->json($response->json());
    }
}

