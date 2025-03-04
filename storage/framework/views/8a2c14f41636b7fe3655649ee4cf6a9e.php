

<?php $__env->startSection('content'); ?>
<script src="//unpkg.com/alpinejs" defer></script>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6">
                <h1 class="text-3xl font-bold text-gray-800 mb-4"><?php echo e($internship->title); ?></h1>
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-700"><?php echo e($internship->company); ?></h2>
                    <p class="text-gray-600"><?php echo e($internship->location); ?></p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Periode Magang</h3>
                        <p><?php echo e($internship->start_date->format('d M Y')); ?> - <?php echo e($internship->end_date->format('d M Y')); ?></p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Deadline Pendaftaran</h3>
                        <p><?php echo e($internship->deadline->format('d M Y')); ?></p>
                    </div>
                </div>

                <div class="prose max-w-none mb-8">
                    <h3 class="text-lg font-semibold mb-2">Deskripsi</h3>
                    <?php echo $internship->description; ?>

                </div>

                <div class="prose max-w-none mb-8">
                    <h3 class="text-lg font-semibold mb-2">Persyaratan</h3>
                    <?php echo $internship->requirements; ?>

                </div>

                <div class="mb-8">
                    <h3 class="text-lg font-semibold mb-2">Benefits</h3>
                    <p><?php echo e($internship->benefits); ?></p>
                </div>

                <div class="bg-gray-50 p-6 rounded-lg mb-8">
                    <h3 class="text-lg font-semibold mb-4">Kontak</h3>
                    <div class="space-y-2">
                        <p><span class="font-medium">PIC:</span> <?php echo e($internship->contact_person); ?></p>
                        <p><span class="font-medium">Email:</span> <?php echo e($internship->contact_email); ?></p>
                        <p><span class="font-medium">Telepon:</span> <?php echo e($internship->contact_phone); ?></p>
                    </div>
                </div>

                <?php if($internship->apply_url): ?>
                    <div class="mt-8">
                        <a href="<?php echo e($internship->apply_url); ?>" target="_blank" class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-white text-sm uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
                            Daftar Sekarang
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\himpunan-ticketing\resources\views/internships/show.blade.php ENDPATH**/ ?>