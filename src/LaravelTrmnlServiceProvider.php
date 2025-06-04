<?php

namespace Bnussbau\LaravelTrmnl;

use Bnussbau\LaravelTrmnl\Auth\TrmnlGuard;
use Bnussbau\LaravelTrmnl\Commands\PrintPublicPluginConfigurationCommand;
use Illuminate\Support\Facades\Auth;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelTrmnlServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-trmnl')
            ->hasConfigFile()
            ->discoversMigrations()
            ->hasRoute('web')
            ->hasCommand(PrintPublicPluginConfigurationCommand::class);
    }

    public function packageBooted(): void
    {

        // Register TRMNL guard
        Auth::extend('trmnl', function ($app) {
            return new TrmnlGuard($app->make('request'));
        });

        $this->mergeConfigFrom(__DIR__.'/../config/auth.guards.php', 'auth.guards');
    }
}
