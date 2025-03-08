<!-- resources/views/registrations/index.blade.php -->



<?php $__env->startSection('title', 'Registrasi Saya - HMTI'); ?>
<script src="//unpkg.com/alpinejs" defer></script>
<?php $__env->startSection('content'); ?>
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-3xl font-bold text-center text-indigo-900 mb-8 font-serif" data-aos="fade-down">Registrasi Saya</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
            <?php $__empty_1 = true; $__currentLoopData = $registrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center h-full flex flex-col justify-between" style="height: 420px;" data-aos="flip-left">
                    <h3 class="text-xl font-bold mb-2 font-serif"><?php echo e($registration->event->name); ?></h3>
                    
                    <!-- Status Registrasi -->
                    <p class="text-sm text-gray-600">Status: 
                        <?php if($registration->status === 'approved'): ?>
                            <span class="text-green-600 font-bold">Disetujui</span>
                        <?php elseif($registration->status === 'pending'): ?>
                            <span class="text-yellow-600 font-bold">Menunggu Konfirmasi Admin</span>
                        <?php elseif($registration->status === 'rejected'): ?>
                            <span class="text-red-600 font-bold">Pembayaran Tidak Disetujui</span>
                        <?php endif; ?>
                    </p>
                    
                    <!-- Menampilkan Nama, Email, dan NIM -->
                    <div class="mt-4 text-gray-700 text-sm">
                        <p><strong>Nama:</strong> <?php echo e(auth()->user()->name); ?></p>
                        <p><strong>Email:</strong> <?php echo e(auth()->user()->email); ?></p>
                        <p><strong>NIM:</strong> <?php echo e(auth()->user()->nim ?? 'Belum diatur'); ?></p>
                    </div>

                    <?php if($registration->status === 'approved' && $registration->ticket): ?>
                        <a href="<?php echo e(route('tickets.show', $registration->ticket->id)); ?>" 
                           class="mt-4 inline-block bg-indigo-900 text-white px-4 py-2 rounded hover:bg-purple-800">
                            Lihat Tiket
                        </a>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-gray-600 text-center col-span-3">Anda belum terdaftar di acara apapun.</p>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\WEB-HMTI\resources\views/registrations/index.blade.php ENDPATH**/ ?>