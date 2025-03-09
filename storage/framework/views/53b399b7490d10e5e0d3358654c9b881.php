<?php $__env->startSection('content'); ?>
<div class="pt-20 md:pt-28 overflow-visible relative">
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-50 via-purple-50 to-purple-100 py-24 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md" x-data="{ password: '', strength: 0, message: '', showPassword: false, loading: false, photoPreview: null }">
            <!-- Card dengan efek glass morphism -->
            <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-xl border border-blue-100 p-8 space-y-8 transition-all duration-300 hover:shadow-2xl transform hover:-translate-y-1">
                <!-- Header dengan Logo -->
                <div class="text-center">
                    <div class="mb-6 relative group">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-800 rounded-full blur opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                        <img src="<?php echo e(asset('storage/images/logo.png')); ?>" class="w-20 h-20 mx-auto relative transform transition-transform duration-300 group-hover:scale-105 hover:rotate-6" alt="Logo">
                    </div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-blue-900 to-blue-700 bg-clip-text text-transparent font-serif animate-fade-in">Buat Akun</h1>
                    <p class="text-gray-600 mt-2 text-sm">Teknik Industri Universitas Teknologi Bandung</p>
                </div>

                <form method="POST" action="<?php echo e(route('register')); ?>" class="mt-8 space-y-4" @submit="loading = true" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <!-- Profile Photo Input -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Foto Profil</label>
                        <div class="relative group">
                            <div class="mt-1 flex items-center justify-center">
                                <div class="w-full">
                                    <div x-show="!photoPreview" 
                                         class="cursor-pointer bg-white/70 backdrop-blur-sm hover:bg-blue-50 flex justify-center px-6 pt-5 pb-6 border-2 border-blue-100 border-dashed rounded-xl transition-all duration-200"
                                         @click="$refs.photo.click()">
                                        <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <div class="text-sm text-gray-600">
                                                <span class="font-medium text-blue-600 hover:text-blue-500">Upload foto</span>
                                                <input x-ref="photo" 
                                                       type="file" 
                                                       name="profile_photo" 
                                                       class="hidden" 
                                                       accept="image/*"
                                                       @change="
                                                            const file = $event.target.files[0];
                                                            if (file) {
                                                                const reader = new FileReader();
                                                                reader.onload = (e) => {
                                                                    photoPreview = e.target.result;
                                                                };
                                                                reader.readAsDataURL(file);
                                                            }
                                                        ">
                                            </div>
                                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                        </div>
                                    </div>

                                    <!-- Image Preview -->
                                    <div x-show="photoPreview" class="relative">
                                        <img :src="photoPreview" class="rounded-xl h-40 w-40 object-cover mx-auto">
                                        <button type="button" 
                                                class="absolute top-0 right-0 -mr-1 -mt-1 bg-red-100 text-red-600 rounded-full p-2 hover:bg-red-200 focus:outline-none" 
                                                @click="photoPreview = null; $refs.photo.value = ''">
                                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $__errorArgs = ['profile_photo'];
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

                    <!-- Name Input -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-hover:text-blue-900 transition-colors duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <input type="text" name="name" required value="<?php echo e(old('name')); ?>"
                                   class="block w-full pl-10 pr-4 py-3 border-2 border-blue-100 rounded-xl focus:ring-2 focus:ring-blue-200 focus:border-blue-400 transition-all duration-200 bg-white/70 backdrop-blur-sm <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 focus:border-red-400 focus:ring-red-200 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   placeholder="Masukkan nama lengkap">
                        </div>
                        <?php $__errorArgs = ['name'];
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

                    <!-- NIM Input -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">NIM</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-hover:text-blue-900 transition-colors duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                                </svg>
                            </div>
                            <input type="text" name="nim" required value="<?php echo e(old('nim')); ?>"
                                   class="block w-full pl-10 pr-4 py-3 border-2 border-blue-100 rounded-xl focus:ring-2 focus:ring-blue-200 focus:border-blue-400 transition-all duration-200 bg-white/70 backdrop-blur-sm <?php $__errorArgs = ['nim'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 focus:border-red-400 focus:ring-red-200 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   placeholder="Masukkan NIM">
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

                    <!-- Email Input -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-hover:text-blue-900 transition-colors duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <input type="email" name="email" required value="<?php echo e(old('email')); ?>"
                                   class="block w-full pl-10 pr-4 py-3 border-2 border-blue-100 rounded-xl focus:ring-2 focus:ring-blue-200 focus:border-blue-400 transition-all duration-200 bg-white/70 backdrop-blur-sm <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 focus:border-red-400 focus:ring-red-200 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   placeholder="Masukkan email">
                        </div>
                        <?php $__errorArgs = ['email'];
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
                            <input :type="showPassword ? 'text' : 'password'" name="password" required x-model="password"
                                   @input="
                                        let p = $event.target.value;
                                        let s = 0;
                                        if (p.length >= 8) s++;
                                        if (p.match(/[a-z]/)) s++;
                                        if (p.match(/[A-Z]/)) s++;
                                        if (p.match(/[0-9]/)) s++;
                                        if (p.match(/[^a-zA-Z0-9]/)) s++;
                                        strength = s;
                                        message = s === 0 ? 'Sangat Lemah' :
                                                 s === 1 ? 'Lemah' :
                                                 s === 2 ? 'Sedang' :
                                                 s === 3 ? 'Kuat' :
                                                 s === 4 ? 'Sangat Kuat' : 'Sempurna';
                                   "
                                   class="block w-full pl-10 pr-12 py-3 border-2 border-blue-100 rounded-xl focus:ring-2 focus:ring-blue-200 focus:border-blue-400 transition-all duration-200 bg-white/70 backdrop-blur-sm <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 focus:border-red-400 focus:ring-red-200 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   placeholder="Masukkan password">
                            <button type="button" 
                                    @click="showPassword = !showPassword"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-blue-900 transition-colors duration-200">
                                <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <svg x-show="showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                                </svg>
                            </button>
                        </div>
                        <!-- Password Strength Indicator with Animation -->
                        <div class="mt-2 transform transition-all duration-300" 
                             x-show="password.length > 0"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 transform -translate-y-2"
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             x-transition:leave="transition ease-in duration-300"
                             x-transition:leave-start="opacity-100 transform translate-y-0"
                             x-transition:leave-end="opacity-0 transform -translate-y-2">
                            <div class="flex space-x-1">
                                <div class="h-1.5 flex-1 rounded-full transition-all duration-500 ease-out"
                                     :class="{
                                         'bg-red-500': strength === 0,
                                         'bg-orange-500': strength === 1,
                                         'bg-yellow-500': strength === 2,
                                         'bg-green-500': strength === 3,
                                         'bg-blue-500': strength === 4,
                                         'bg-blue-900': strength === 5
                                     }"
                                     :style="'width: ' + (strength * 20) + '%'">
                                </div>
                                <div class="h-1.5 flex-1 rounded-full bg-gray-200"
                                     :style="'width: ' + (100 - (strength * 20)) + '%'">
                                </div>
                            </div>
                            <div class="flex items-center mt-1 space-x-1">
                                <p class="text-sm transition-colors duration-300"
                                   :class="{
                                       'text-red-500': strength === 0,
                                       'text-orange-500': strength === 1,
                                       'text-yellow-500': strength === 2,
                                       'text-green-500': strength === 3,
                                       'text-blue-500': strength === 4,
                                       'text-blue-900': strength === 5
                                   }"
                                   x-text="message">
                                </p>
                                <div class="text-xs text-gray-500" x-show="strength < 3">
                                    (Gunakan minimal 8 karakter dengan huruf besar, kecil, angka, dan simbol)
                                </div>
                            </div>
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

                    <!-- Confirm Password Input -->
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-hover:text-blue-900 transition-colors duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input type="password" name="password_confirmation" required
                                   class="block w-full pl-10 pr-4 py-3 border-2 border-blue-100 rounded-xl focus:ring-2 focus:ring-blue-200 focus:border-blue-400 transition-all duration-200 bg-white/70 backdrop-blur-sm"
                                   placeholder="Konfirmasi password">
                        </div>
                    </div>

                    <!-- Submit Button with Loading Animation -->
                    <button type="submit" 
                            class="relative w-full py-3 px-4 bg-gradient-to-r from-blue-900 to-blue-700 text-white rounded-xl font-medium hover:shadow-lg transform hover:scale-[1.02] active:scale-[0.98] transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 overflow-hidden"
                            :class="{ 'cursor-not-allowed': loading }"
                            :disabled="loading">
                        <span x-show="!loading">Daftar</span>
                        <span x-show="loading" class="absolute inset-0 flex items-center justify-center">
                            <svg class="animate-spin h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                        <span x-show="loading" class="absolute bottom-0 left-0 h-1 bg-white/30" 
                              :style="'width: 100%; animation: progress-bar 2s linear;'"></span>
                    </button>

                    <!-- Login Link -->
                    <p class="text-center text-sm text-gray-600 mt-4">
                        Sudah punya akun? 
                        <a href="<?php echo e(route('login')); ?>" 
                           class="font-medium text-blue-900 hover:text-blue-700 transition-colors duration-200 hover:underline">
                            Masuk
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\WEB-HMTI\resources\views/auth/register.blade.php ENDPATH**/ ?>