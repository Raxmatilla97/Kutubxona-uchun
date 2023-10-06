<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\BookCategory;  

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       // Using wildcard '*' to share the data with all views
        View::composer('*', function ($view) {
            $list_category = BookCategory::all(); // Fetch all categories
            $view->with('list_category', $list_category);
        });
    }
}
