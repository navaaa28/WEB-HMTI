@extends('layouts.app')
<script src="//unpkg.com/alpinejs" defer></script>
@section('content')
    <div class="min-h-screen bg-gradient-to-br from-purple-50 to-purple-100 py-8 sm:py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Card Container -->
            <div class="bg-white rounded-xl shadow-2xl overflow-hidden transition-all duration-300 hover:shadow-lg">
                <!-- Header Section -->
                <div class="bg-gradient-to-r from-indigo-900 to-purple-700 p-6 sm:p-8">
                    <div class="flex flex-col sm:flex-row justify-between items-start gap-4 sm:gap-0">
                        <div>
                            <h1 class="text-2xl sm:text-3xl font-bold text-white font-serif mb-2">{{ $event->name }}</h1>
                            <div class="flex items-center text-purple-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span>{{ $event->event_date->format('d F Y') }}</span>
                            </div>
                        </div>
                        <span class="px-4 py-2 rounded-full bg-white bg-opacity-20 text-sm font-medium text-purple-100">
                            {{ $event->registration_open ? '🟢 Pendaftaran Dibuka' : '🔴 Pendaftaran Ditutup' }}
                        </span>
                    </div>
                </div>

                <!-- Image Section -->
                @if($event->photo)
                    <div class="relative h-48 sm:h-64 md:h-96 overflow-hidden">
                        <img src="{{ asset('storage/' . $event->photo) }}" alt="{{ $event->name }}" 
                             class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                    </div>
                @endif

                <!-- Content Section -->
                <div class="p-6 sm:p-8 space-y-6">
                    <!-- Description -->
                    <div class="prose max-w-none text-gray-700">
                        {!! nl2br(e($event->description)) !!}
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        @if ($event->registration_open)
                            <a href="{{ route('events.register.form', $event->id) }}" 
                               class="inline-flex items-center justify-center px-6 py-3 bg-indigo-900 text-white rounded-lg hover:bg-purple-800 transition-all duration-300 group">
                                <svg class="w-5 h-5 mr-2 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                Daftar Sekarang
                            </a>
                        @endif

                        <a href="{{ url()->previous() }}" 
                           class="inline-flex items-center justify-center px-6 py-3 border border-purple-200 text-indigo-900 rounded-lg hover:bg-purple-50 transition-colors duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali ke Daftar Acara
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection