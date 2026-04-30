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
        if ($appUrl = config('app.url')) {
            // This stops Laravel from using the .azurewebsites.net hostname
            URL::forceRootUrl($appUrl); 

            // This ensures if your APP_URL starts with https, 
            // Laravel generates https links automatically.
            if (str_starts_with($appUrl, 'https')) {
                URL::forceScheme('https');
            } else {
                // Force HTTP if the URL explicitly says http
                // This stops the 'X-Forwarded-Proto' header from upgrading the links
                URL::forceScheme('http'); 
            }
        }   

    
    }
}
