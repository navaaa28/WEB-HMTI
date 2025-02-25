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
                <h1 class="text-3xl font-bold bg-gradient-to-r from-indigo-900 to-purple-800 bg-clip-text text-transparent font-serif">HMTI Login</h1>
                <p class="text-gray-600 mt-2 text-sm">Teknik Industri Universitas Teknologi Bandung</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
                @csrf
                <!-- NIM Input -->
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700">NIM</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-hover:text-indigo-900 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <input type="text" name="nim" required 
                               class="block w-full pl-10 pr-4 py-3 border-2 border-purple-100 rounded-xl focus:ring-2 focus:ring-purple-200 focus:border-purple-400 transition-all duration-200 bg-white/70 backdrop-blur-sm @error('nim') border-red-300 focus:border-red-400 focus:ring-red-200 @enderror"
                               placeholder="Nomor Induk Mahasiswa">
                    </div>
                    @error('nim')
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
                               placeholder="Password">
                    </div>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember & Forgot Password -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center group">
                        <input type="checkbox" name="remember" 
                               class="w-4 h-4 rounded text-indigo-900 border-purple-200 focus:ring-purple-200 transition-colors duration-200">
                        <span class="ml-2 text-sm text-gray-600 group-hover:text-indigo-900 transition-colors duration-200">Remember me</span>
                    </label>
                    <a href="{{ route('password.request') }}" 
                       class="text-sm text-indigo-900 hover:text-purple-800 transition-colors duration-200">
                        Forgot Password?
                    </a>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full py-3 px-4 bg-gradient-to-r from-indigo-900 to-purple-800 text-white rounded-xl font-medium hover:shadow-lg hover:scale-[1.02] transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-offset-2">
                    Sign In
                </button>

                <!-- Register Link -->
                <p class="text-center text-sm text-gray-600">
                    Don't have an account? 
                    <a href="{{ route('register') }}" 
                       class="font-medium text-indigo-900 hover:text-purple-800 transition-colors duration-200">
                        Create Account
                    </a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
