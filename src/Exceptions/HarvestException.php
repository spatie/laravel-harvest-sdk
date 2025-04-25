<?php

namespace Spatie\Harvest\Exceptions;

class HarvestException extends \RuntimeException
{
    public static function missingAccountId(): self
    {
        return new self('No Harvest account ID was provided. Make sure to set the `HARVEST_ACCOUNT_ID` environment variable.');
    }

    public static function missingAccessToken(): self
    {
        return new self('No Harvest access token was provided. Make sure to set the `HARVEST_ACCESS_TOKEN` environment variable.');
    }

    public static function missingUserAgent(): self
    {
        return new self('Harvest requires a User-Agent header in the format: `YourAppName (your-email@example.com)`. Please set the `HARVEST_USER_AGENT` environment variable accordingly.');
    }
}
