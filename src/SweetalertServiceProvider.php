<?php

namespace Wavey\Sweetalert;

use Illuminate\Support\ServiceProvider;

class SweetalertServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'sweetalert');

        $this->publishes([
            __DIR__.'/../config/sweetalert.php' => config_path('sweetalert.php'),
        ], 'sweetalert-config');

        $this->publishes([
            __DIR__.'/../views' => base_path('resources/views/vendor/wavey/sweetalert'),
        ], 'sweetalert-views');

        $this->configureCommands();
    }

    /**
     * Configure the commands offered by the application.
     *
     * @return void
     */
    protected function configureCommands()
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            Console\InstallCommand::class,
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/sweetalert.php',
            'sweetalert'
        );

        $this->app->bind(
            'Wavey\Sweetalert\SessionStore',
            'Wavey\Sweetalert\LaravelSessionStore'
        );

        $this->app->bind('wavey.sweetalert', function () {
            return $this->app->make('Wavey\Sweetalert\Notifier');
        });
    }

    public function provides(): array
    {
        return [
            'Wavey\Sweetalert\SessionStore',
            'wavey.sweetalert',
        ];
    }
}
