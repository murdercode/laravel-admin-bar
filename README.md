# Laravel Admin Bar

[![Latest Version on Packagist](https://img.shields.io/packagist/v/murdercode/laravel-admin-bar.svg?style=flat-square)](https://packagist.org/packages/murdercode/laravel-admin-bar)
[![run-tests](https://github.com/murdercode/laravel-admin-bar/actions/workflows/run-tests.yml/badge.svg)](https://github.com/murdercode/laravel-admin-bar/actions/workflows/run-tests.yml)
[![Fix PHP code style issues](https://github.com/murdercode/laravel-admin-bar/actions/workflows/fix-php-code-style-issues.yml/badge.svg)](https://github.com/murdercode/laravel-admin-bar/actions/workflows/fix-php-code-style-issues.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/murdercode/laravel-admin-bar.svg?style=flat-square)](https://packagist.org/packages/murdercode/laravel-admin-bar)

A simple, but powerful, package for include an Admin bar (like Wordpress) in your next fantastic Laravel project.

## Installation

You can install the package via composer:

```bash
composer require murdercode/laravel-admin-bar
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-admin-bar-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-admin-bar-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-admin-bar-views"
```

## Usage
In any part of your layout you can include the admin bar using the following code:

```php
{{LaravelAdminBar::render()}}
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

- [Stefano Novelli](https://github.com/murdercode)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
