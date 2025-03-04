<style>
.fi-simple-main {
    background-color: rgb(17 24 39) !important;
}

.fi-simple-footer {
    display: none !important;
}

.fi-form-wrapper {
    position: relative;
    z-index: 10;
}

.login-box {
    position: relative;
}

.login-box::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, transparent, #00ffff, #ff00ff);
    transform: rotate(0deg);
    animation: animate 4s linear infinite;
}

.login-box::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, transparent, #00ffff, #ff00ff);
    transform: rotate(180deg);
    animation: animate 4s linear infinite;
    animation-delay: -2s;
}

@keyframes animate {
    0% {
        transform: rotate(0deg);
        filter: hue-rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
        filter: hue-rotate(360deg);
    }
}

.fi-input-wrp {
    background-color: rgb(55 65 81) !important;
    border-color: rgb(75 85 99) !important;
}

.fi-input {
    background: transparent !important;
    color: white !important;
}

.fi-input::placeholder {
    color: rgb(156 163 175) !important;
}

.fi-btn {
    background: linear-gradient(to right, #00ffff, #ff00ff) !important;
    border: none !important;
    transition: all 0.3s ease !important;
}

.fi-btn:hover {
    opacity: 0.9;
    transform: scale(1.02);
}
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const wrapper = document.querySelector('.fi-form-wrapper');
        if (wrapper) {
            wrapper.classList.add('login-box');
        }
        
        // Ubah judul login
        const title = document.querySelector('.fi-simple-header-heading');
        if (title) {
            title.innerHTML = '<span style="color: #ff69b4">❤️</span> LOGIN <span style="color: #ff69b4">❤️</span>';
        }
    });
</script> <?php /**PATH C:\laragon\www\himpunan-ticketing\resources\views/filament/pages/auth/custom-login.blade.php ENDPATH**/ ?>