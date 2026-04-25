<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Force HTTPS if the application is running in Azure (production)
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
        // Force the root URL to be the Gateway IP instead of the Azure Hostname
        if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
            \URL::forceRootUrl(config('app.url'));
        }
    }
}
