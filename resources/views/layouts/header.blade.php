<nav class="bg-white shadow-xl fixed top-0 left-0 right-0 z-50 border-b border-purple-50" x-data="{ open: false }">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('welcome') }}" class="flex items-center group">
                    <img src="{{ asset('storage/images/logo.png') }}" alt="Logo HMTI" class="h-10 w-10 rounded-full transition-transform duration-300 group-hover:scale-110">
                    <span class="ml-2 text-xl font-bold text-indigo-900 font-serif group-hover:text-purple-800 transition-colors">
                        HMTI
                    </span>
                </a>
            </div>

            <!-- Mobile Button -->
            <div class="md:hidden">
                <button @click="open = !open" type="button" class="p-2 rounded-md text-indigo-900 hover:text-purple-800 focus:outline-none">
                    <svg class="h-6 w-6" :class="{ 'hidden': open, 'block': !open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg class="h-6 w-6" :class="{ 'hidden': !open, 'block': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-4 lg:space-x-6">
                @guest
                    <a href="{{ route('welcome') }}" class="px-3 py-2 text-gray-700 hover:text-indigo-900 font-medium transition-colors {{ request()->routeIs('welcome') ? 'text-indigo-900 border-b-2 border-indigo-900' : '' }}">
                        Home
                    </a>
                    <a href="#about" class="px-3 py-2 text-gray-700 hover:text-indigo-900 font-medium transition-colors">
                        Tentang
                    </a>
                    <a href="{{ route('login') }}" class="px-3 py-2 text-gray-700 hover:text-indigo-900 font-medium transition-colors">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="px-4 py-2 bg-indigo-900 text-white rounded-full hover:bg-purple-800 transition-colors shadow-lg text-sm lg:text-base">
                        Daftar
                    </a>
                @else
                    <a href="{{ route('dashboard') }}" class="px-3 py-2 text-gray-700 hover:text-indigo-900 font-medium transition-colors {{ request()->routeIs('dashboard') ? 'text-indigo-900 border-b-2 border-indigo-900' : '' }}">
                        Dashboard
                    </a>
                    <a href="#events" class="px-3 py-2 text-gray-700 hover:text-indigo-900 font-medium transition-colors">
                        Acara
                    </a>
                    <a href="{{ route('registrations.index') }}" class="px-3 py-2 text-gray-700 hover:text-indigo-900 font-medium transition-colors {{ request()->routeIs('registrations.*') ? 'text-indigo-900 border-b-2 border-indigo-900' : '' }}">
                        Registrasi Saya
                    </a>

                    <!-- Dropdown -->
                    <div class="relative" x-data="{ openDropdown: false }">
                        <button @click="openDropdown = !openDropdown" class="flex items-center space-x-2 group">
                            <span class="text-gray-700 group-hover:text-indigo-900 text-sm lg:text-base">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-600 transform transition-transform" :class="{ 'rotate-180': openDropdown }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="openDropdown" @click.away="openDropdown = false"
                            class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl border border-purple-50 py-2 overflow-hidden"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-95">
                            
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full px-4 py-2 text-left text-gray-700 hover:bg-purple-50 hover:text-indigo-900 transition-colors">
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden" x-show="open" @click.away="open = false">
            <div class="px-2 pt-2 pb-3 space-y-1">
                @guest
                    <a href="{{ route('welcome') }}" class="block px-3 py-2 text-gray-700 hover:text-indigo-900 font-medium transition-colors">
                        Home
                    </a>
                    <a href="#about" class="block px-3 py-2 text-gray-700 hover:text-indigo-900 font-medium transition-colors">
                        Tentang
                    </a>
                    <a href="{{ route('login') }}" class="block px-3 py-2 text-gray-700 hover:text-indigo-900 font-medium transition-colors">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="block px-4 py-2 text-white bg-indigo-900 rounded-full hover:bg-purple-800 transition-colors text-sm">
                        Daftar
                    </a>
                @else
                    <a href="{{ route('dashboard') }}" class="block px-3 py-2 text-gray-700 hover:text-indigo-900 font-medium transition-colors">
                        Dashboard
                    </a>
                    <a href="#events" class="block px-3 py-2 text-gray-700 hover:text-indigo-900 font-medium transition-colors">
                        Acara
                    </a>
                    <a href="{{ route('aspirasi.create') }}" class="block px-3 py-2 text-gray-700 hover:text-indigo-900 font-medium transition-colors">
                        SUARAKAN ASPIRASIMU!
                    </a>
                    <a href="{{ route('registrations.index') }}" class="block px-3 py-2 text-gray-700 hover:text-indigo-900 font-medium transition-colors">
                        Registrasi Saya
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full px-3 py-2 text-left text-gray-700 hover:text-indigo-900 font-medium transition-colors">
                            Keluar
                        </button>
                    </form>
                @endguest
            </div>
        </div>
    </div>
</nav>