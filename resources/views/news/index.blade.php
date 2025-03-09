@extends('layouts.app')

@section('content')
    <!-- News Header -->
    <section class="bg-gradient-to-r from-indigo-900 to-purple-900 text-white py-16 mt-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 font-serif" data-aos="fade-down">Berita HMTI</h1>
                <p class="text-lg md:text-xl text-gray-200" data-aos="fade-up">Informasi terbaru seputar kegiatan dan perkembangan HMTI UTB</p>
            </div>
        </div>
    </section>

    <!-- Search and Filter Section -->
    <div class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 py-6">
            <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                <!-- Search Bar -->
                <form action="{{ route('public.news.search') }}" method="GET" class="w-full md:w-1/2">
                    <div class="relative">
                        <input type="search" 
                               name="q" 
                               value="{{ request('q') }}" 
                               placeholder="Cari berita..." 
                               class="w-full px-4 py-2 pl-10 pr-4 rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                        <span class="absolute left-3 top-2.5 text-gray-400">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                </form>

                <!-- Category Filter -->
                <div class="flex flex-wrap gap-2">
                    @foreach($categories as $category)
                        <a href="{{ route('public.news.category', $category->slug) }}" 
                           class="px-4 py-2 rounded-full text-sm {{ request()->is('news/category/'.$category->slug) ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- News Grid -->
    <section class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4">
            @if(isset($search_query))
                <div class="mb-8 text-center">
                    <h2 class="text-2xl font-semibold text-gray-800">
                        Hasil pencarian untuk: "{{ $search_query }}"
                    </h2>
                </div>
            @endif

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
                            <div class="flex items-center gap-2 mb-3">
                                <a href="{{ route('public.news.category', $item->category->slug) }}" 
                                   class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                                    {{ $item->category->name }}
                                </a>
                            </div>
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
                        <p class="text-gray-400">
                            @if(isset($search_query))
                                Tidak ada hasil yang ditemukan untuk "{{ $search_query }}".
                            @else
                                Berita akan segera hadir. Silakan kembali lagi nanti.
                            @endif
                        </p>
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
