<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Response;

class macroProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('cap',function($str){
            return $str .' ahihi';
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
