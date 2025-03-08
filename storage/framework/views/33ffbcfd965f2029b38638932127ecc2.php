<script src="//unpkg.com/alpinejs" defer></script>
<?php $__env->startSection('content'); ?>
<div class="mt-32">
    <div class="min-h-screen bg-gradient-to-br from-purple-50 to-purple-100 py-8 sm:py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Card Container -->
            <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
                <!-- Header Section -->
                <div class="bg-gradient-to-r from-indigo-900 to-purple-700 p-6 sm:p-8">
                    <h1 class="text-2xl sm:text-3xl font-bold text-white font-serif mb-2">Registrasi Acara: <?php echo e($event->name); ?></h1>
                    <div class="flex items-center text-purple-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span><?php echo e($event->event_date->format('d F Y, H:i')); ?></span>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="p-6 sm:p-8 space-y-6">
                    <!-- Flash Messages -->
                    <?php if(session('success')): ?>
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if(session('error')): ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>

                    <!-- Event Photo -->
                    <?php if($event->photo): ?>
                        <div class="rounded-lg overflow-hidden">
                            <img src="<?php echo e(asset('storage/' . $event->photo)); ?>" 
                                 alt="<?php echo e($event->name); ?>" 
                                 class="w-full h-48 sm:h-64 object-cover">
                        </div>
                    <?php endif; ?>

                    <!-- Event Description -->
                    <div class="prose max-w-none text-gray-700">
                        <?php echo nl2br(e($event->description)); ?>

                    </div>

                    <!-- Event Details -->
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-700"><strong>Tanggal:</strong> <?php echo e($event->event_date->format('d F Y, H:i')); ?></span>
                        </div>

                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="text-gray-700"><strong>Lokasi:</strong> <?php echo e($event->location); ?></span>
                        </div>

                        <?php if($event->registration_deadline): ?>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-gray-700"><strong>Batas Pendaftaran:</strong> <?php echo e($event->registration_deadline->format('d F Y, H:i')); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if($event->quota > 0): ?>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                <span class="text-gray-700"><strong>Kuota:</strong> <?php echo e($event->registrations()->whereIn('status', ['pending', 'approved'])->count()); ?>/<?php echo e($event->quota); ?> Peserta</span>
                            </div>
                        <?php endif; ?>

                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span class="text-gray-700">
                                <strong>Harga Tiket:</strong> 
                                <?php if($event->price > 0): ?>
                                    Rp <?php echo e(number_format($event->price, 0, ',', '.')); ?>

                                <?php else: ?>
                                    <span class="text-green-600">Gratis</span>
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>

                    <!-- Registration Form -->
                    <?php if($event->registration_open): ?>
                        <?php if($event->price > 0): ?>
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
                        <?php else: ?>
                            <!-- Form Daftar Gratis -->
                            <form action="<?php echo e(route('events.register', $event->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="mb-4">
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                                    <input type="text" id="name" name="name" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-300" 
                                           value="<?php echo e(auth()->user()->name); ?>" readonly>
                                </div>
                                <div class="mb-4">
                                    <label for="nim" class="block text-sm font-medium text-gray-700 mb-2">NIM</label>
                                    <input type="text" id="nim" name="nim" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-300" 
                                           value="<?php echo e(auth()->user()->nim); ?>" readonly>
                                </div>
                                <button type="submit" 
                                        class="w-full bg-indigo-900 text-white px-6 py-3 rounded-lg hover:bg-purple-800 transition duration-300 flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                    Daftar Sekarang
                                </button>
                            </form>
                        <?php endif; ?>
                    <?php else: ?>
                        <p class="text-red-600 text-center">Pendaftaran telah ditutup.</p>
                    <?php endif; ?>
                </div>
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
                        <?php $__currentLoopData = $paymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($method->id); ?>" 
                                    data-bank="<?php echo e($method->bank); ?>" 
                                    data-account-number="<?php echo e($method->account_number); ?>" 
                                    data-account-name="<?php echo e($method->account_name); ?>" 
                                    data-qrcode="<?php echo e($method->qr_code ? asset('storage/' . $method->qr_code) : ''); ?>">
                                <?php echo e($method->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <form action="<?php echo e(route('events.pay', $event->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="mb-4">
                        <label for="payment_proof" class="block text-sm font-medium text-gray-700 mb-2">Unggah Bukti Pembayaran</label>
                        <input type="file" name="payment_proof" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-300" 
                               required>
                    </div>

                    <!-- Hidden input untuk payment_method_id -->
                    <input type="hidden" name="payment_method_id" id="selected_payment_method_id">

                    <button type="submit" 
                            class="w-full bg-indigo-900 text-white px-6 py-3 rounded-lg hover:bg-purple-800 transition duration-300">
                        Bayar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk Menampilkan Detail Pembayaran -->
<script>
    function updatePaymentDetails() {
        const select = document.getElementById("payment_method");
        const selectedOption = select.options[select.selectedIndex];
        const bank = selectedOption.getAttribute("data-bank");
        const accountNumber = selectedOption.getAttribute("data-account-number");
        const accountName = selectedOption.getAttribute("data-account-name");
        const qrCodeUrl = selectedOption.getAttribute("data-qrcode");

        // Set nilai payment_method_id ke hidden input
        document.getElementById("selected_payment_method_id").value = selectedOption.value;

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\WEB-HMTI\resources\views/events/register.blade.php ENDPATH**/ ?>