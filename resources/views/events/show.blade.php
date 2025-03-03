@extends('layouts.app')
<script src="//unpkg.com/alpinejs" defer></script>

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-purple-50 to-purple-100 py-12">
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
                <div class="bg-gradient-to-r from-indigo-900 to-purple-800 p-6">
                    <div class="flex flex-col gap-3">
                        <div class="flex justify-between items-start">
                            <h1 class="text-2xl md:text-3xl font-bold text-white font-serif">{{ $event->name }}</h1>
                            <span class="px-3 py-1 rounded-full {{ $event->registration_open ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} text-sm font-medium">
                                {{ $event->registration_open ? '🟢 Pendaftaran Dibuka' : '🔴 Pendaftaran Ditutup' }}
                            </span>
                        </div>
                        <div class="flex items-center text-purple-200 text-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span>{{ $event->event_date->format('d F Y') }}</span>
                        </div>
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
    </div>
@endsection