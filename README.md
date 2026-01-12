# A Laravel SDK for the Harvest.com API

Note: this is not a full implementation for the Harvest API, but we welcome PR's if you need anything that is still missing.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/spatie/laravel-harvest-sdk.svg?style=flat-square)](https://packagist.org/packages/spatie/laravel-harvest-sdk)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/spatie/laravel-harvest-sdk/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/spatie/laravel-harvest-sdk/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/spatie/laravel-harvest-sdk/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/spatie/laravel-harvest-sdk/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/spatie/laravel-harvest-sdk.svg?style=flat-square)](https://packagist.org/packages/spatie/laravel-harvest-sdk)

A Laravel-friendly SDK to interact with the Harvest API

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/laravel-harvest-sdk.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/laravel-harvest-sdk)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require spatie/laravel-harvest-sdk
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-harvest-sdk-config"
```

Add your Harvest credentials to your .env file:

```dotenv
HARVEST_ACCOUNT_ID=your-account-id
HARVEST_ACCESS_TOKEN=your-access-token
HARVEST_USER_AGENT='name (name@email.com)'
```

## Usage

To start interacting with the Harvest API, you can resolve the Harvest instance from the container or use the facade:

```php
use Spatie\Harvest\Harvest;

$harvest = app(Harvest::class);

// or use the facade
use Spatie\Harvest\Facades\Harvest;
```

## Users

### Retrieve the authenticated user

```php
use Spatie\Harvest\Data\UserData;
use Spatie\Harvest\Facades\Harvest;

$user = Harvest::users()->me()->dto();
// Returns: UserData
```

### Retrieve all users

```php
use Spatie\Harvest\Data\UserData;
use Spatie\Harvest\Facades\Harvest;

$users = Harvest::users()->all()->dto();
// Returns: array<UserData>
```

## Projects

### Retrieve all projects

```php
use Spatie\Harvest\Data\ProjectData;
use Spatie\Harvest\Facades\Harvest;

$projects = Harvest::projects()->all()->dto();
// Returns: array<ProjectData>
```

## Time Entries

### Retrieve time entries

Time entries are paginated. You must provide a `from` date, and optionally a `to` date and `userId`.

```php
use Spatie\Harvest\Data\TimeEntryData;
use Spatie\Harvest\Facades\Harvest;

$paginator = Harvest::timeEntries()->all(from: '2024-01-01', to: '2024-01-31');

foreach ($paginator as $timeEntries) {
    // Each page returns: array<TimeEntryData>
}

// Or collect all pages
$allTimeEntries = $paginator->collect();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Niels Vanpachtenbeke](https://github.com/Nielsvanpach)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
