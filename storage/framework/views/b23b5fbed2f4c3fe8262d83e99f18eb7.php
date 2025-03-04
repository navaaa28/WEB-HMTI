<nav class="fixed top-0 left-0 right-0 z-50" x-data="{ open: false }">
    <!-- Spacer div to prevent content jump -->
    <div class="h-24"></div>
    
    <!-- Header Content -->
    <div class="absolute inset-x-0 top-0 pt-6 pb-4">
        <div class="w-[95%] max-w-5xl mx-auto bg-white shadow-xl rounded-full border border-gray-100 relative">
            <div class="px-6">
                <div class="flex justify-between items-center h-16 md:h-20">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="<?php echo e(route('welcome')); ?>" class="flex items-center group">
                            <img src="<?php echo e(asset('storage/images/logo.png')); ?>" alt="Logo HMTI" class="h-8 w-8 md:h-12 md:w-12 rounded-full shadow-md transition-all duration-300 group-hover:scale-110 group-hover:shadow-lg">
                            <span class="ml-2 md:ml-3 text-lg md:text-2xl font-bold bg-gradient-to-r from-blue-900 to-blue-700 bg-clip-text text-transparent font-serif group-hover:from-blue-700 group-hover:to-blue-900 transition-all">
                                HMTI
                            </span>
                        </a>
                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden md:flex items-center space-x-4 lg:space-x-6">
                        <?php if(auth()->guard()->guest()): ?>
                            <a href="<?php echo e(route('welcome')); ?>" class="px-2 lg:px-3 py-2 text-sm lg:text-base text-gray-700 hover:text-blue-900 font-medium transition-all relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-blue-900 after:transition-all <?php echo e(request()->routeIs('welcome') ? 'text-blue-900 after:w-full' : ''); ?>">
                                Home
                            </a>
                            <a href="#about" class="px-2 lg:px-3 py-2 text-sm lg:text-base text-gray-700 hover:text-blue-900 font-medium transition-all relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-blue-900 after:transition-all">
                                Tentang
                            </a>
                            <a href="<?php echo e(route('internships')); ?>" class="px-2 lg:px-3 py-2 text-sm lg:text-base text-gray-700 hover:text-blue-900 font-medium transition-all relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-blue-900 after:transition-all <?php echo e(request()->routeIs('internships') ? 'text-blue-900 after:w-full' : ''); ?>">
                                Program Magang
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
                            <a href="<?php echo e(route('internships')); ?>" class="px-2 lg:px-3 py-2 text-sm lg:text-base text-gray-700 hover:text-blue-900 font-medium transition-all relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-blue-900 after:transition-all <?php echo e(request()->routeIs('internships') ? 'text-blue-900 after:w-full' : ''); ?>">
                                Program Magang
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
                                        <button type="submit" class="block w-full px-4 py-2 text-left text-sm lg:text-base text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:text-blue-900 transition-all">
                                            Keluar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Mobile Button -->
                    <div class="md:hidden">
                        <button @click="open = !open" type="button" class="p-1.5 rounded-lg text-blue-900 hover:bg-blue-50 transition-all focus:outline-none">
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
                <div class="md:hidden absolute left-0 right-0 top-full mt-2 bg-white rounded-2xl border border-gray-100 shadow-lg z-[60]" 
                    x-show="open" 
                    @click.away="open = false"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 transform translate-y-0"
                    x-transition:leave-end="opacity-0 transform -translate-y-2">
                    <div class="px-2 pt-2 pb-3 space-y-1">
                        <?php if(auth()->guard()->guest()): ?>
                            <a href="<?php echo e(route('welcome')); ?>" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:text-blue-900 rounded-lg transition-all font-medium <?php echo e(request()->routeIs('welcome') ? 'bg-gradient-to-r from-blue-50 to-blue-100 text-blue-900' : ''); ?>">
                                Home
                            </a>
                            <a href="#about" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:text-blue-900 rounded-lg transition-all font-medium">
                                Tentang
                            </a>
                            <a href="<?php echo e(route('internships')); ?>" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:text-blue-900 rounded-lg transition-all font-medium <?php echo e(request()->routeIs('internships') ? 'bg-gradient-to-r from-blue-50 to-blue-100 text-blue-900' : ''); ?>">
                                Program Magang
                            </a>
                            <a href="<?php echo e(route('login')); ?>" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:text-blue-900 rounded-lg transition-all font-medium">
                                Masuk
                            </a>
                            <a href="<?php echo e(route('register')); ?>" class="block px-4 py-2 text-sm text-white bg-gradient-to-r from-blue-900 to-blue-700 rounded-lg hover:shadow-lg transition-all font-medium text-center">
                                Daftar
                            </a>
                        <?php else: ?>
                            <div class="px-3 py-2 mb-2">
                                <p class="text-sm font-medium text-gray-900"><?php echo e(Auth::user()->name); ?></p>
                            </div>
                            <a href="<?php echo e(route('dashboard')); ?>" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:text-blue-900 rounded-lg transition-all font-medium <?php echo e(request()->routeIs('dashboard') ? 'bg-gradient-to-r from-blue-50 to-blue-100 text-blue-900' : ''); ?>">
                                Dashboard
                            </a>
                            <a href="<?php echo e(route('internships')); ?>" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:text-blue-900 rounded-lg transition-all font-medium <?php echo e(request()->routeIs('internships') ? 'bg-gradient-to-r from-blue-50 to-blue-100 text-blue-900' : ''); ?>">
                                Program Magang
                            </a>
                            <a href="<?php echo e(route('dashboard')); ?>#events" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:text-blue-900 rounded-lg transition-all font-medium">
                                Acara
                            </a>
                            <a href="<?php echo e(route('registrations.index')); ?>" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:text-blue-900 rounded-lg transition-all font-medium <?php echo e(request()->routeIs('registrations.*') ? 'bg-gradient-to-r from-blue-50 to-blue-100 text-blue-900' : ''); ?>">
                                Registrasi Saya
                            </a>
                            <div class="border-t border-gray-200 my-2"></div>
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="block w-full px-3 py-2 text-left text-sm text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 hover:text-blue-900 rounded-lg transition-all font-medium">
                                    Keluar
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav><?php /**PATH C:\laragon\www\himpunan-ticketing\resources\views/layouts/header.blade.php ENDPATH**/ ?>