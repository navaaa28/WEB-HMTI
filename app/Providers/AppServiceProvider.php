<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Midtrans\Config;
use App\Models\Registration;
use App\Observers\RegistrationObserver;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Support\Facades\URL;
use Livewire\Livewire;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
        Registration::observe(RegistrationObserver::class);
        FilamentIcon::register([
            'qr-code' => 'heroicon-o-qrcode', // Daftarkan ikon di sini
        ]);
        if (request()->header('X-Forwarded-Proto') === 'https') {
            URL::forceScheme('https');
        }
    }
}
