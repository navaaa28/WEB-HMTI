<?php $__env->startSection('content'); ?>
    <!-- Include AOS Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Include Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Include Glide Core and Theme CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.core.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.theme.min.css">
    <!-- Include Custom Components CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/components.css')); ?>">

    <!-- Hero Section -->
    <section class="bg-blue-900 text-white pt-32 pb-16 -mt-4 text-center" data-aos="fade-down">
        <div class="max-w-7xl mx-auto px-4 flex flex-col items-center">
            <div class="mb-4">
                <img src="<?php echo e(asset('storage/images/logo.png')); ?>" alt="Logo HMTI" class="h-40 w-40 rounded-full transition-transform duration-300 hover:scale-110">
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
    <section class="bg-gradient-to-b from-gray-50 to-white py-24" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-indigo-900 mb-12 font-serif relative inline-block after:content-[''] after:absolute after:-bottom-2 after:left-0 after:w-24 after:h-1 after:bg-indigo-900" data-aos="fade-down">Visi & Misi</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Visi -->
                <div class="bg-gradient-to-br from-white to-gray-50 p-8 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-right">
                    <div class="flex items-center space-x-3 mb-4">
                        <i class="fas fa-eye text-2xl text-indigo-900"></i>
                        <h3 class="text-2xl font-bold text-indigo-900 font-serif">Visi</h3>
                    </div>
                    <p class="text-gray-700 text-lg leading-relaxed">
                        Menjadikan HMTI UTB sebagai organisasi yang komunikatif,
                        berintegritas, dan profesional dalam rangka mewujudkan
                        aspirasi mahasiswa Teknik Industri UTB.
                    </p>
                </div>
                <!-- Misi -->
                <div class="bg-gradient-to-br from-white to-gray-50 p-8 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-left">
                    <div class="flex items-center space-x-3 mb-4">
                        <i class="fas fa-bullseye text-2xl text-indigo-900"></i>
                        <h3 class="text-2xl font-bold text-indigo-900 font-serif">Misi</h3>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3">
                            <i class="fas fa-check-circle text-indigo-900 mt-1"></i>
                            <span class="text-gray-700 text-lg leading-relaxed">Meningkatkan komunikasi dalam ranah internal maupun eksternal.</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <i class="fas fa-check-circle text-indigo-900 mt-1"></i>
                            <span class="text-gray-700 text-lg leading-relaxed">Terbentuknya kerjasama yang disiplin dan profesional.</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <i class="fas fa-check-circle text-indigo-900 mt-1"></i>
                            <span class="text-gray-700 text-lg leading-relaxed">Menciptakan aktivitas organisasi yang sesuai dengan kebutuhan perangkat.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

<!-- Events Section -->
<section id="events" class="bg-white py-12 md:py-24" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-center bg-gradient-to-br from-indigo-900 to-purple-800 bg-clip-text text-transparent mb-8 md:mb-12 font-serif" data-aos="fade-down">Acara Terbaru</h2>
        <div class="events-container">
            <div class="glide">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        <?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li class="glide__slide">
                                <div class="event-card">
                                    <!-- Gambar -->
                                    <div class="relative h-40 md:h-48 lg:h-56">
                                        <?php if($event->photo): ?>
                                            <img src="<?php echo e(asset('storage/' . $event->photo)); ?>" alt="<?php echo e($event->name); ?>" class="w-full h-full object-cover rounded-t-lg">
                                        <?php else: ?>
                                            <div class="w-full h-full bg-gray-200 flex items-center justify-center rounded-t-lg">
                                                <span class="text-gray-500">No Image</span>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Konten Card -->
                                    <div class="p-4 md:p-6 flex flex-col flex-grow">
                                        <h3 class="text-base md:text-lg font-semibold text-indigo-900 mb-2 font-serif line-clamp-2">
                                            <?php echo e($event->name); ?>

                                        </h3>

                                        <p class="text-sm md:text-base text-gray-600 line-clamp-3 flex-grow font-light">
                                            <?php echo e($event->description); ?>

                                        </p>

                                        <div class="flex items-center justify-between mt-4">
                                            <span class="px-2 md:px-3 py-1 text-xs md:text-sm rounded-full <?php echo e($event->registration_open ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?>">
                                                <?php echo e($event->registration_open ? '🟢 Dibuka' : '🔴 Ditutup'); ?>

                                            </span>
                                            <p class="text-xs md:text-sm text-gray-500">
                                                📅 <?php echo e($event->event_date->format('d M Y')); ?>

                                            </p>
                                        </div>

                                        <?php if($event->registration_open): ?>
                                            <a href="<?php echo e(route('events.show', $event->id)); ?>" class="mt-4 bg-indigo-900 text-white px-4 py-2 rounded text-sm md:text-base text-center hover:bg-purple-800 transition duration-300">
                                                Lihat Detail
                                            </a>
                                        <?php else: ?>
                                            <button disabled class="mt-4 bg-gray-300 text-gray-600 px-4 py-2 rounded text-sm md:text-base text-center w-full cursor-not-allowed">
                                                Ditutup
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <li class="glide__slide">
                                <div class="text-center py-12">
                                    <p class="text-gray-600 text-base md:text-lg">Tidak ada acara terbaru saat ini</p>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="glide__arrows" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                        <i class="fas fa-chevron-left text-sm md:text-base"></i>
                    </button>
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                        <i class="fas fa-chevron-right text-sm md:text-base"></i>
                    </button>
                </div>

                <div class="glide__bullets" data-glide-el="controls[nav]">
                    <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button class="glide__bullet" data-glide-dir="=<?php echo e($index); ?>"></button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Struktur Organisasi Section -->
