<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Event;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class EventsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total events', Event::count()),
            Stat::make('Latest event', Event::latest()->first()?->title ?? 'No events'),
        ];
    }
}
