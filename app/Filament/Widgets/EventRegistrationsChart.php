<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Registration;
use Illuminate\Support\Facades\DB;

class EventRegistrationsChart extends ChartWidget
{
    protected static ?string $heading = 'Event Registrations Overview';
    
    protected function getData(): array
    {
        $data = Registration::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();
            
        return [
            'datasets' => [
                [
                    'label' => 'Registrations',
                    'data' => $data->pluck('count')->toArray(),
                    'borderColor' => '#9333ea',
                    'fill' => false,
                ],
            ],
            'labels' => $data->pluck('date')->toArray(),
        ];
    }
    
    protected function getType(): string
    {
        return 'line';
    }
    
    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                ],
            ],
        ];
    }
} 