<section id="struktur" class="bg-gray-50 py-12 md:py-16" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-8 md:mb-12">
            <h2 class="text-xl md:text-2xl lg:text-3xl font-bold text-indigo-900 mb-2 font-serif" data-aos="fade-down">STRUKTUR ORGANISASI</h2>
            <h3 class="text-lg md:text-xl font-bold text-indigo-900 mb-2 font-serif" data-aos="fade-down">HIMPUNAN MAHASISWA TEKNIK INDUSTRI</h3>
            <h4 class="text-base md:text-lg font-bold text-indigo-900 mb-2 font-serif" data-aos="fade-down">UNIVERSITAS TEKNOLOGI BANDUNG</h4>
            <p class="text-sm md:text-base text-indigo-900 font-serif" data-aos="fade-down">PERIODE 2024-2025</p>
        </div>

        <div class="struktur-container">
            <div class="glide-struktur">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        <?php $__currentLoopData = $anggotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anggota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(in_array($anggota->jabatan, ['Direktur Utama', 'Sekretaris Direktur', 'Direktur Keuangan', 'Sekretaris Umum', 'Direktur Personalia', 'Kepala Departemen'])): ?>
                                <li class="glide__slide">
                                    <div class="struktur-card p-4 md:p-6 text-center">
                                        <div class="relative w-24 h-24 md:w-32 md:h-32 mx-auto mb-4">
                                            <img src="<?php echo e($anggota->foto); ?>" alt="Foto <?php echo e($anggota->nama); ?>" class="w-full h-full rounded-full object-cover shadow-md">
                                        </div>
                                        <h3 class="text-base md:text-lg lg:text-xl font-bold font-serif text-indigo-900 mb-1"><?php echo e($anggota->nama); ?></h3>
                                        <p class="text-sm md:text-base text-gray-600 font-light"><?php echo e($anggota->jabatan); ?></p>
                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <div class="glide__arrows" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                        <i class="fas fa-chevron-left text-sm md:text-base"></i>
                    </button>
                    <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                        <i class="fas fa-chevron-right text-sm md:text-base"></i>
                    </button>
                </div>

                <div class="glide__bullets" data-glide-el="controls[nav]">
                    <?php $__currentLoopData = $anggotas->where(function($anggota) { 
                        return in_array($anggota->jabatan, ['Direktur Utama', 'Sekretaris Direktur', 'Direktur Keuangan', 'Sekretaris Umum', 'Direktur Personalia', 'Kepala Departemen']); 
                    }); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $anggota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button class="glide__bullet" data-glide-dir="=<?php echo e($index); ?>"></button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <!-- Tombol Lihat Seluruh Anggota -->
        <div class="text-center mt-8 md:mt-12">
            <a href="<?php echo e(route('anggota.index')); ?>" class="interactive-button">
                <span>
                    <i class="fas fa-users"></i>
                    Lihat Seluruh Anggota
                </span>
            </a>
        </div>
    </div>
