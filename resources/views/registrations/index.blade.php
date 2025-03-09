<!-- resources/views/registrations/index.blade.php -->

@extends('layouts.app')

@section('title', 'Registrasi Saya - HMTI')

@section('content')
    <!-- Success Alert -->
    @if (session('success'))
        <div x-data="{ show: true }" 
             x-show="show" 
             x-init="setTimeout(() => show = false, 3000)"
             class="fixed top-24 md:top-32 right-4 z-50 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-lg" 
             role="alert">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="block">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <div class="pt-20 md:pt-28 overflow-visible relative">
        <div class="min-h-screen bg-gradient-to-br from-purple-50 to-purple-100">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center text-indigo-900 mb-8 font-serif" data-aos="fade-down">Registrasi Saya</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
                    @forelse ($registrations as $registration)
                        <div class="bg-white p-6 rounded-lg shadow-lg text-center h-full flex flex-col justify-between" style="height: 420px;" data-aos="flip-left">
                            <h3 class="text-xl font-bold mb-2 font-serif">{{ $registration->event->name }}</h3>
                            
                            <!-- Status Registrasi -->
                            <p class="text-sm text-gray-600">Status: 
                                @if ($registration->status === 'approved')
                                    <span class="text-green-600 font-semibold">Disetujui</span>
                                @elseif ($registration->status === 'rejected')
                                    <span class="text-red-600 font-semibold">Ditolak</span>
                                @else
                                    <span class="text-yellow-600 font-semibold">Menunggu</span>
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
                        <div class="col-span-3 text-center py-8">
                            <p class="text-gray-600">Belum ada registrasi.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="//unpkg.com/alpinejs" defer></script>