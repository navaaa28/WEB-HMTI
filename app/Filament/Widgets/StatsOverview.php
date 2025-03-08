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
            Stat::make('Total Events', Event::count())
                ->description('Total number of events')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('primary'),
            
            Stat::make('Total Registrations', Registration::count())
                ->description('Total event registrations')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success'),
            
            Stat::make('Upcoming Events', Event::where('event_date', '>', now())->count())
                ->description('Events that haven\'t started yet')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('warning'),
        ];
    }
} 