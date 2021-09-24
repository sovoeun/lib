<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 9/24/2021
 * Time: 11:23 AM
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
class CamdigikeyServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__.'/../database/migrations' => database_path('migrations'),
            ], 'camdigikey-migrations');

            $this->publishes([
                __DIR__.'/../config/camdigikey.php' => config_path('camdigikey.php'),
            ], 'camdigikey-config');
        }

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/camdigikey.php', 'camdigikey');
    }


}