</section>
<!-- Materi Section -->
<section class="bg-gradient-to-b from-white to-gray-50 py-24" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between">
                <div class="mb-8 md:mb-0">
                    <div class="flex items-center space-x-3 mb-6">
                        <i class="fas fa-graduation-cap text-3xl text-indigo-900"></i>
                        <h3 class="text-3xl md:text-4xl font-bold text-indigo-900">Halo Engineers!</h3>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-book-open text-2xl text-indigo-800"></i>
                            <h2 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-indigo-900 to-purple-800 bg-clip-text text-transparent">MATERI</h2>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-chalkboard-teacher text-2xl text-indigo-800"></i>
                            <h2 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-indigo-900 to-purple-800 bg-clip-text text-transparent">PERKULIAHAN</h2>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-laptop-house text-2xl text-indigo-800"></i>
                            <h2 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-indigo-900 to-purple-800 bg-clip-text text-transparent">JARAK JAUH</h2>
                        </div>
                    </div>
                </div>
                
                <div class="flex flex-col items-start md:items-end md:ml-12">
                    <div class="flex items-start space-x-3 mb-6">
                        <i class="fas fa-info-circle text-xl text-indigo-800 mt-1"></i>
                        <p class="text-gray-600 max-w-md text-lg">
                            Berikut adalah kumpulan Materi Mata Kuliah dari setiap kelasnya dan setiap angkatannya selama masa Perkuliahan Jarak Jauh
                        </p>
                    </div>
                    <a href="<?php echo e(route('materials.index')); ?>" 
                       class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-indigo-900 to-purple-800 text-white rounded-full font-semibold hover:from-purple-800 hover:to-indigo-900 transition-all duration-300 group shadow-lg">
                        <i class="fas fa-download mr-2 group-hover:animate-bounce"></i>
                        UNDUH MATERI
                    </a>
                </div>
            </div>
        </div>
    </section>


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
                        <img src="<?php echo e(asset('storage/images/logo.png')); ?>" alt="Watermark" class="w-96 h-96">
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
                                        Kini dipimpin oleh Direktur Utama sejak perubahan struktur oleh Dikdik Syaeful Malik, S.T pada tahun 2017. Periode 2024 - 2025 dipimpin oleh Direktur Utama Muhammad Dzulfikri Halim.
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
        <a href="<?php echo e(route('aspirasi.create')); ?>" 
           class="bg-gradient-to-r from-indigo-900 to-purple-800 text-white px-6 py-3 rounded-md shadow-lg hover:from-purple-800 hover:to-indigo-900 transition-all duration-300 flex items-center space-x-2 group">
            <i class="fas fa-comment-dots text-xl group-hover:rotate-12 transition-transform"></i>
            <span>SUARAKAN ASPIRASIMU!</span>
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

    <!-- Initialize Glide for Events -->
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: false,
            offset: 120,
            easing: 'ease-in-out'
        });

        // Initialize Glide for Events
        new Glide('.glide', {
            type: 'carousel',
            perView: 3,
            gap: 20,
            autoplay: 5000,
            hoverpause: true,
            breakpoints: {
                1280: {
                    perView: 3,
                    gap: 20
                },
                1024: {
                    perView: 2,
                    gap: 15
                },
                768: {
                    perView: 2,
                    gap: 10
                },
                640: {
                    perView: 1,
                    gap: 10
                },
                480: {
                    perView: 1,
                    gap: 5
                }
            }
        }).mount();

        // Initialize Glide for Struktur Organisasi
        new Glide('.glide-struktur', {
            type: 'carousel',
            perView: 4,
            gap: 20,
            autoplay: 5000,
            hoverpause: true,
            breakpoints: {
                1280: {
                    perView: 4,
                    gap: 20
                },
                1024: {
                    perView: 3,
                    gap: 15
                },
                768: {
                    perView: 2,
                    gap: 10
                },
                640: {
                    perView: 1,
                    gap: 10
                },
                480: {
                    perView: 1,
                    gap: 5
                }
            }
        }).mount();
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\WEB-HMTI\resources\views/welcome.blade.php ENDPATH**/ ?>