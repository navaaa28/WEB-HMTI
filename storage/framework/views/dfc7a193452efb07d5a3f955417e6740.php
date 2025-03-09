<script src="//unpkg.com/alpinejs" defer></script>
<?php $__env->startSection('content'); ?>
    <!-- Success Alert -->
    <?php if(session('success')): ?>
        <div x-data="{ show: true }" 
             x-show="show" 
             x-init="setTimeout(() => show = false, 3000)"
             class="fixed top-24 md:top-32 right-4 z-50 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-lg" 
             role="alert">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="block"><?php echo e(session('success')); ?></span>
            </div>
        </div>
    <?php endif; ?>

    <section class="pt-20 md:pt-28 pb-16 relative overflow-visible">
        <div class="container mx-auto p-4">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h1 class="text-2xl font-bold mb-4">Detail Tiket</h1>
                
                <!-- QR Code -->
                <div class="qr-code mb-4 flex justify-center">
                    <img src="<?php echo e(asset('storage/' . $ticket->qr_code)); ?>" alt="QR Code" class="mb-4 max-w-[200px]">
                </div>

                <!-- Informasi Tiket -->
                <div class="ticket-info space-y-2">
                    <p class="text-gray-600"><strong>ID Registrasi:</strong> <?php echo e($ticket->registration_id); ?></p>
                    <p class="text-gray-600"><strong>Tanggal Pembuatan:</strong> <?php echo e($ticket->created_at->format('d M Y H:i')); ?></p>
                </div>

                <!-- Tombol Kembali -->
                <div class="mt-6">
                    <a href="<?php echo e(route('dashboard')); ?>" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors duration-200">
                        Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\WEB-HMTI\resources\views/tickets/show.blade.php ENDPATH**/ ?>