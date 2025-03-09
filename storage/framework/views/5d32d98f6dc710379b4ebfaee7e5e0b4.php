<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <title><?php echo $__env->yieldContent('title', 'Himpunan Mahasiswa Teknologi Industri'); ?></title> 
    
    <!-- Alpine.js -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Tailwind & Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Favicon -->
    <link rel="icon" href="<?php echo e(asset('storage/images/favicon.ico')); ?>" type="image/x-icon">

    <!-- Mobile Optimization Styles -->
    <style>
        /* Base font size adjustments for mobile */
        @media (max-width: 768px) {
            html {
                font-size: 14px;
            }
            
            /* Increase touch targets for better mobile interaction */
            button, 
            [role="button"],
            .touch-target {
                min-height: 44px;
                min-width: 44px;
            }

            /* Improve tap target spacing */
            a, button {
                padding: 0.75rem;
                margin: 0.25rem;
            }

            /* Prevent text size adjustment */
            body {
                -webkit-text-size-adjust: none;
                text-size-adjust: none;
            }
        }

        /* Smooth scrolling for better UX */
        html {
            scroll-behavior: smooth;
        }

        /* Focus styles for better accessibility */
        a:focus,
        button:focus {
            outline: 2px solid #2563eb;
            outline-offset: 2px;
        }

        /* Remove tap highlight on mobile */
        * {
            -webkit-tap-highlight-color: transparent;
        }

        /* Custom scrollbar for better UX */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>
<body class="bg-gray-100 antialiased">
    
    <?php echo $__env->make('layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="w-full">
        <?php if(session('success')): ?>
            <div class="max-w-7xl mx-auto px-4">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
                    <?php echo e(session('success')); ?>

                </div>
            </div>
        <?php endif; ?>
        
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Rate Limiting Script -->
    <script>
        // Simple rate limiting for form submissions
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                let lastSubmitTime = 0;
                const THROTTLE_DELAY = 2000; // 2 seconds

                form.addEventListener('submit', function(e) {
                    const now = Date.now();
                    if (now - lastSubmitTime < THROTTLE_DELAY) {
                        e.preventDefault();
                        return false;
                    }
                    lastSubmitTime = now;
                });
            });
        });

        // Double-tap prevention
        document.addEventListener('click', function(e) {
            if (e.target.tagName === 'BUTTON' || e.target.tagName === 'A') {
                e.target.style.pointerEvents = 'none';
                setTimeout(() => {
                    e.target.style.pointerEvents = 'auto';
                }, 1000);
            }
        }, true);
    </script>
</body>
</html><?php /**PATH C:\laragon\www\WEB-HMTI\resources\views/layouts/app.blade.php ENDPATH**/ ?>