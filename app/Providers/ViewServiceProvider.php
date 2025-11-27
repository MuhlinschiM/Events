<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $view->with('categories', Category::all());
        });
    }
}
