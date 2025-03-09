<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PaymentController;
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
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SearchController;
use App\Models\Ticket;

// Public Routes
Route::group(['as' => 'public.'], function () {
    // Home
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // News & Events
    Route::group(['prefix' => 'news', 'as' => 'news.'], function () {
        Route::get('/', [HomeController::class, 'allNews'])->name('index');
        Route::get('/search', [NewsController::class, 'search'])->name('search');
        Route::get('/category/{category:slug}', [NewsController::class, 'category'])->name('category');
        Route::get('/{news:slug}', [HomeController::class, 'showNews'])->name('show');
        Route::get('/{news:slug}/related', [NewsController::class, 'related'])->name('related');
    });

    // Events
    Route::group(['prefix' => 'events', 'as' => 'events.'], function () {
        Route::get('/{id}', [EventController::class, 'show'])->name('show');
    });

    // Resources
    Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota');
    Route::get('/internships', [InternshipController::class, 'index'])->name('internships');
    Route::get('/internships/{internship}', [InternshipController::class, 'show'])->name('internships.show');
    Route::get('/materials', [MaterialController::class, 'index'])->name('materials');
    Route::get('/materials/{material}/download', [MaterialController::class, 'download'])->name('materials.download');

    // Payment Callbacks
    Route::post('/midtrans/callback', [MidtransController::class, 'handleCallback'])->name('payment.callback');
    Route::get('/midtrans/approve/{orderId}', [MidtransController::class, 'approveTransaction'])->name('payment.approve');
    
    // Ticket Verification
    Route::post('/verify-ticket', [TicketController::class, 'verifyTicket'])
        ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class])
        ->name('ticket.verify');
});

// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index');
    
    // Profile Management
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
    
    // Event Registration
    Route::group(['prefix' => 'events', 'as' => 'events.'], function () {
        Route::get('/{event}/register', [EventController::class, 'showRegisterForm'])->name('register.form');
        Route::post('/{event}/register', [EventController::class, 'register'])->name('register');
        Route::post('/{event}/pay', [EventController::class, 'storePayment'])->name('pay');
    });

    // Payment Processing
    Route::group(['prefix' => 'payment', 'as' => 'payment.'], function () {
        Route::get('/{eventId}', [PaymentController::class, 'processPayment'])->name('process');
        Route::get('/update/{orderId}', [PaymentController::class, 'updatePaymentStatus'])->name('update');
        Route::get('/success/{orderId}', [PaymentController::class, 'paymentSuccess'])->name('success');
    });

    // Tickets
    Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');

    // Aspirasi
    Route::group(['prefix' => 'aspirasi', 'as' => 'aspirasi.'], function () {
        Route::get('/', [AspirasiController::class, 'create'])->name('create');
        Route::post('/', [AspirasiController::class, 'store'])->name('store');
    });
});

// Error Pages
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

require __DIR__.'/auth.php';