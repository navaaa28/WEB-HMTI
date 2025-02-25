@extends('layouts.app')
<script src="//unpkg.com/alpinejs" defer></script>
@section('content')
<div class="flex min-h-screen items-center justify-center bg-purple-50">
    <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-lg border border-purple-100">
        <!-- Header dengan Logo -->
        <div class="text-center mb-8">
        <div class="mb-4 flex justify-center">
                <img src="{{ asset('storage/images/logo.png') }}" class="w-16 h-16" alt="Logo">
            </div>
            <h1 class="text-3xl font-bold text-indigo-900 font-serif">HMTI Login</h1>
            <p class="text-gray-600 mt-2">Teknik Industri Universitas Teknologi Bandung</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="space-y-5">
                <!-- Email Input -->
                <!-- Di resources/views/auth/login.blade.php -->
<div>
    <label class="block text-sm font-medium text-gray-700 mb-1">NIM</label>
    <div class="relative flex items-center">
        <span class="absolute left-3 text-gray-400">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
            </svg>
        </span>
        <input 
            type="text" 
            name="nim" 
            required 
            class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition duration-200 @error('nim') border-red-500 @enderror" 
            placeholder="Nomor Induk Mahasiswa"
        >
    </div>
    @error('nim')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

                <!-- Password Input -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative flex items-center">
                        <span class="absolute left-3 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </span>
                        <input 
                            type="password" 
                            name="password" 
                            required 
                            class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition duration-200 @error('password') border-red-500 @enderror" 
                            placeholder="Password"
                        >
                    </div>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember & Forgot Password -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="rounded text-purple-500 focus:ring-purple-500">
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                    <a href="{{ route('password.request') }}" class="text-sm text-purple-700 hover:underline">Forgot Password?</a>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-indigo-900 text-white py-3 rounded-lg font-semibold hover:bg-purple-800 transition duration-200">
                    Sign In
                </button>

                <!-- Register Link -->
                <p class="text-center text-sm text-gray-600">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-purple-700 hover:underline font-medium">Create Account</a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
