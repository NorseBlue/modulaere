<?php

namespace NorseBlue\Modulaere\Providers;

use Illuminate\Support\ServiceProvider;
use NorseBlue\Modulaere\ModuleManager;
use NorseBlue\Modulaere\Providers\CommandsServiceProvider;

class ModulaereServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $defaultConfig = __DIR__ . '/../../config/modulaere.php';

    /**
     * Registers the service provider.
     */
    public function register(): void
    {
        $this->registerManager();
        $this->registerProviders();
        $this->registerModules();
    }

    /**
     * Bootstraps the service provider.
     */
    public function boot(): void
    {
        $this->publishes([
            $this->defaultConfig => config_path('modulaere.php'),
        ]);

        $this->bootModules();
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [
            'modulaere',
        ];
    }

    /**
     * Registers the manager.
     */
    protected function registerManager(): void
    {
        $this->mergeConfigFrom($this->defaultConfig, 'modulaere');
        $this->app->singleton('modulaere', function ($app) {
            $modules_path = config('modulaere.paths.modules');

            return new ModuleManager($app, $modules_path);
        });
    }

    /**
     * Registers the module manager.
     */
    protected function registerModules(): void
    {
        $this->app['modulaere']->register();
    }

    /**
     * Registers the package service providers.
     */
    protected function registerProviders(): void
    {
        $this->app->register(CommandsServiceProvider::class);
    }

    /**
     * Boots the module manager.
     */
    protected function bootModules(): void
    {
        $this->app['modulaere']->boot();
    }
}
