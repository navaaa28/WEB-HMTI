<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Event;
use App\Models\Registration;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Acara', Event::count())
                ->description('Jumlah seluruh acara')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('primary'),
            
            Stat::make('Total Pendaftaran', Registration::count())
                ->description('Jumlah seluruh pendaftaran')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success'),
            
            Stat::make('Acara Mendatang', Event::where('event_date', '>', now())->count())
                ->description('Acara yang belum dimulai')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('warning'),
        ];
    }
} 