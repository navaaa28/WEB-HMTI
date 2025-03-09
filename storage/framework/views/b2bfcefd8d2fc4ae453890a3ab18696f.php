<nav class="fixed top-0 left-0 right-0 z-50 bg-transparent" x-data="{ open: false, activeSubmenu: null }">
    <!-- Spacer div to prevent content jump on mobile and desktop -->
    <div class="h-[4.5rem] md:h-32"></div>
    
    <!-- Header Content -->
    <div class="absolute inset-x-0 top-0 py-4 md:pt-6 md:pb-4">
        <div class="w-[95%] max-w-5xl mx-auto bg-white shadow-xl rounded-full border border-gray-100">
            <div class="px-4 md:px-6">
                <div class="flex justify-between items-center h-14 md:h-20">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="<?php echo e(route('public.home')); ?>" class="flex items-center group">
                            <img src="<?php echo e(asset('storage/images/logo.png')); ?>" alt="Logo HMTI" class="h-8 w-8 md:h-12 md:w-12 rounded-full shadow-md transition-all duration-300 group-hover:scale-110 group-hover:shadow-lg">
                            <span class="ml-2 md:ml-3 text-lg md:text-2xl font-bold bg-gradient-to-r from-blue-900 to-blue-700 bg-clip-text text-transparent font-serif group-hover:from-blue-700 group-hover:to-blue-900 transition-all">
                                HMTI
                            </span>
                        </a>
                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden md:flex items-center space-x-4 lg:space-x-6">
                        <?php if(auth()->guard()->guest()): ?>
                            <a href="<?php echo e(route('public.home')); ?>" class="px-2 lg:px-3 py-2 text-sm lg:text-base text-gray-700 hover:text-blue-900 font-medium transition-all relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-blue-900 after:transition-all <?php echo e(request()->routeIs('public.home') ? 'text-blue-900 after:w-full' : ''); ?>">
                                Beranda
                            </a>
                            <a href="#about" class="px-2 lg:px-3 py-2 text-sm lg:text-base text-gray-700 hover:text-blue-900 font-medium transition-all relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-blue-900 after:transition-all">
                                Tentang
                            </a>
                            <a href="<?php echo e(route('public.internships')); ?>" class="px-2 lg:px-3 py-2 text-sm lg:text-base text-gray-700 hover:text-blue-900 font-medium transition-all relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-blue-900 after:transition-all <?php echo e(request()->routeIs('public.internships') ? 'text-blue-900 after:w-full' : ''); ?>">
                                Magang
                            </a>
                            <a href="<?php echo e(route('login')); ?>" class="px-2 lg:px-3 py-2 text-sm lg:text-base text-gray-700 hover:text-blue-900 font-medium transition-all relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-blue-900 after:transition-all">
                                Masuk
                            </a>
                            <a href="<?php echo e(route('register')); ?>" class="px-4 lg:px-6 py-2 lg:py-2.5 bg-gradient-to-r from-blue-900 to-blue-700 text-white rounded-full hover:shadow-lg hover:scale-105 transition-all duration-300 text-sm lg:text-base font-medium">
                                Daftar
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('dashboard')); ?>" class="px-2 lg:px-3 py-2 text-sm lg:text-base text-gray-700 hover:text-blue-900 font-medium transition-all relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-blue-900 after:transition-all <?php echo e(request()->routeIs('dashboard') ? 'text-blue-900 after:w-full' : ''); ?>">
                                Dashboard
                            </a>
                            <a href="<?php echo e(route('public.internships')); ?>" class="px-2 lg:px-3 py-2 text-sm lg:text-base text-gray-700 hover:text-blue-900 font-medium transition-all relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-blue-900 after:transition-all <?php echo e(request()->routeIs('public.internships') ? 'text-blue-900 after:w-full' : ''); ?>">
                                Magang
                            </a>
                            <a href="<?php echo e(route('dashboard')); ?>#events" class="px-2 lg:px-3 py-2 text-sm lg:text-base text-gray-700 hover:text-blue-900 font-medium transition-all relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-blue-900 after:transition-all">
                                Acara
                            </a>
                            <a href="<?php echo e(route('registrations.index')); ?>" class="px-2 lg:px-3 py-2 text-sm lg:text-base text-gray-700 hover:text-blue-900 font-medium transition-all relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-blue-900 after:transition-all <?php echo e(request()->routeIs('registrations.*') ? 'text-blue-900 after:w-full' : ''); ?>">
                                Registrasi Saya
                            </a>

                            <!-- Dropdown -->
                            <div class="relative" x-data="{ openDropdown: false }">
                                <button @click="openDropdown = !openDropdown" class="flex items-center space-x-2 group px-3 lg:px-4 py-1.5 lg:py-2 rounded-full border border-gray-200 hover:border-blue-200 transition-all">
                                    <span class="text-gray-700 group-hover:text-blue-900 text-sm lg:text-base font-medium truncate max-w-[120px] lg:max-w-[150px]"><?php echo e(Auth::user()->name); ?></span>
                                    <svg class="w-4 h-4 text-gray-600 transform transition-transform flex-shrink-0" :class="{ 'rotate-180': openDropdown }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </button>

                                <!-- Dropdown Menu -->
                                <div x-show="openDropdown" @click.away="openDropdown = false"
                                    class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-[60]"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 transform scale-95"
                                    x-transition:enter-end="opacity-100 transform scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="opacity-100 transform scale-100"
                                    x-transition:leave-end="opacity-0 transform scale-95">
                                    
                                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:text-blue-900 rounded-lg transition-all font-medium">
                                            Keluar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Mobile Button -->
                    <div class="md:hidden">
                        <button @click="open = !open" type="button" class="p-2 rounded-lg text-blue-900 hover:bg-blue-50 transition-all focus:outline-none">
                            <span class="sr-only">Buka menu</span>
                            <svg class="h-6 w-6" :class="{ 'hidden': open, 'block': !open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                            <svg class="h-6 w-6" :class="{ 'hidden': !open, 'block': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div class="md:hidden" 
                    x-show="open" 
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 transform translate-y-0"
                    x-transition:leave-end="opacity-0 transform -translate-y-2"
                    @click.away="open = false">
                    <div class="mt-4 mx-4">
                        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                            <div class="divide-y divide-gray-100">
                                <?php if(auth()->guard()->guest()): ?>
                                    <a href="<?php echo e(route('public.home')); ?>" 
                                       class="block px-4 py-3 text-base font-medium text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:text-blue-900 transition-all <?php echo e(request()->routeIs('public.home') ? 'bg-gradient-to-r from-blue-50 to-blue-100 text-blue-900' : ''); ?>">
                                        <div class="flex items-center">
                                            <i class="fas fa-home w-6"></i>
                                            <span>Beranda</span>
                                        </div>
                                    </a>
                                    <a href="#about" 
                                       class="block px-4 py-3 text-base font-medium text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:text-blue-900 transition-all">
                                        <div class="flex items-center">
                                            <i class="fas fa-info-circle w-6"></i>
                                            <span>Tentang</span>
                                        </div>
                                    </a>
                                    <a href="<?php echo e(route('public.internships')); ?>" 
                                       class="block px-4 py-3 text-base font-medium text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:text-blue-900 transition-all <?php echo e(request()->routeIs('public.internships') ? 'bg-gradient-to-r from-blue-50 to-blue-100 text-blue-900' : ''); ?>">
                                        <div class="flex items-center">
                                            <i class="fas fa-briefcase w-6"></i>
                                            <span>Magang</span>
                                        </div>
                                    </a>
                                    <div class="px-4 py-3 space-y-2">
                                        <a href="<?php echo e(route('login')); ?>" 
                                           class="block w-full px-4 py-2 text-center text-base font-medium text-blue-900 bg-blue-50 rounded-lg hover:bg-blue-100 transition-all">
                                            Masuk
                                        </a>
                                        <a href="<?php echo e(route('register')); ?>" 
                                           class="block w-full px-4 py-2 text-center text-base font-medium text-white bg-gradient-to-r from-blue-900 to-blue-700 rounded-lg hover:shadow-md transition-all">
                                            Daftar
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <a href="<?php echo e(route('dashboard')); ?>" 
                                       class="block px-4 py-3 text-base font-medium text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:text-blue-900 transition-all <?php echo e(request()->routeIs('dashboard') ? 'bg-gradient-to-r from-blue-50 to-blue-100 text-blue-900' : ''); ?>">
                                        <div class="flex items-center">
                                            <i class="fas fa-tachometer-alt w-6"></i>
                                            <span>Dashboard</span>
                                        </div>
                                    </a>
                                    <a href="<?php echo e(route('public.internships')); ?>" 
                                       class="block px-4 py-3 text-base font-medium text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:text-blue-900 transition-all <?php echo e(request()->routeIs('public.internships') ? 'bg-gradient-to-r from-blue-50 to-blue-100 text-blue-900' : ''); ?>">
                                        <div class="flex items-center">
                                            <i class="fas fa-briefcase w-6"></i>
                                            <span>Magang</span>
                                        </div>
                                    </a>
                                    <a href="<?php echo e(route('dashboard')); ?>#events" 
                                       class="block px-4 py-3 text-base font-medium text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:text-blue-900 transition-all">
                                        <div class="flex items-center">
                                            <i class="fas fa-calendar-alt w-6"></i>
                                            <span>Acara</span>
                                        </div>
                                    </a>
                                    <a href="<?php echo e(route('registrations.index')); ?>" 
                                       class="block px-4 py-3 text-base font-medium text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:text-blue-900 transition-all <?php echo e(request()->routeIs('registrations.*') ? 'bg-gradient-to-r from-blue-50 to-blue-100 text-blue-900' : ''); ?>">
                                        <div class="flex items-center">
                                            <i class="fas fa-clipboard-list w-6"></i>
                                            <span>Registrasi Saya</span>
                                        </div>
                                    </a>
                                    <div class="px-4 py-3">
                                        <div class="flex items-center px-4 py-2 mb-3 bg-gray-50 rounded-lg">
                                            <i class="fas fa-user w-6 text-gray-500"></i>
                                            <span class="font-medium text-gray-900 truncate"><?php echo e(Auth::user()->name); ?></span>
                                        </div>
                                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="w-full px-4 py-2 text-base font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition-all flex items-center justify-center">
                                                <i class="fas fa-sign-out-alt w-6"></i>
                                                <span>Keluar</span>
                                            </button>
                                        </form>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav><?php /**PATH C:\laragon\www\WEB-HMTI\resources\views/layouts/header.blade.php ENDPATH**/ ?>