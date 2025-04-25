<?php

namespace Spatie\Harvest;

use Spatie\Harvest\Exceptions\HarvestException;
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
            ->hasConfigFile();
    }

    public function registeringPackage(): void
    {
        $this->app->scoped(Harvest::class, function () {
            if (config('harvest-sdk.account_id') === null) {
                throw HarvestException::missingAccountId();
            }

            if (config('harvest-sdk.access_token') === null) {
                throw HarvestException::missingAccessToken();
            }

            if (config('harvest-sdk.user_agent') === null) {
                throw HarvestException::missingUserAgent();
            }

            return new Harvest(
                config('harvest-sdk.account_id'),
                config('harvest-sdk.access_token'),
                config('harvest-sdk.user_agent'),
            );
        });
    }
}
