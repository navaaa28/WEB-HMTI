@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h3 class="mb-0">Pembayaran Tiket: {{ $event->name }}</h3>
                </div>
                <div class="card-body">
                    <p><strong>Nama Acara:</strong> {{ $event->name }}</p>
                    <p><strong>Tanggal:</strong> {{ $event->event_date->format('d M Y H:i') }}</p>
                    <p><strong>Harga Tiket:</strong> Rp {{ number_format($event->price, 0, ',', '.') }}</p>

                    <button id="pay-button" class="btn btn-success w-100">Bayar Sekarang</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script>
    document.getElementById('pay-button').onclick = function () {
        snap.pay("{{ $snapToken }}", {
            onSuccess: function(result) {
                window.location.href = "{{ route('payment.success', ['orderId' => $orderId]) }}";
            },
            onPending: function(result) {
                alert("Pembayaran belum selesai. Mohon selesaikan pembayaran.");
            },
            onError: function(result) {
                alert("Pembayaran gagal.");
            }
        });
    };
</script>
@endsection
