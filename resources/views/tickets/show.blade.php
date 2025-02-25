@extends('layouts.app')
<script src="//unpkg.com/alpinejs" defer></script>
@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-4">Detail Tiket</h1>
        
        <!-- QR Code -->
        <div class="qr-code mb-4">
        <img src="{{ asset('storage/' . $ticket->qr_code) }}" alt="QR Code" class="mb-4">
        </div>

        <!-- Informasi Tiket -->
        <div class="ticket-info">
            <p class="text-gray-600"><strong>ID Registrasi:</strong> {{ $ticket->registration_id }}</p>
            <p class="text-gray-600"><strong>Tanggal Pembuatan:</strong> {{ $ticket->created_at->format('d M Y H:i') }}</p>
        </div>

        <!-- Tombol Kembali -->
        <div class="mt-6">
            <a href="{{ route('dashboard') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Kembali ke Dashboard
            </a>
        </div>
    </div>
</div>
@endsection