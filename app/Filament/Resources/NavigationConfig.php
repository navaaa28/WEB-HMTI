<?php

namespace App\Filament\Resources;

use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;

class NavigationConfig
{
    public static function getNavigationGroups(): array
    {
        return [
            NavigationGroup::make()
                ->label('Menu Utama')
                ->items([
                    NavigationItem::make('Beranda')
                        ->icon('heroicon-o-home')
                        ->isActiveWhen(fn (): bool => request()->routeIs('filament.admin.pages.dashboard'))
                        ->url(fn (): string => route('filament.admin.pages.dashboard')),
                    NavigationItem::make('Aspirasi Mahasiswa')
                        ->icon('heroicon-o-chat-bubble-left-right')
                        ->url('/admin/aspirasi'),
                ]),

            NavigationGroup::make()
                ->label('Verifikasi')
                ->items([
                    NavigationItem::make('Verifikasi Tiket')
                        ->icon('heroicon-o-ticket')
                        ->url('/admin/verifikasi-tiket'),
                    NavigationItem::make('Verifikasi QR Code')
                        ->icon('heroicon-o-qr-code')
                        ->url('/admin/verifikasi-qr'),
                ]),

            NavigationGroup::make()
                ->label('Manajemen Anggota')
                ->items([
                    NavigationItem::make('Data Anggota')
                        ->icon('heroicon-o-users')
                        ->url('/admin/anggota'),
                ]),

            NavigationGroup::make()
                ->label('Manajemen Perkuliahan')
                ->items([
                    NavigationItem::make('Mata Kuliah')
                        ->icon('heroicon-o-academic-cap')
                        ->url('/admin/mata-kuliah'),
                    NavigationItem::make('Materi Kuliah')
                        ->icon('heroicon-o-book-open')
                        ->url('/admin/materi'),
                ]),

            NavigationGroup::make()
                ->label('Manajemen Acara')
                ->items([
                    NavigationItem::make('Daftar Acara')
                        ->icon('heroicon-o-calendar')
                        ->url('/admin/events'),
                ]),
        ];
    }
}
