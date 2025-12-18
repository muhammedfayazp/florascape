<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class VisitsChart extends ChartWidget
{
    protected static ?string $heading = 'Weekly Traffic';

    protected function getData(): array
    {
        $data = [];
        $labels = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = \Carbon\Carbon::today()->subDays($i);
            $labels[] = $date->format('M d');
            $data[] = \App\Models\Visit::whereDate('created_at', $date)->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Visits',
                    'data' => $data,
                    'borderColor' => '#4D9D45',
                    'fill' => 'start',
                    'backgroundColor' => 'rgba(77, 157, 69, 0.1)',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
