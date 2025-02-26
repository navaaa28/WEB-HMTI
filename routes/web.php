<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\MaterialController;
use App\Filament\Pages\VerifyTicket;
use App\Models\Ticket;

// Halaman publik untuk semua pengunjung
Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/midtrans/approve/{orderId}', [MidtransController::class, 'approveTransaction']);
Route::post('/verify-ticket', [TicketController::class, 'verifyTicket'])
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);
    Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/internships', [InternshipController::class, 'index'])->name('internships');
Route::get('/internships/{internship}', [InternshipController::class, 'show'])->name('internships.show');
Route::get('/materials', [MaterialController::class, 'index'])->name('materials.index');
Route::get('/materials/{material}/download', [MaterialController::class, 'download'])->name('materials.download');


    
    

// Halaman dashboard yang diproteksi
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index');
        // Profile Routes
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        
        // Form untuk mendaftar ke event
        Route::get('/events/{event}/register', [EventController::class, 'showRegisterForm'])->name('events.register.form');
        Route::post('/events/{event}/pay', [EventController::class, 'storePayment'])->name('events.pay');
        // Rute POST untuk mendaftar ke event
        Route::post('/events/{event}/register', [EventController::class, 'register'])->name('events.register');
    
        // Rute untuk pembayaran tiket
        Route::get('/payment/{eventId}', [PaymentController::class, 'processPayment'])->name('payment.process');
        Route::get('/payment/update/{orderId}', [PaymentController::class, 'updatePaymentStatus']);
        Route::get('/payment/success/{orderId}', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
    
        // Ticket Routes
        Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
    
        Route::get('/aspirasi', [AspirasiController::class, 'create'])->name('aspirasi.create');
        Route::post('/aspirasi', [AspirasiController::class, 'store'])->name('aspirasi.store');
});


// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index');
    
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Form untuk mendaftar ke event
    Route::get('/events/{event}/register', [EventController::class, 'showRegisterForm'])->name('events.register.form');
    Route::post('/events/{event}/pay', [EventController::class, 'storePayment'])->name('events.pay');
    // Rute POST untuk mendaftar ke event
    Route::post('/events/{event}/register', [EventController::class, 'register'])->name('events.register');

    // Rute untuk pembayaran tiket
    Route::get('/payment/{eventId}', [PaymentController::class, 'processPayment'])->name('payment.process');
    Route::get('/payment/update/{orderId}', [PaymentController::class, 'updatePaymentStatus']);
    Route::get('/payment/success/{orderId}', [PaymentController::class, 'paymentSuccess'])->name('payment.success');

    // Ticket Routes
    Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');

    Route::get('/aspirasi', [AspirasiController::class, 'create'])->name('aspirasi.create');
    Route::post('/aspirasi', [AspirasiController::class, 'store'])->name('aspirasi.store');

});

require __DIR__.'/auth.php';