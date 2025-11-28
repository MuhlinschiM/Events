<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Page;

class Dashboard extends Page
{
    protected ?string $heading = 'Dashboard'; 
    protected ?string $subheading = null;

    protected string $view = 'filament.admin.pages.dashboard';
    public function getWidgets(): array
{
    return [
        \App\Filament\Admin\Widgets\EventsOverview::class,
    ];
}

    
}
    
