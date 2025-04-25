<?php

namespace Spatie\Harvest\Tests;

use Spatie\Harvest\Harvest;
use Spatie\Harvest\HarvestServiceProvider;

beforeEach(function () {
    $this->provider = new HarvestServiceProvider($this->app);
});

it('registers the Client in the container', function () {
    config()->set('harvest-sdk', [
        'account_id' => 'fake-account-id',
        'access_token' => 'fake-token',
        'user_agent' => 'fake-user-agent',
    ]);

    $this->provider->register();

    $client = app(Harvest::class);

    expect($client)->toBeInstanceOf(Harvest::class);
});

it('throws an exception if account_id is missing', function () {
    config()->set('harvest-sdk', [
        'account_id' => null,
        'access_token' => 'fake-token',
        'user_agent' => 'fake-user-agent',
    ]);

    $this->provider->register();

    app(Harvest::class);
})->throws('No Harvest account ID was provided. Make sure to set the `HARVEST_ACCOUNT_ID` environment variable.');


it('throws an exception if access_token is missing', function () {
    config()->set('harvest-sdk', [
        'account_id' => 'fake-account-id',
        'access_token' => null,
        'user_agent' => 'fake-user-agent',
    ]);

    $this->provider->register();

    app(Harvest::class);
})->throws('No Harvest access token was provided. Make sure to set the `HARVEST_ACCESS_TOKEN` environment variable.');

it('throws an exception when no user_agent is set', function () {
    config()->set('harvest-sdk', [
        'account_id' => 'fake-account-id',
        'access_token' => 'fake-token',
        'user_agent' => null,
    ]);

    $this->provider->register();

    app(Harvest::class);
})->throws('Harvest requires a User-Agent header in the format: `YourAppName (your-email@example.com)`. Please set the `HARVEST_USER_AGENT` environment variable accordingly.');
