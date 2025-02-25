<!-- resources/views/registrations/index.blade.php -->

@extends('layouts.app')

@section('title', 'Registrasi Saya - HMTI')
<script src="//unpkg.com/alpinejs" defer></script>
@section('content')
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-3xl font-bold text-center text-indigo-900 mb-8 font-serif" data-aos="fade-down">Registrasi Saya</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
            @forelse ($registrations as $registration)
                <div class="bg-white p-6 rounded-lg shadow-lg text-center h-full flex flex-col justify-between" style="height: 420px;" data-aos="flip-left">
                    <h3 class="text-xl font-bold mb-2 font-serif">{{ $registration->event->name }}</h3>
                    
                    <!-- Status Registrasi -->
                    <p class="text-sm text-gray-600">Status: 
                        @if ($registration->status === 'approved')
                            <span class="text-green-600 font-bold">Disetujui</span>
                        @elseif ($registration->status === 'pending')
                            <span class="text-yellow-600 font-bold">Menunggu Konfirmasi Admin</span>
                        @elseif ($registration->status === 'rejected')
                            <span class="text-red-600 font-bold">Pembayaran Tidak Disetujui</span>
                        @endif
                    </p>
                    
                    <!-- Menampilkan Nama, Email, dan NIM -->
                    <div class="mt-4 text-gray-700 text-sm">
                        <p><strong>Nama:</strong> {{ auth()->user()->name }}</p>
                        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                        <p><strong>NIM:</strong> {{ auth()->user()->nim ?? 'Belum diatur' }}</p>
                    </div>

                    @if ($registration->status === 'approved' && $registration->ticket)
                        <a href="{{ route('tickets.show', $registration->ticket->id) }}" 
                           class="mt-4 inline-block bg-indigo-900 text-white px-4 py-2 rounded hover:bg-purple-800">
                            Lihat Tiket
                        </a>
                    @endif
                </div>
            @empty
                <p class="text-gray-600 text-center col-span-3">Anda belum terdaftar di acara apapun.</p>
            @endforelse
        </div>
    </div>
@endsection