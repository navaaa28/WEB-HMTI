@extends('layouts.app')
<script src="//unpkg.com/alpinejs" defer></script>
@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 to-purple-100 py-8 sm:py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Card Container -->
        <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-indigo-900 to-purple-700 p-6 sm:p-8">
                <h1 class="text-2xl sm:text-3xl font-bold text-white font-serif mb-2">Registrasi Acara: {{ $event->name }}</h1>
                <div class="flex items-center text-purple-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span>{{ $event->event_date->format('d F Y, H:i') }}</span>
                </div>
            </div>

            <!-- Content Section -->
            <div class="p-6 sm:p-8 space-y-6">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Event Photo -->
                @if($event->photo)
                    <div class="rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $event->photo) }}" 
                             alt="{{ $event->name }}" 
                             class="w-full h-48 sm:h-64 object-cover">
                    </div>
                @endif

                <!-- Event Description -->
                <div class="prose max-w-none text-gray-700">
                    {!! nl2br(e($event->description)) !!}
                </div>

                <!-- Event Details -->
                <div class="space-y-4">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-gray-700"><strong>Tanggal:</strong> {{ $event->event_date->format('d F Y, H:i') }}</span>
                    </div>

                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="text-gray-700">
                            <strong>Harga Tiket:</strong> 
                            @if ($event->price > 0)
                                Rp {{ number_format($event->price, 0, ',', '.') }}
                            @else
                                <span class="text-green-600">Gratis</span>
                            @endif
                        </span>
                    </div>
                </div>

                <!-- Registration Form -->
                @if ($event->registration_open)
                    @if ($event->price > 0)
                        <!-- Bayar Sekarang Button -->
                        <button type="button" 
                                class="w-full bg-indigo-900 text-white px-6 py-3 rounded-lg hover:bg-purple-800 transition duration-300 flex items-center justify-center"
                                data-bs-toggle="modal" 
                                data-bs-target="#paymentModal">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            Bayar Sekarang
                        </button>
                    @else
                        <!-- Form Daftar Gratis -->
                        <form action="{{ route('events.register', $event->id) }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                                <input type="text" id="name" name="name" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-300" 
                                       value="{{ auth()->user()->name }}" readonly>
                            </div>
                            <button type="submit" 
                                    class="w-full bg-indigo-900 text-white px-6 py-3 rounded-lg hover:bg-purple-800 transition duration-300 flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                Daftar Sekarang
                            </button>
                        </form>
                    @endif
                @else
                    <p class="text-red-600 text-center">Pendaftaran telah ditutup.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal Pembayaran -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-indigo-900 text-white">
                <h5 class="modal-title font-serif" id="paymentModalLabel">Pembayaran Tiket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Pilih Metode Pembayaran -->
                <div class="mb-4">
                    <label for="payment_method" class="block text-sm font-medium text-gray-700 mb-2">Pilih Metode Pembayaran</label>
                    <select name="payment_method_id" id="payment_method" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-300" 
                            required onchange="updatePaymentDetails()">
                        <option value="">Pilih Metode</option>
                        @foreach($paymentMethods as $method)
                            <option value="{{ $method->id }}" 
                                    data-bank="{{ $method->bank }}" 
                                    data-account-number="{{ $method->account_number }}" 
                                    data-account-name="{{ $method->account_name }}" 
                                    data-qrcode="{{ $method->qr_code ? asset('storage/' . $method->qr_code) : '' }}">
                                {{ $method->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Detail Pembayaran -->
                <div id="payment_details" class="hidden mb-4">
                    <p class="text-gray-700 mb-2">Silakan lakukan pembayaran ke rekening berikut:</p>
                    <ul class="list-disc list-inside text-gray-700 mb-4">
                        <li><strong>Bank:</strong> <span id="bank_name"></span></li>
                        <li><strong>Nomor Rekening:</strong> <span id="account_number"></span></li>
                        <li><strong>Atas Nama:</strong> <span id="account_name"></span></li>
                    </ul>

                    <!-- QR Code Container -->
                    <div id="qr_code_container" class="hidden mb-4">
                        <p class="text-gray-700 mb-2">Scan QR Code untuk pembayaran:</p>
                        <img id="qr_code_img" src="" alt="QR Code" class="w-48 mx-auto">
                    </div>
                </div>

                <!-- Form Pembayaran -->
                <form action="{{ route('events.pay', $event->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="payment_proof" class="block text-sm font-medium text-gray-700 mb-2">Unggah Bukti Pembayaran</label>
                        <input type="file" name="payment_proof" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-300" 
                               required>
                    </div>

                    <button type="submit" 
                            class="w-full bg-indigo-900 text-white px-6 py-3 rounded-lg hover:bg-purple-800 transition duration-300">
                        Bayar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function updatePaymentDetails() {
        const select = document.getElementById("payment_method");
        const selectedOption = select.options[select.selectedIndex];
        const bank = selectedOption.getAttribute("data-bank");
        const accountNumber = selectedOption.getAttribute("data-account-number");
        const accountName = selectedOption.getAttribute("data-account-name");
        const qrCodeUrl = selectedOption.getAttribute("data-qrcode");

        const paymentDetails = document.getElementById("payment_details");
        const qrCodeContainer = document.getElementById("qr_code_container");
        const qrCodeImg = document.getElementById("qr_code_img");

        if (bank && accountNumber && accountName) {
            document.getElementById("bank_name").textContent = bank;
            document.getElementById("account_number").textContent = accountNumber;
            document.getElementById("account_name").textContent = accountName;
            paymentDetails.classList.remove("hidden");

            if (qrCodeUrl) {
                qrCodeImg.src = qrCodeUrl;
                qrCodeContainer.classList.remove("hidden");
            } else {
                qrCodeContainer.classList.add("hidden");
            }
        } else {
            paymentDetails.classList.add("hidden");
            qrCodeContainer.classList.add("hidden");
        }
    }
</script>
@endsection