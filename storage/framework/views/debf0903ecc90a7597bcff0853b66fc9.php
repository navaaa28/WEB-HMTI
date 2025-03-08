<?php $__env->startSection('content'); ?>
<div class="pt-24 pb-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header Section with Company Info -->
            <div class="relative">
                <div class="bg-gradient-to-r from-blue-600 to-blue-800 h-32"></div>
                <div class="px-6 sm:px-8 pb-8">
                    <div class="relative -mt-16 flex items-end">
                        <div class="bg-white p-4 rounded-lg shadow-md inline-block">
                            <div class="w-24 h-24 flex items-center justify-center bg-gray-100 rounded-lg">
                                <span class="text-2xl font-bold text-blue-800"><?php echo e(substr($internship->company, 0, 2)); ?></span>
                            </div>
                        </div>
                        <div class="ml-6 pb-4">
                            <h1 class="text-3xl font-bold text-gray-900"><?php echo e($internship->title); ?></h1>
                            <div class="mt-1">
                                <h2 class="text-xl font-semibold text-gray-800"><?php echo e($internship->company); ?></h2>
                                <p class="text-gray-600 flex items-center mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <?php echo e($internship->location); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="px-6 sm:px-8 py-6">
                <!-- Key Information Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                    <div class="bg-blue-50 rounded-lg p-5 border border-blue-100">
                        <h3 class="text-lg font-semibold text-blue-800 mb-3 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Periode Magang
                        </h3>
                        <p class="text-gray-700 font-medium"><?php echo e($internship->start_date->format('d M Y')); ?> - <?php echo e($internship->end_date->format('d M Y')); ?></p>
                    </div>
                    <div class="bg-red-50 rounded-lg p-5 border border-red-100">
                        <h3 class="text-lg font-semibold text-red-800 mb-3 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Deadline Pendaftaran
                        </h3>
                        <p class="text-gray-700 font-medium"><?php echo e($internship->deadline->format('d M Y')); ?></p>
                    </div>
                </div>

                <!-- Description Section -->
                <div class="mb-10">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b">Deskripsi</h3>
                    <div class="prose max-w-none text-gray-700">
                        <?php echo $internship->description; ?>

                    </div>
                </div>

                <!-- Requirements Section -->
                <div class="mb-10">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b">Persyaratan</h3>
                    <div class="prose max-w-none text-gray-700">
                        <?php echo $internship->requirements; ?>

                    </div>
                </div>

                <!-- Benefits Section -->
<div class="mb-10">
    <h3 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b">Benefits</h3>
    <div class="bg-gray-50 rounded-lg p-6">
        <div class="prose max-w-none text-gray-700">
            <?php echo $internship->benefits; ?>

        </div>
    </div>
</div>

                <!-- Contact Section -->
                <div class="bg-gray-50 rounded-xl p-6 mb-10 border border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Kontak</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="flex items-start">
                            <div class="bg-white p-3 rounded-full shadow-sm mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 font-medium">PIC</p>
                                <p class="text-gray-800 font-medium"><?php echo e($internship->contact_person); ?></p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-white p-3 rounded-full shadow-sm mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 font-medium">Email</p>
                                <p class="text-gray-800 font-medium"><?php echo e($internship->contact_email); ?></p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-white p-3 rounded-full shadow-sm mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 font-medium">Telepon</p>
                                <p class="text-gray-800 font-medium"><?php echo e($internship->contact_phone); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Apply Button -->
                <?php if($internship->apply_url): ?>
                    <div class="text-center py-6">
                        <a href="<?php echo e($internship->apply_url); ?>" target="_blank" class="inline-flex items-center px-8 py-4 bg-blue-600 border border-transparent rounded-lg font-semibold text-white text-lg tracking-wide hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out shadow-lg transform hover:-translate-y-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Daftar Sekarang
                        </a>
                        <p class="mt-3 text-gray-500">Pendaftaran ditutup pada <?php echo e($internship->deadline->format('d M Y')); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\WEB-HMTI\resources\views/internships/show.blade.php ENDPATH**/ ?>