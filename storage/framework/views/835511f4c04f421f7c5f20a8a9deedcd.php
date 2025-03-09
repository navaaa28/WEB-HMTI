<?php $__env->startSection('content'); ?>
<div class="pt-20 md:pt-28 overflow-visible relative">
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-50 via-purple-50 to-purple-100 py-24 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md" x-data="{ showPassword: false, loading: false, remember: false }">
            <!-- Card dengan efek glass morphism -->
            <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-xl border border-blue-100 p-8 space-y-8 transition-all duration-300 hover:shadow-2xl transform hover:-translate-y-1">
                <!-- Header dengan Logo -->
                <div class="text-center">
                    <div class="mb-6 relative group">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-800 rounded-full blur opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                        <img src="<?php echo e(asset('storage/images/logo.png')); ?>" class="w-20 h-20 mx-auto relative transform transition-transform duration-300 group-hover:scale-105 hover:rotate-6" alt="Logo">
                    </div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-blue-900 to-blue-700 bg-clip-text text-transparent font-serif animate-fade-in">Masuk HMTI</h1>
                    <p class="text-gray-600 mt-2 text-sm">Teknik Industri Universitas Teknologi Bandung</p>
                </div>

                <form method="POST" action="<?php echo e(route('login')); ?>" class="mt-8 space-y-6" @submit="loading = true">
                    <?php echo csrf_field(); ?>
                    <!-- NIM Input -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">NIM</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-hover:text-blue-900 transition-colors duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <input type="text" name="nim" required 
                                   class="block w-full pl-10 pr-4 py-3 border-2 border-blue-100 rounded-xl focus:ring-2 focus:ring-blue-200 focus:border-blue-400 transition-all duration-200 bg-white/70 backdrop-blur-sm <?php $__errorArgs = ['nim'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 focus:border-red-400 focus:ring-red-200 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   placeholder="Nomor Induk Mahasiswa"
                                   x-transition:enter="transition ease-out duration-300"
                                   x-transition:enter-start="opacity-0 transform -translate-y-2"
                                   x-transition:enter-end="opacity-100 transform translate-y-0">
                        </div>
                        <?php $__errorArgs = ['nim'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1 animate-fade-in"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Password Input -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-hover:text-blue-900 transition-colors duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input :type="showPassword ? 'text' : 'password'" name="password" required 
                                   class="block w-full pl-10 pr-12 py-3 border-2 border-blue-100 rounded-xl focus:ring-2 focus:ring-blue-200 focus:border-blue-400 transition-all duration-200 bg-white/70 backdrop-blur-sm <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 focus:border-red-400 focus:ring-red-200 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   placeholder="Password">
                            <button type="button" 
                                    @click="showPassword = !showPassword"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-blue-900 transition-colors duration-200">
                                <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <svg x-show="showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                                </svg>
                            </button>
                        </div>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1 animate-fade-in"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Remember & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center group cursor-pointer select-none">
                            <div class="relative">
                                <input type="checkbox" 
                                       name="remember" 
                                       id="remember"
                                       x-model="remember"
                                       class="sr-only peer" 
                                       <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                <div class="w-5 h-5 border-2 border-blue-200 rounded transition-colors duration-200 
                                          peer-checked:bg-blue-900 peer-checked:border-blue-900
                                          group-hover:border-blue-400">
                                    <svg class="w-4 h-4 text-white fill-current absolute top-0.5 left-0.5" 
                                         :class="{ 'hidden': !remember, 'block': remember }"
                                         viewBox="0 0 20 20">
                                        <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                    </svg>
                                </div>
                            </div>
                            <span class="ml-2 text-sm text-gray-600 group-hover:text-blue-900 transition-colors duration-200">Ingat saya</span>
                        </label>
                        <a href="<?php echo e(route('password.request')); ?>" 
                           class="text-sm text-blue-900 hover:text-blue-700 transition-colors duration-200 hover:underline">
                            Lupa Password?
                        </a>
                    </div>

                    <!-- Submit Button with Loading Animation -->
                    <button type="submit" 
                            class="relative w-full py-3 px-4 bg-gradient-to-r from-blue-900 to-blue-700 text-white rounded-xl font-medium hover:shadow-lg transform hover:scale-[1.02] active:scale-[0.98] transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 overflow-hidden"
                            :class="{ 'cursor-not-allowed': loading }"
                            :disabled="loading">
                        <span x-show="!loading">Masuk</span>
                        <span x-show="loading" class="absolute inset-0 flex items-center justify-center">
                            <svg class="animate-spin h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                        <span x-show="loading" class="absolute bottom-0 left-0 h-1 bg-white/30" 
                              :style="'width: 100%; animation: progress-bar 2s linear;'"></span>
                    </button>

                    <!-- Register Link -->
                    <p class="text-center text-sm text-gray-600">
                        Belum punya akun? 
                        <a href="<?php echo e(route('register')); ?>" 
                           class="font-medium text-blue-900 hover:text-blue-700 transition-colors duration-200 hover:underline">
                            Buat Akun
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>

    <style>
    @keyframes fade-in {
        0% {
            opacity: 0;
            transform: translateY(-10px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes progress-bar {
        0% { width: 0; }
        100% { width: 100%; }
    }

    .animate-fade-in {
        animation: fade-in 0.6s ease-out;
    }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\WEB-HMTI\resources\views/auth/login.blade.php ENDPATH**/ ?>