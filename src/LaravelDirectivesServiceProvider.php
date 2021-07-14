<?php

namespace CSSJockey\LaravelDirectives;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;

class LaravelDirectivesServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot(): void
    {
        $this->bootDirectives();
    }


    /**
     * Register any package services.
     */
    public function register(): void
    {
        // Register the service the package provides.
        $this->app->singleton('laravel-directives', function ($app) {
            return new LaravelDirectives();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-directives'];
    }

    public function bootDirectives()
    {
        $filesystem = new Filesystem();
        $directives_dir_path = __DIR__.'/../directives/';
        $dirs = $filesystem->files($directives_dir_path, false);
        foreach ($dirs as $dir) {
            require $dir->getPathname();
        }
    }

}
