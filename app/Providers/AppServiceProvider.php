<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Dependency injection: bind interfaces to implementations
        $this->app->bind('App\Models\CurrencyExchangeRateService', 'App\Models\CurrencyDummyWebservice');
        $this->app->bind('App\Models\CurrencyConverterService', 'App\Models\DefaultCurrencyConverter');
    }
}
