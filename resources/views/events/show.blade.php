@extends('layouts.app')

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

    <section class="min-h-screen bg-gradient-to-br from-indigo-50 via-purple-50 to-purple-100 pt-20 md:pt-28 pb-16 relative overflow-visible">
        <div class="max-w-4xl mx-auto px-4">
            <!-- Breadcrumb -->
            <div class="mb-4 flex items-center text-sm text-gray-600">
                <a href="{{ route('dashboard') }}" class="hover:text-indigo-900 transition-colors">Home</a>
                <svg class="h-4 w-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-indigo-900 font-medium">Detail Acara</span>
            </div>

            <!-- Card Container -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-purple-100">
                <!-- Header Section -->
                <div class="bg-gradient-to-r from-indigo-900 to-purple-900 p-6 md:p-8">
                    <h1 class="text-2xl md:text-3xl font-bold text-white">{{ $event->name }}</h1>
                    <div class="mt-4 flex flex-wrap gap-4 text-white/90">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span>{{ \Carbon\Carbon::parse($event->event_date)->format('d F Y') }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>{{ \Carbon\Carbon::parse($event->event_date)->format('H:i') }} WIB</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>{{ $event->location }}</span>
                        </div>
                        @if($event->registration_open)
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-4.42-2.79-8.13-7-8.682z"/>
                                </svg>
                                <span class="text-green-100">Pendaftaran Dibuka</span>
                            </div>
                        @else
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-4.42-2.79-8.13-7-8.682z"/>
                                </svg>
                                <span class="text-red-100">Pendaftaran Ditutup</span>
                            </div>
                        @endif
                        @if($event->registration_deadline)
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Batas Pendaftaran: {{ $event->registration_deadline->format('d F Y, H:i') }}</span>
                            </div>
                        @endif
                        @if($event->quota > 0)
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                <span>Kuota: {{ $event->registrations()->whereIn('status', ['pending', 'approved'])->count() }}/{{ $event->quota }} Peserta</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Image Section -->
                @if($event->photo)
                    <div class="relative h-64 md:h-96 w-full overflow-hidden bg-gray-100">
                        <img src="{{ asset('storage/' . $event->photo) }}" 
                             alt="{{ $event->name }}" 
                             class="w-full h-full object-contain"
                             onerror="this.onerror=null; this.src='{{ asset('images/default-event.jpg') }}';">
                    </div>
                @endif

                <!-- Content Section -->
                <div class="p-6 md:p-8">
                    <!-- Description -->
                    <div class="prose max-w-none">
                        <div class="text-gray-700 text-base md:text-lg leading-relaxed space-y-4">
                            @foreach(explode("\n", $event->description) as $paragraph)
                                @if(!empty(trim($paragraph)))
                                    <p>{{ $paragraph }}</p>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 mt-8 border-t pt-6">
                        @if ($event->registration_open)
                            <a href="{{ route('events.register.form', $event->id) }}" 
                               class="flex-1 inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-indigo-900 to-purple-800 text-white rounded-lg hover:shadow-lg transition-all duration-300 group text-base font-medium">
                                <svg class="w-5 h-5 mr-2 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                Daftar Sekarang
                            </a>
                        @endif

                        <a href="{{ url()->previous() }}" 
                           class="flex-1 inline-flex items-center justify-center px-6 py-3 border-2 border-purple-200 text-indigo-900 rounded-lg hover:bg-purple-50 transition-all duration-300 text-base font-medium group">
                            <svg class="w-5 h-5 mr-2 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection