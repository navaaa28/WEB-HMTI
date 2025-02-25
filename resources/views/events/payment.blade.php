@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-gradient-primary text-white text-center">
                    <h3 class="mb-0">Pembayaran Registrasi</h3>
                </div>
                <div class="card-body text-center">
                    <p class="lead">Silakan selesaikan pembayaran untuk mendaftar di acara ini.</p>
                    
                    <button id="pay-button" class="btn btn-success btn-lg w-100">
                        <i class="fas fa-credit-card"></i> Bayar Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
    document.getElementById('pay-button').onclick = function() {
        snap.pay("{{ $snapToken }}");
    };
</script>
@endsection
