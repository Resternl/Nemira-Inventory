<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\item; 

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
        View::composer('*', function ($view) {
        $view->with('titem', item::count());
        $view->with('tstock', item::sum('jumlah_item'));
    });
    }
}
