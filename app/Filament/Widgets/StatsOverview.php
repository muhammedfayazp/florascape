<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Today\'s Visits', \App\Models\Visit::whereDate('created_at', \Carbon\Carbon::today())->count())
                ->description('Total unique site hits today')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Total Services', \App\Models\Service::count())
                ->description('Active service offerings'),
            Stat::make('Total Projects', \App\Models\Project::count())
                ->description('Showcased in portfolio'),
        ];
    }
}
