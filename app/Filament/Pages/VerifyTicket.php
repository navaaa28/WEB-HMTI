<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class VerifyTicket extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-check-badge';
    protected static string $view = 'filament.pages.verify-ticket';

    protected static ?string $title = 'Verifikasi Tiket';
    protected static ?string $navigationLabel = 'Verifikasi Tiket';
    protected static ?string $slug = 'verify-ticket';
    protected static ?string $navigationGroup = 'Menu Verifikasi';

    public function verifyTicket($qrCode)
    {
        $response = \Http::post(url('/api/verify-ticket'), [
            'ticket_code' => $qrCode,
        ]);

        if ($response->successful()) {
            session()->flash('success', 'Tiket berhasil diverifikasi!');
        } else {
            session()->flash('error', 'Tiket tidak valid atau sudah digunakan.');
        }
    }
}
