<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\TicketsChart;
use App\Filament\Widgets\LatestTickets;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    
    protected static string $view = 'filament.pages.dashboard';
    
    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }
    
    public function getWidgets(): array
    {
        return [
            TicketsChart::class,
            LatestTickets::class,
        ];
    }
} 