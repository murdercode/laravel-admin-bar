<?php

namespace Murdercode\LaravelAdminBar;

use Illuminate\Support\Facades\Blade;
use Murdercode\LaravelAdminBar\Commands\LaravelAdminBarCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelAdminBarServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-admin-bar')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-admin-bar_table')
            ->hasTranslations()
            ->hasAssets()
            ->hasCommand(LaravelAdminBarCommand::class);
    }

    public function packageBooted()
    {
        Blade::componentNamespace('Murdercode\LaravelAdminBar\View', 'laravel-admin-bar');
    }
}
