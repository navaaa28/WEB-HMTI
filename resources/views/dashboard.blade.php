@extends('layouts.app')

@section('content')
    <!-- Include AOS Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Include Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Hero Section -->
    <!-- Hero Section -->
    <section class="bg-blue-900 text-white pt-32 pb-16 -mt-4 text-center" data-aos="fade-down">
        <div class="max-w-7xl mx-auto px-4 flex flex-col items-center">
            <div class="mb-4">
                <img src="{{ asset('storage/images/logo.png') }}" alt="Logo HMTI" class="h-40 w-40 rounded-full transition-transform duration-300 hover:scale-110">
            </div>
            <h1 class="text-3xl md:text-5xl font-bold font-serif">Himpunan Mahasiswa Teknik Industri</h1>
            <h2 class="text-xl md:text-3xl font-semibold mt-2">UNIVERSITAS TEKNOLOGI BANDUNG</h2>
            <p class="mt-4 md:mt-6 text-lg md:text-xl font-light">Menjadi wadah bagi mahasiswa Teknik industri untuk berkarya dan berkolaborasi.</p>
        </div>
    </section>

    <!-- About Section -->
    <section id="salam" class="bg-white py-16" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-center justify-center space-y-8 md:space-y-0 md:space-x-12">
            <div class="text-center md:text-left" data-aos="fade-left">
                <h2 class="text-4xl md:text-6xl font-bold text-indigo-900 font-serif">Salam</h2>
                <h2 class="text-4xl md:text-6xl font-bold text-indigo-900 font-serif" data-aos-delay="100">Unity</h2>
            </div>
            
            <div class="max-w-xl text-center md:text-left" data-aos="fade-right" data-aos-delay="200">
                <p class="text-gray-700 text-base md:text-lg leading-relaxed font-light">
                    Kami merupakan sebuah organisasi yang tergabung dalam Himpunan Mahasiswa Teknik Industri Universitas Teknologi Bandung.
                    Kami adalah pengemban, penampung, dan eksekutor aspirasi Mahasiswa Teknik Industri.
                </p>
            </div>
        </div>
    </section>

    <!-- Visi & Misi Section -->
    <section class="bg-gray-50 py-16" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold text-center text-indigo-900 mb-4 md:mb-8 font-serif" data-aos="fade-down">Visi & Misi</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8">
                <!-- Visi -->
                <div class="bg-white p-4 md:p-8 rounded-lg shadow-lg" data-aos="fade-right">
                    <h3 class="text-xl md:text-2xl font-bold text-indigo-900 mb-2 md:mb-4 font-serif">Visi</h3>
                    <p class="text-gray-700 text-base md:text-lg leading-relaxed font-light">
                        Menjadikan HMTI UTB yang Komunikatif, Dinamis, dan Berintegritas sebagai penggerak dalam mewujudkan aspirasi Mahasiswa Teknik Industri UTB.
                    </p>
                </div>
                <!-- Misi -->
                <div class="bg-white p-4 md:p-8 rounded-lg shadow-lg" data-aos="fade-left">
                    <h3 class="text-xl md:text-2xl font-bold text-indigo-900 mb-2 md:mb-4 font-serif">Misi</h3>
                    <ul class="list-disc list-inside text-gray-700 text-base md:text-lg leading-relaxed font-light">
                        <li>Menciptakan lingkungan kerja yang disiplin, bertanggung jawab, dan profesional</li>
                        <li>Meningkatkan koordinasi dan komunikasi baik internal maupun eksternal HMTI UTB</li>
                        <li>Melaksanakan kegiatan sesuai dengan kebutuhan mahasiswa Teknik Industri</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section id="events" class="bg-white py-16" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold text-center text-indigo-900 mb-4 md:mb-8 font-serif" data-aos="fade-down">Acara Terbaru</h2>
            <div class="swiper-container overflow-hidden">
                <div class="swiper-wrapper">
                    @forelse ($events as $event)
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full mx-2 md:mx-0">
                                <!-- Gambar -->
                                <div class="relative h-32 md:h-48">
                                    @if($event->photo)
                                        <img src="{{ asset('storage/' . $event->photo) }}" alt="{{ $event->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                            <span class="text-gray-500">No Image</span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Konten Card -->
                                <div class="p-4 md:p-6 flex flex-col flex-grow">
                                    <h3 class="text-lg font-semibold text-indigo-900 mb-2 font-serif">
                                        {{ Str::limit($event->name, 40) }}
                                    </h3>

                                    <p class="text-gray-600 text-sm line-clamp-3 flex-grow font-light">
                                        {{ Str::limit($event->description, 100) }}
                                    </p>

                                    <div class="flex items-center justify-between mt-2 md:mt-4">
                                        <span class="px-2 md:px-3 py-1 text-xs rounded-full {{ $event->registration_open ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $event->registration_open ? '🟢 Dibuka' : '🔴 Ditutup' }}
                                        </span>
                                        <p class="text-gray-500 text-xs">
                                            📅 {{ $event->event_date->format('d M Y') }}
                                        </p>
                                    </div>

                                    @if($event->registration_open)
                                        <a href="{{ route('events.show', $event->id) }}" class="bg-indigo-900 text-white px-3 md:px-4 py-1 md:py-2 rounded mt-2 md:mt-4 text-center hover:bg-indigo-800 transition duration-300">
                                            Lihat Detail
                                        </a>
                                    @else
                                        <button class="bg-gray-300 text-gray-600 px-3 md:px-4 py-1 md:py-2 rounded text-center w-full cursor-not-allowed mt-2 md:mt-4" disabled>
                                            Ditutup
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 text-center py-6 md:py-12">
                            <p class="text-gray-600 text-lg">Tidak ada acara terbaru saat ini</p>
                        </div>
                    @endforelse
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- Struktur Organisasi Section -->
    <section id="struktur" class="bg-gray-50 py-16" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center">
                <h2 class="text-xl md:text-2xl font-bold text-indigo-900 mb-2 font-serif" data-aos="fade-down">STRUKTUR ORGANISASI</h2>
                <h3 class="text-lg md:text-xl font-bold text-indigo-900 mb-2 font-serif" data-aos="fade-down">HIMPUNAN MAHASISWA TEKNIK INDUSTRI</h3>
                <h4 class="text-md md:text-lg font-bold text-indigo-900 mb-2 font-serif" data-aos="fade-down">UNIVERSITAS TEKNOLOGI BANDUNG</h4>
                <p class="text-sm md:text-base text-indigo-900 mb-4 font-serif" data-aos="fade-down">PERIODE 2024-2025</p>
            </div>

            <!-- Swiper Container -->
            <div class="swiper-container overflow-hidden">
                <div class="swiper-wrapper">
                    @foreach ($anggotas as $anggota)
                        @if (in_array($anggota->jabatan, ['Direktur Utama', 'Sekretaris Direktur', 'Direktur Keuangan', 'Sekretaris Umum', 'Direktur Personalia', 'Kepala Departemen']))
                            <div class="swiper-slide">
                                <div class="bg-white p-4 md:p-6 rounded-lg shadow-lg text-center mx-2 md:mx-0 hover:shadow-xl transition-shadow duration-300">
                                    <img src="{{ $anggota->foto }}" alt="Foto {{ $anggota->nama }}" class="w-24 h-24 md:w-32 md:h-32 rounded-full mx-auto mb-4 object-cover">
                                    <h3 class="text-lg md:text-xl font-bold font-serif">{{ $anggota->nama }}</h3>
                                    <p class="text-sm text-gray-600 font-light">{{ $anggota->jabatan }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>

            <!-- Tombol Lihat Seluruh Anggota -->
            <div class="text-center mt-8">
                <a href="{{ route('anggota.index') }}" class="bg-indigo-900 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-800 transition duration-300">
                    Lihat Seluruh Anggota
                </a>
            </div>
        </div>
    </section>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Section Materi Perkuliahan -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <div class="flex flex-col md:flex-row items-start md:items-center justify-between">
                        <div class="mb-4 md:mb-0">
                            <h3 class="text-4xl font-bold text-purple-900 mb-2">Hello Engineers!</h3>
                            <h2 class="text-5xl font-bold text-purple-900 leading-tight">
                                MATERI<br>
                                PERKULIAHAN<br>
                                JARAK JAUH
                            </h2>
                        </div>
                        
                        <div class="flex flex-col items-start">
                            <p class="text-gray-600 mb-4 max-w-md">
                                Berikut adalah kumpulan Materi Mata Kuliah dari setiap kelasnya dan setiap angkatannya selama masa Perkuliahan Jarak Jauh
                            </p>
                            <a href="{{ route('materials.index') }}" 
                               class="inline-flex items-center px-6 py-3 bg-purple-900 border border-transparent rounded-md font-semibold text-white hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all">
                                UNDUH MATERI
                            </a>
                        </div>
                    </div>
                </div>
            </div>

    <!-- Tentang Kami -->
    <section id='about' class="bg-gradient-to-b from-gray-50 to-white py-24" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-blue-900 font-serif mb-4 relative inline-block" data-aos="fade-down">
                    Tentang Kami
                    <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-blue-900"></div>
                </h2>
            </div>
            
            <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 relative overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                <!-- Background Pattern -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-100 to-blue-50 rounded-bl-full opacity-50"></div>
                <div class="absolute bottom-0 left-0 w-32 h-32 bg-gradient-to-tr from-blue-100 to-blue-50 rounded-tr-full opacity-50"></div>
                
                <!-- Logo Watermark -->
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-5">
                    <img src="{{ asset('storage/images/logo.png') }}" alt="Watermark" class="w-96 h-96">
                </div>
                
                <!-- Content -->
                <div class="relative z-10">
                    <div class="prose prose-lg max-w-none">
                        <p class="text-gray-700 text-lg md:text-xl leading-relaxed mb-8">
                            HMTI Universitas Teknologi Bandung merupakan himpunan mahasiswa prodi Teknik Industri yang berkedudukan di Universitas Teknik Bandung.
                        </p>
                        
                        <div class="grid md:grid-cols-2 gap-8 mt-8">
                            <div class="bg-gradient-to-br from-blue-50 to-white p-6 rounded-xl shadow-md">
                                <div class="flex items-center space-x-3 mb-4">
                                    <i class="fas fa-history text-2xl text-blue-900"></i>
                                    <h3 class="text-xl font-bold text-blue-900">Sejarah Pendirian</h3>
                                </div>
                                <p class="text-gray-700">
                                    Didirikan pada 10 Oktober 2013 dengan ketua himpunan pertamanya, yaitu Abraham Bonggal S.T.
                                </p>
                            </div>
                            
                            <div class="bg-gradient-to-br from-blue-50 to-white p-6 rounded-xl shadow-md">
                                <div class="flex items-center space-x-3 mb-4">
                                    <i class="fas fa-crown text-2xl text-blue-900"></i>
                                    <h3 class="text-xl font-bold text-blue-900">Kepemimpinan</h3>
                                </div>
                                <p class="text-gray-700">
                                    Kini dipimpin oleh Direktur Utama sejak perubahan struktur oleh Dikdik Syaeful Malik, S.T pada tahun 2017. Periode 2023 - 2024 dipimpin oleh Direktur Utama Nanda Surya M.P.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Floating Button -->
    <div class="fixed bottom-4 right-4 z-50">
        <a href="{{ route('aspirasi.create') }}" class="bg-indigo-900 text-white px-6 py-3 rounded-full shadow-lg hover:bg-indigo-800 transition duration-300 flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            <span>SUARAKAN ASPIRASIMU!!!</span>
        </a>
    </div>

    <!-- Initialize AOS -->
    <script>
        AOS.init({
            duration: 1000,
            once: false,
            offset: 120,
            easing: 'ease-in-out'
        });
    </script>

    <!-- Initialize Swiper -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        // Konfigurasi Swiper untuk Events
        const eventSwiper = new Swiper('#events .swiper-container', {
            slidesPerView: 1, // Default untuk mobile
            spaceBetween: 10,
            pagination: {
                el: '#events .swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: { // Tablet ke atas
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                1024: { // Desktop
                    slidesPerView: 3,
                    spaceBetween: 30
                }
            }
        });

        // Konfigurasi Swiper untuk Members
        const memberSwiper = new Swiper('#members .swiper-container', {
            slidesPerView: 1, // Default untuk mobile
            spaceBetween: 10,
            pagination: {
                el: '#members .swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: { // Tablet ke atas
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                768: { // Desktop kecil
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                1024: { // Desktop besar
                    slidesPerView: 4,
                    spaceBetween: 40
                }
            }
        });
        // Konfigurasi Swiper untuk Struktur Organisasi
    const strukturSwiper = new Swiper('#struktur .swiper-container', {
        slidesPerView: 1, // Default untuk mobile
        spaceBetween: 10,
        pagination: {
            el: '#struktur .swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            640: { // Tablet ke atas
                slidesPerView: 2,
                spaceBetween: 20
            },
            768: { // Desktop kecil
                slidesPerView: 3,
                spaceBetween: 30
            },
            1024: { // Desktop besar
                slidesPerView: 4,
                spaceBetween: 40
            }
        }
    });
    </script>
@endsection