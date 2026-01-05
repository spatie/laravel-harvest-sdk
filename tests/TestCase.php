<?php

namespace Spatie\Harvest\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\Harvest\HarvestServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            HarvestServiceProvider::class,
        ];
    }
}
