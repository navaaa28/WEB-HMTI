<?php

namespace App\Filament\Widgets;

use App\Models\Event;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class EventInsightsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $totalEvents = Event::count();
        $upcomingEvents = Event::where('event_date', '>', now())->count();
        $activeRegistrations = Event::where('registration_open', true)->count();

        return [
            Stat::make('Total Acara', $totalEvents)
                ->description('Jumlah seluruh acara')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('primary'),

            Stat::make('Acara Mendatang', $upcomingEvents)
                ->description('Acara yang dijadwalkan')
                ->descriptionIcon('heroicon-m-clock')
                ->color('success'),

            Stat::make('Pendaftaran Aktif', $activeRegistrations)
                ->description('Acara yang sedang menerima pendaftaran')
                ->descriptionIcon('heroicon-m-user-plus')
                ->color('warning'),
        ];
    }
} 