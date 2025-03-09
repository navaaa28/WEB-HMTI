@extends('layouts.app')

@section('content')
    <!-- Category Header -->
    <div class="relative overflow-visible pt-20 md:pt-28">
        <section class="bg-gradient-to-r from-indigo-900 to-purple-900 text-white py-16">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center">
                    <span class="text-lg text-indigo-200 mb-2 block" data-aos="fade-down">Kategori</span>
                    <h1 class="text-4xl md:text-5xl font-bold mb-4 font-serif" data-aos="fade-up">{{ $category->name }}</h1>
                    <p class="text-lg md:text-xl text-gray-200" data-aos="fade-up" data-aos-delay="100">
                        {{ $category->description ?? 'Berita dan informasi terkait ' . $category->name }}
                    </p>
                </div>
            </div>
        </section>
    </div>

    <!-- Category Navigation -->
    <div class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 py-6">
            <div class="flex items-center gap-2 text-sm">
                <a href="{{ route('public.news.index') }}" class="text-gray-600 hover:text-indigo-600">
                    <i class="fas fa-home"></i>
                </a>
                <span class="text-gray-400">/</span>
                <a href="{{ route('public.news.index') }}" class="text-gray-600 hover:text-indigo-600">Berita</a>
                <span class="text-gray-400">/</span>
                <span class="text-indigo-600">{{ $category->name }}</span>
            </div>
        </div>
    </div>

    <!-- News Grid -->
    <section class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($news as $item)
                    <article class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <!-- Image Container -->
                        <div class="relative h-48 overflow-hidden">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" 
                                     alt="{{ $item->title }}" 
                                     class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-indigo-100 to-purple-100 flex items-center justify-center">
                                    <i class="fas fa-newspaper text-4xl text-indigo-300"></i>
                                </div>
                            @endif
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1 bg-indigo-900 text-white text-sm rounded-full">
                                    {{ $item->published_at->format('d M Y') }}
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-indigo-900 mb-3 line-clamp-2">
                                <a href="{{ route('public.news.show', $item->slug) }}" class="hover:text-purple-800 transition-colors duration-300">
                                    {{ $item->title }}
                                </a>
                            </h2>
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                {{ strip_tags($item->content) }}
                            </p>
                            <a href="{{ route('public.news.show', $item->slug) }}" 
                               class="inline-flex items-center text-indigo-900 hover:text-purple-800 transition-colors duration-300 group">
                                <span class="font-medium">Baca Selengkapnya</span>
                                <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform"></i>
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full flex flex-col items-center justify-center py-16 text-center">
                        <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
                        <h3 class="text-2xl font-bold text-gray-500 mb-2">Belum Ada Berita</h3>
                        <p class="text-gray-400">Belum ada berita dalam kategori ini. Silakan kembali lagi nanti.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($news->hasPages())
                <div class="mt-12">
                    {{ $news->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection
