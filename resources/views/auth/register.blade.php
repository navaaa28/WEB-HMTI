@extends('layouts.app')
<script src="//unpkg.com/alpinejs" defer></script>

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-50 via-purple-50 to-purple-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md">
        <!-- Card dengan efek glass morphism -->
        <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-xl border border-purple-100 p-8 space-y-8 transition-all duration-300 hover:shadow-2xl">
            <!-- Header dengan Logo -->
            <div class="text-center">
                <div class="mb-6 relative group">
                    <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full blur opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                    <img src="{{ asset('storage/images/logo.png') }}" class="w-20 h-20 mx-auto relative transform transition-transform duration-300 group-hover:scale-105" alt="Logo">
                </div>
                <h1 class="text-3xl font-bold bg-gradient-to-r from-indigo-900 to-purple-800 bg-clip-text text-transparent font-serif">Create Account</h1>
                <p class="text-gray-600 mt-2 text-sm">Teknik Industri Universitas Teknologi Bandung</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-4">
                @csrf
                <!-- Name Input -->
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-hover:text-indigo-900 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <input type="text" name="name" required value="{{ old('name') }}"
                               class="block w-full pl-10 pr-4 py-3 border-2 border-purple-100 rounded-xl focus:ring-2 focus:ring-purple-200 focus:border-purple-400 transition-all duration-200 bg-white/70 backdrop-blur-sm @error('name') border-red-300 focus:border-red-400 focus:ring-red-200 @enderror"
                               placeholder="Masukkan nama lengkap">
                    </div>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- NIM Input -->
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700">NIM</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-hover:text-indigo-900 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                            </svg>
                        </div>
                        <input type="text" name="nim" required value="{{ old('nim') }}"
                               class="block w-full pl-10 pr-4 py-3 border-2 border-purple-100 rounded-xl focus:ring-2 focus:ring-purple-200 focus:border-purple-400 transition-all duration-200 bg-white/70 backdrop-blur-sm @error('nim') border-red-300 focus:border-red-400 focus:ring-red-200 @enderror"
                               placeholder="Masukkan NIM">
                    </div>
                    @error('nim')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Input -->
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-hover:text-indigo-900 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <input type="email" name="email" required value="{{ old('email') }}"
                               class="block w-full pl-10 pr-4 py-3 border-2 border-purple-100 rounded-xl focus:ring-2 focus:ring-purple-200 focus:border-purple-400 transition-all duration-200 bg-white/70 backdrop-blur-sm @error('email') border-red-300 focus:border-red-400 focus:ring-red-200 @enderror"
                               placeholder="Masukkan email">
                    </div>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-hover:text-indigo-900 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <input type="password" name="password" required
                               class="block w-full pl-10 pr-4 py-3 border-2 border-purple-100 rounded-xl focus:ring-2 focus:ring-purple-200 focus:border-purple-400 transition-all duration-200 bg-white/70 backdrop-blur-sm @error('password') border-red-300 focus:border-red-400 focus:ring-red-200 @enderror"
                               placeholder="Masukkan password">
                    </div>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password Input -->
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-hover:text-indigo-900 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <input type="password" name="password_confirmation" required
                               class="block w-full pl-10 pr-4 py-3 border-2 border-purple-100 rounded-xl focus:ring-2 focus:ring-purple-200 focus:border-purple-400 transition-all duration-200 bg-white/70 backdrop-blur-sm"
                               placeholder="Konfirmasi password">
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full py-3 px-4 bg-gradient-to-r from-indigo-900 to-purple-800 text-white rounded-xl font-medium hover:shadow-lg hover:scale-[1.02] transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-offset-2 mt-6">
                    Daftar
                </button>

                <!-- Login Link -->
                <p class="text-center text-sm text-gray-600 mt-4">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" 
                       class="font-medium text-indigo-900 hover:text-purple-800 transition-colors duration-200">
                        Masuk
                    </a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
