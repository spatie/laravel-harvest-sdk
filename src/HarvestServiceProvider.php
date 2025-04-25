<?php

namespace Spatie\Harvest;

use Spatie\Harvest\Commands\HarvestCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class HarvestServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-harvest-sdk')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_harvest_sdk_table')
            ->hasCommand(HarvestCommand::class);
    }
}
