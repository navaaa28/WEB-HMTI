@extends('layouts.app')

@section('content')
    <!-- Article Header -->
    <section class="bg-gradient-to-r from-indigo-900 to-purple-900 text-white py-16 mt-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 font-serif" data-aos="fade-down">{{ $news->title }}</h1>
                <div class="flex items-center justify-center space-x-4 text-gray-200" data-aos="fade-up">
                    <span class="flex items-center">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        {{ $news->published_at->format('d M Y') }}
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Article Content -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <article class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up">
                        @if($news->image)
                            <div class="aspect-w-16 aspect-h-9">
                                <img src="{{ asset('storage/' . $news->image) }}" 
                                     alt="{{ $news->title }}" 
                                     class="w-full h-full object-cover">
                            </div>
                        @endif
                        
                        <div class="p-6 md:p-8 prose prose-lg max-w-none">
                            {!! $news->content !!}
                        </div>
                        
                        <!-- Share Buttons -->
                        <div class="border-t border-gray-100 p-6 bg-gray-50">
                            <div class="flex items-center justify-between">
                                <h3 class="text-gray-700 font-medium">Bagikan:</h3>
                                <div class="flex space-x-4">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" 
                                       target="_blank"
                                       class="text-blue-600 hover:text-blue-700 transition-colors">
                                        <i class="fab fa-facebook-square text-2xl"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($news->title) }}" 
                                       target="_blank"
                                       class="text-blue-400 hover:text-blue-500 transition-colors">
                                        <i class="fab fa-twitter-square text-2xl"></i>
                                    </a>
                                    <a href="https://wa.me/?text={{ urlencode($news->title . ' ' . request()->url()) }}" 
                                       target="_blank"
                                       class="text-green-600 hover:text-green-700 transition-colors">
                                        <i class="fab fa-whatsapp-square text-2xl"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Related News -->
                    <div class="bg-white rounded-xl shadow-lg p-6" data-aos="fade-left">
                        <h2 class="text-xl font-bold text-indigo-900 mb-4">Berita Terkait</h2>
                        <div class="space-y-4">
                            @forelse($relatedNews as $related)
                                <div class="group">
                                    <a href="{{ route('public.news.show', $related->slug) }}" 
                                       class="block hover:bg-gray-50 rounded-lg p-3 transition-colors">
                                        <h3 class="text-gray-900 font-medium group-hover:text-indigo-900 transition-colors">
                                            {{ $related->title }}
                                        </h3>
                                        <p class="text-sm text-gray-500 mt-1">
                                            {{ $related->published_at->format('d M Y') }}
                                        </p>
                                    </a>
                                </div>
                            @empty
                                <p class="text-gray-500 text-center py-4">Tidak ada berita terkait</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Back to News -->
                    <div class="mt-6 text-center">
                        <a href="{{ route('public.news.index') }}" 
                           class="inline-flex items-center px-6 py-3 bg-indigo-900 text-white rounded-full hover:bg-purple-800 transition-all duration-300 transform hover:-translate-y-1">
                            <i class="fas fa-arrow-left mr-2"></i>
                            <span>Kembali ke Berita</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
