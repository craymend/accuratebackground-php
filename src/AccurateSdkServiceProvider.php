<?php

namespace Craymend\AccurateSdk;

use Illuminate\Support\ServiceProvider;

class AccurateSdkServiceProvider extends ServiceProvider
{

    /**
     * This method is called after all other service providers 
     * have been registered, meaning you have access to all 
     * other services that have been registered by the framework:
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/accurate-sdk.php' => config_path('accurate-sdk.php')
        ]);
    }

    /**
     * Only bind things into the service container.
     * You should never attempt to register any event listeners,
     * routes, or any other piece of functionality within 
     * the register method.
     */
    public function register()
    {
        //
    }
}
