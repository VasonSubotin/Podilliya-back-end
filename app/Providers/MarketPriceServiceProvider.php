<?php

namespace App\Providers;

use App\BusinessLogic\MarketPriceAggregator;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class MarketPriceServiceProvider extends ServiceProvider implements DeferrableProvider
{


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MarketPriceAggregator::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
