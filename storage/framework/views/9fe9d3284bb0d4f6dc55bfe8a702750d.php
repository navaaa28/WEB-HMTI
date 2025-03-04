

<?php $__env->startSection('content'); ?>
<script src="//unpkg.com/alpinejs" defer></script>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Materi Perkuliahan</h2>

                
                <?php
                    $groupedCourses = $courses->groupBy('semester')->sortKeys();
                ?>

                <div class="space-y-8">
                    <?php $__currentLoopData = $groupedCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semester => $semesterCourses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="border-b pb-6 last:border-b-0 last:pb-0">
                            <h3 class="text-xl font-bold text-purple-900 mb-4">
                                Semester <?php echo e($semester); ?>

                            </h3>

                            <div class="grid grid-cols-1 gap-6">
                                <?php $__currentLoopData = $semesterCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                        <div class="p-4 border-b bg-gray-50">
                                            <div class="flex justify-between items-start">
                                                <div>
                                                    <h3 class="text-lg font-semibold text-gray-800">
                                                        <?php echo e($course->name); ?>

                                                    </h3>
                                                    <p class="text-sm text-gray-600">Kode: <?php echo e($course->code); ?></p>
                                                </div>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                                    <?php echo e($course->materials->count()); ?> Materi
                                                </span>
                                            </div>
                                        </div>

                                        <div class="p-4">
                                            <?php if($course->materials->count() > 0): ?>
                                                <div class="divide-y">
                                                    <?php $__currentLoopData = $course->materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="py-3 flex items-center justify-between">
                                                            <div>
                                                                <h4 class="font-medium text-gray-900"><?php echo e($material->title); ?></h4>
                                                                <?php if($material->description): ?>
                                                                    <p class="text-sm text-gray-600"><?php echo e($material->description); ?></p>
                                                                <?php endif; ?>
                                                                <div class="flex items-center space-x-2 mt-1">
                                                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                                                                        <?php echo e(strtoupper($material->file_type)); ?>

                                                                    </span>
                                                                    <span class="text-xs text-gray-500">
                                                                        <?php echo e(number_format($material->file_size / 1024 / 1024, 2)); ?> MB
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            
                                                            <a href="<?php echo e(route('materials.download', $material)); ?>" 
                                                               class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors">
                                                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                                                </svg>
                                                                Download
                                                            </a>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            <?php else: ?>
                                                <div class="text-center py-4">
                                                    <p class="text-gray-500">Belum ada materi untuk mata kuliah ini</p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\himpunan-ticketing\resources\views/materials/index.blade.php ENDPATH**/ ?>