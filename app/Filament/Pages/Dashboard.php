<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Dashboard extends Page
{
    protected string $view = 'filament.admin.pages.dashboard';
    public function getWidgets(): array
{
    return [
        \App\Filament\Admin\Widgets\EventsOverview::class,
    ];
}


}
