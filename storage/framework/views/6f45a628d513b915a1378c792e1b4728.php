<?php $__env->startSection('content'); ?>
<div class="relative overflow-visible pt-20 md:pt-28">
    <div class="container mx-auto px-4">
        <div class="flex flex-col items-center justify-center min-h-[60vh] text-center">
            <h1 class="text-6xl font-bold text-gray-800 mb-4">404</h1>
            <p class="text-xl text-gray-600 mb-8">Halaman tidak ditemukan</p>
            <p class="text-gray-500 mb-8">Maaf, halaman yang Anda cari tidak dapat ditemukan.</p>
            <a href="<?php echo e(route('public.home')); ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\WEB-HMTI\resources\views/errors/404.blade.php ENDPATH**/ ?>