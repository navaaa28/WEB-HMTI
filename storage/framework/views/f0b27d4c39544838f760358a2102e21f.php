<?php if (isset($component)) { $__componentOriginalbe23554f7bded3778895289146189db7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbe23554f7bded3778895289146189db7 = $attributes; } ?>
<?php $component = Filament\View\LegacyComponents\Page::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Filament\View\LegacyComponents\Page::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="p-4 max-w-md mx-auto">
        <h2 class="text-xl font-bold mb-4 text-center">Scan QR Code Tiket</h2>

        
        <!--[if BLOCK]><![endif]--><?php if(session()->has('success')): ?>
            <div class="p-2 bg-green-500 text-white rounded mb-4 text-center"><?php echo e(session('success')); ?></div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <?php if(session()->has('error')): ?>
            <div class="p-2 bg-red-500 text-white rounded mb-4 text-center"><?php echo e(session('error')); ?></div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        
        <div class="relative">
            <video id="preview" class="w-full h-64 bg-gray-200 rounded-lg"></video>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="border-2 border-dashed border-white w-64 h-64"></div>
            </div>
        </div>

        <button onclick="startScanner()" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded w-full">Mulai Scan</button>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.min.js"></script>
    <script>
        // Pastikan jsQR sudah terdefinisi
        if (typeof jsQR === 'undefined') {
            console.error('jsQR library tidak berhasil dimuat.');
        }

        let scannerInterval;

        function startScanner() {
            const video = document.getElementById('preview');
            navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } })
                .then((stream) => {
                    video.srcObject = stream;
                    video.onloadedmetadata = () => {
                        video.play();
                        scanQRCode(video);
                    };
                })
                .catch((error) => {
                    console.error('Error accessing camera:', error);
                    alert('Tidak dapat mengakses kamera. Pastikan izin kamera diberikan.');
                });
        }

        function scanQRCode(video) {
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');

            function captureFrame() {
                if (video.videoWidth === 0 || video.videoHeight === 0) {
                    return requestAnimationFrame(captureFrame); // Tunggu hingga ukuran video valid
                }

                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                context.drawImage(video, 0, 0, canvas.width, canvas.height);
                
                const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
                const qrCode = jsQR(imageData.data, imageData.width, imageData.height);

                if (qrCode) {
                    sendQRCode(qrCode.data);
                    stopScanner(video);
                    setTimeout(startScanner, 3000); // Buka kamera kembali setelah 3 detik
                } else {
                    requestAnimationFrame(captureFrame);
                }
            }
            captureFrame();
        }

        function stopScanner(video) {
            const stream = video.srcObject;
            if (stream) {
                const tracks = stream.getTracks();
                tracks.forEach(track => track.stop());
                video.srcObject = null;
            }
        }

        function sendQRCode(qrCode) {
            console.log('QR Code detected:', qrCode); // Log data QR code yang dibaca
            fetch('http://localhost:8000/verify-ticket', { // Pastikan endpoint benar
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ qr_code: qrCode }) // Pastikan key-nya 'qr_code'
            })
            .then(response => response.json())
            .then(data => {
                console.log('Response from server:', data); // Log respons dari server
                alert(data.message);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbe23554f7bded3778895289146189db7)): ?>
<?php $attributes = $__attributesOriginalbe23554f7bded3778895289146189db7; ?>
<?php unset($__attributesOriginalbe23554f7bded3778895289146189db7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbe23554f7bded3778895289146189db7)): ?>
<?php $component = $__componentOriginalbe23554f7bded3778895289146189db7; ?>
<?php unset($__componentOriginalbe23554f7bded3778895289146189db7); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\himpunan-ticketing\resources\views/filament/pages/verify-ticket.blade.php ENDPATH**/ ?>