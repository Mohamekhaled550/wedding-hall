<?php

namespace App\Providers;
use App\Models\InvoicesDetails;
use App\Observers\InvoiceDetailObserver;
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
    InvoicesDetails::observe(InvoiceDetailObserver::class);
    }
}
