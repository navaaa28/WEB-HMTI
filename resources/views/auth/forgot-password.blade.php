@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-50 to-purple-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-xl">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Lupa Password
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Masukkan email Anda dan kami akan mengirimkan link untuk mereset password Anda.
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form class="mt-8 space-y-6" method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-hover:text-indigo-900 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <input type="email" name="email" required 
                           class="block w-full pl-10 pr-4 py-3 border-2 border-purple-100 rounded-xl focus:ring-2 focus:ring-purple-200 focus:border-purple-400 transition-all duration-200 bg-white/70 backdrop-blur-sm @error('email') border-red-300 focus:border-red-400 focus:ring-red-200 @enderror"
                           placeholder="Masukkan email Anda"
                           value="{{ old('email') }}">
                </div>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" 
                    class="w-full py-3 px-4 bg-gradient-to-r from-indigo-900 to-purple-800 text-white rounded-xl font-medium hover:shadow-lg hover:scale-[1.02] transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-offset-2">
                Kirim Link Reset Password
            </button>

            <!-- Back to Login -->
            <div class="text-center">
                <a href="{{ route('login') }}" 
                   class="text-sm text-indigo-900 hover:text-purple-800 transition-colors duration-200">
                    Kembali ke Login
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
