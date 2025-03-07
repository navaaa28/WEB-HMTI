<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #374151;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 20px 0;
            background: linear-gradient(to right, #312e81, #6b21a8);
            border-radius: 12px 12px 0 0;
        }
        .logo {
            width: 120px;
            height: auto;
            margin-bottom: 15px;
        }
        .header h1 {
            color: #ffffff;
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }
        .content {
            padding: 30px 20px;
            background: #ffffff;
            border-radius: 0 0 12px 12px;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background: linear-gradient(to right, #312e81, #6b21a8);
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            margin: 20px 0;
            text-align: center;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 14px;
        }
        .note {
            background: #f3f4f6;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            font-size: 14px;
            color: #4b5563;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://i.imgur.com/VIDGkGF.png" alt="Logo" class="logo">
            <h1>Verifikasi Email</h1>
        </div>
        <div class="content">
            <p>Halo!</p>
            <p>Terima kasih telah mendaftar. Silakan klik tombol di bawah untuk memverifikasi alamat email Anda.</p>
            
            <div style="text-align: center;">
                <a href="<?php echo e($url); ?>" class="button">Verifikasi Email</a>
            </div>

            <div class="note">
                Jika Anda tidak membuat akun, tidak ada tindakan lebih lanjut yang diperlukan.
            </div>

            <div class="footer">
                <p>Jika Anda mengalami masalah saat mengklik tombol "Verifikasi Email", salin dan tempel URL berikut ke browser Anda:</p>
                <p style="word-break: break-all; color: #4338ca;"><?php echo e($url); ?></p>
                <p>Terima kasih,<br><?php echo e(config('app.name')); ?></p>
            </div>
        </div>
    </div>
</body>
</html> <?php /**PATH C:\laragon\www\WEB-HMTI\resources\views/emails/verify-email.blade.php ENDPATH**/ ?>