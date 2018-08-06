<?php

namespace aBillander\Installer;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

use aBillander\Installer\Middleware\CanInstall;
use aBillander\Installer\Middleware\RedirectIfNeedsInstallation;

class InstallerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param \Illuminate\Routing\Router $router
     */
    public function boot(Router $router)
    {
        // Config
        $this->publishes([
            __DIR__.'/../config/installer.php' => config_path('installer.php'),
        ], 'config');

        // Routes
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Translations
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'installer');
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/abillander/installer'),
        ]);

        // Views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'installer');
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/abillander/installer'),
        ], 'views');

        // Assets
        $this->publishes([
            __DIR__.'/../resources/views' => public_path('vendor/abillander/installer'),
        ], 'public');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/installer.php', 'installer');
    }
}
