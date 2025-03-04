

<?php $__env->startSection('content'); ?>
<script src="//unpkg.com/alpinejs" defer></script>
<div class="min-h-screen bg-gradient-to-br from-purple-50 to-purple-100 py-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Judul Halaman -->
        <div class="text-center mb-12" data-aos="fade-down">
            <h1 class="text-3xl md:text-4xl font-bold text-indigo-900 font-serif">Menyuarakan Aspirasi</h1>
            <p class="mt-4 text-gray-700 text-lg md:text-xl font-light">Sampaikan aspirasi Anda kepada kami. Kami siap mendengarkan!</p>
        </div>

        <!-- Grid untuk Form dan Maps -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Form Aspirasi -->
            <div class="bg-white rounded-xl shadow-2xl p-6 md:p-8" data-aos="fade-up">
                <form action="<?php echo e(route('aspirasi.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <!-- NIM -->
                    <div class="mb-6">
                        <label for="nim" class="block text-sm font-medium text-gray-700 mb-2">NIM</label>
                        <input type="text" id="nim" name="nim" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-300" 
                               value="<?php echo e(auth()->user()->nim); ?>" readonly>
                    </div>

                    <!-- Nama -->
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" id="name" name="name" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-300" 
                               value="<?php echo e(auth()->user()->name); ?>" readonly>
                    </div>

                    <!-- Email -->
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" id="email" name="email" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-300" 
                               value="<?php echo e(auth()->user()->email); ?>" readonly>
                    </div>

                    <!-- Aspirasi -->
                    <div class="mb-6">
                        <label for="aspirasi" class="block text-sm font-medium text-gray-700 mb-2">Aspirasi Anda</label>
                        <textarea id="aspirasi" name="aspirasi" rows="5" 
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-300" 
                                  placeholder="Tulis aspirasi Anda di sini..." required></textarea>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="text-center">
                        <button type="submit" 
                                class="bg-indigo-900 text-white px-6 py-3 rounded-lg hover:bg-purple-800 transition duration-300 flex items-center justify-center mx-auto">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            Kirim Aspirasi
                        </button>
                    </div>
                </form>
            </div>

            <!-- Maps -->
            <div class="bg-white rounded-xl shadow-2xl p-6 md:p-8" data-aos="fade-up">
                <h3 class="text-xl font-bold text-indigo-900 font-serif mb-4">Lokasi Kami</h3>
                <div class="overflow-hidden rounded-lg">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.516612867033!2d107.59854717463449!3d-6.948221993051982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6279d52ed8b%3A0xfbc31838ba12ddbf!2sUniversitas%20Teknologi%20Bandung!5e0!3m2!1sid!2sid!4v1740315331757!5m2!1sid!2sid" 
                        width="100%" 
                        height="400" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Include AOS for Animations -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: true,
        offset: 120,
        easing: 'ease-in-out'
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\himpunan-ticketing\resources\views/aspirasi/create.blade.php ENDPATH**/ ?>