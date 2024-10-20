<?php

namespace Bizmitra\Amountinwords;

use Illuminate\Support\ServiceProvider;

class AmountinwordsServiceProvider extends ServiceProvider
{
    /**
     * Boot the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Load the package routes if you have any
        // $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Bind the PrintAmountInWords class to the service container
        $this->app->bind('amountinwords', function () {
            return new PrintAmountInWords();
        });
    }
}
