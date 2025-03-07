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
            Stat::make('Total Events', $totalEvents)
                ->description('Total number of events')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('primary'),

            Stat::make('Upcoming Events', $upcomingEvents)
                ->description('Events scheduled for the future')
                ->descriptionIcon('heroicon-m-clock')
                ->color('success'),

            Stat::make('Active Registrations', $activeRegistrations)
                ->description('Events currently accepting registrations')
                ->descriptionIcon('heroicon-m-user-plus')
                ->color('warning'),
        ];
    }
} 