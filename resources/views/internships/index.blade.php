@extends('layouts.app')

@section('content')
<script src="//unpkg.com/alpinejs" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white">
    <!-- Hero Section -->
    <div class="relative pt-32 pb-16 bg-gradient-to-r from-blue-600 to-indigo-700">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-700 mix-blend-multiply"></div>
            <div class="absolute inset-0 bg-[url('/img/grid.svg')] opacity-10"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                    Program Magang
                </h1>
                <p class="mt-6 max-w-2xl mx-auto text-xl text-blue-100">
                    Temukan peluang magang terbaik untuk mengembangkan karir profesionalmu
                </p>
            </div>
        </div>
    </div>

    <form action="{{ route('internships') }}" method="GET">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="relative">
            <input type="text" name="search" placeholder="Cari posisi magang..." 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                   value="{{ request('search') }}">
        </div>
        <div class="relative">
            <select name="location" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">Semua Lokasi</option>
                @foreach($locations as $location)
                    <option value="{{ $location }}" {{ request('location') == $location ? 'selected' : '' }}>
                        {{ $location }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-200 flex items-center justify-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <span>Cari</span>
        </button>
    </div>
</form>



    <!-- Internship Cards -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach($internships as $internship)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        </div>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $internship->deadline->isPast() ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                            {{ $internship->deadline->isPast() ? 'Ditutup' : 'Dibuka' }}
                        </span>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $internship->title }}</h3>
                    <p class="text-blue-600 font-semibold mb-4">{{ $internship->company }}</p>
                    
                    <div class="space-y-3 text-sm text-gray-600">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            </svg>
                            {{ $internship->location }}
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Deadline: {{ $internship->deadline->format('d M Y') }}
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('internships.show', $internship) }}" 
                           class="block w-full text-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true
        });
    });
</script>
@endsection