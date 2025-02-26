<nav class="bg-white/80 backdrop-blur-md shadow-lg fixed top-0 left-0 right-0 z-50 border-b border-purple-100" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="<?php echo e(route('welcome')); ?>" class="flex items-center group">
                    <img src="<?php echo e(asset('storage/images/logo.png')); ?>" alt="Logo HMTI" class="h-12 w-12 rounded-full shadow-md transition-all duration-300 group-hover:scale-110 group-hover:shadow-lg">
                    <span class="ml-3 text-2xl font-bold bg-gradient-to-r from-indigo-900 to-purple-800 bg-clip-text text-transparent font-serif group-hover:from-purple-800 group-hover:to-indigo-900 transition-all">
                        HMTI
                    </span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6 lg:space-x-8">
                <?php if(auth()->guard()->guest()): ?>
                    <a href="<?php echo e(route('welcome')); ?>" class="px-3 py-2 text-gray-700 hover:text-indigo-900 font-medium transition-all relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-indigo-900 after:transition-all <?php echo e(request()->routeIs('welcome') ? 'text-indigo-900 after:w-full' : ''); ?>">
                        Home
                    </a>
                    <a href="#about" class="px-3 py-2 text-gray-700 hover:text-indigo-900 font-medium transition-all relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-indigo-900 after:transition-all">
                        Tentang
                    </a>
                    <a href="<?php echo e(route('internships')); ?>" class="px-3 py-2 text-gray-700 hover:text-indigo-900 font-medium transition-all relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-indigo-900 after:transition-all <?php echo e(request()->routeIs('internships') ? 'text-indigo-900 after:w-full' : ''); ?>">
                        Program Magang
                    </a>
                    <a href="<?php echo e(route('login')); ?>" class="px-3 py-2 text-gray-700 hover:text-indigo-900 font-medium transition-all relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-indigo-900 after:transition-all">
                        Masuk
                    </a>
                    <a href="<?php echo e(route('register')); ?>" class="px-6 py-2.5 bg-gradient-to-r from-indigo-900 to-purple-800 text-white rounded-full hover:shadow-lg hover:scale-105 transition-all duration-300 text-sm lg:text-base font-medium">
                        Daftar
                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('dashboard')); ?>" class="px-3 py-2 text-gray-700 hover:text-indigo-900 font-medium transition-all relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-indigo-900 after:transition-all <?php echo e(request()->routeIs('dashboard') ? 'text-indigo-900 after:w-full' : ''); ?>">
                        Dashboard
                    </a>
                    <a href="<?php echo e(route('internships')); ?>" class="px-3 py-2 text-gray-700 hover:text-indigo-900 font-medium transition-all relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-indigo-900 after:transition-all <?php echo e(request()->routeIs('internships') ? 'text-indigo-900 after:w-full' : ''); ?>">
                        Program Magang
                    </a>
                    <a href="#events" class="px-3 py-2 text-gray-700 hover:text-indigo-900 font-medium transition-all relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-indigo-900 after:transition-all">
                        Acara
                    </a>
                    <a href="<?php echo e(route('registrations.index')); ?>" class="px-3 py-2 text-gray-700 hover:text-indigo-900 font-medium transition-all relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 hover:after:w-full after:bg-indigo-900 after:transition-all <?php echo e(request()->routeIs('registrations.*') ? 'text-indigo-900 after:w-full' : ''); ?>">
                        Registrasi Saya
                    </a>

                    <!-- Dropdown -->
                    <div class="relative" x-data="{ openDropdown: false }">
                        <button @click="openDropdown = !openDropdown" class="flex items-center space-x-2 group px-4 py-2 rounded-full border border-purple-100 hover:border-purple-200 transition-all">
                            <span class="text-gray-700 group-hover:text-indigo-900 text-sm lg:text-base font-medium"><?php echo e(Auth::user()->name); ?></span>
                            <svg class="w-4 h-4 text-gray-600 transform transition-transform" :class="{ 'rotate-180': openDropdown }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="openDropdown" @click.away="openDropdown = false"
                            class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-xl border border-purple-50 py-2 overflow-hidden"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-95">
                            
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="block w-full px-4 py-2 text-left text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 hover:text-indigo-900 transition-all">
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Mobile Button -->
            <div class="md:hidden">
                <button @click="open = !open" type="button" class="p-2 rounded-lg text-indigo-900 hover:bg-indigo-50 transition-all focus:outline-none">
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
        <div class="md:hidden" x-show="open" @click.away="open = false"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform -translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <?php if(auth()->guard()->guest()): ?>
                    <a href="<?php echo e(route('welcome')); ?>" class="block px-3 py-2 text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 hover:text-indigo-900 rounded-lg transition-all font-medium">
                        Home
                    </a>
                    <a href="#about" class="block px-3 py-2 text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 hover:text-indigo-900 rounded-lg transition-all font-medium">
                        Tentang
                    </a>
                    <a href="<?php echo e(route('internships')); ?>" class="block px-3 py-2 text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 hover:text-indigo-900 rounded-lg transition-all font-medium">
                        Program Magang
                    </a>
                    <a href="<?php echo e(route('login')); ?>" class="block px-3 py-2 text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 hover:text-indigo-900 rounded-lg transition-all font-medium">
                        Masuk
                    </a>
                    <a href="<?php echo e(route('register')); ?>" class="block px-4 py-2 text-white bg-gradient-to-r from-indigo-900 to-purple-800 rounded-lg hover:shadow-lg transition-all text-sm font-medium text-center">
                        Daftar
                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('dashboard')); ?>" class="block px-3 py-2 text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 hover:text-indigo-900 rounded-lg transition-all font-medium">
                        Dashboard
                    </a>
                    <a href="<?php echo e(route('internships')); ?>" class="block px-3 py-2 text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 hover:text-indigo-900 rounded-lg transition-all font-medium">
                        Program Magang
                    </a>
                    <a href="#events" class="block px-3 py-2 text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 hover:text-indigo-900 rounded-lg transition-all font-medium">
                        Acara
                    </a>
                    <a href="<?php echo e(route('registrations.index')); ?>" class="block px-3 py-2 text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 hover:text-indigo-900 rounded-lg transition-all font-medium">
                        Registrasi Saya
                    </a>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="block w-full px-3 py-2 text-left text-gray-700 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 hover:text-indigo-900 rounded-lg transition-all font-medium">
                            Keluar
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav><?php /**PATH C:\laragon\www\himpunan-ticketing\resources\views/layouts/header.blade.php ENDPATH**/ ?>