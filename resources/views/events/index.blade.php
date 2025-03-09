@extends('layouts.app')

@section('content')
<div class="pt-20 md:pt-28 overflow-visible relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Daftar Event</h1>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($events as $event)
                    <div class="bg-white border rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold text-gray-900 mb-2">{{ $event->name }}</h2>
                            <p class="text-gray-600 mb-4">{{ $event->description }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">{{ $event->start_date->format('d M Y') }}</span>
                                <a href="{{ route('public.events.show', $event->id) }}" 
                                   class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500">Tidak ada event yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection