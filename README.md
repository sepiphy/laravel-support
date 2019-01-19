
# The Sepiphy Laravel Support package

## Requirements

- Laravel [5.6](https://laravel.com/docs/5.5), [5.6](https://laravel.com/docs/5.6) or [5.7](https://laravel.com/docs/5.7).

## Installation

Install the `sepiphy/laravel-support` package via Composer:

```bash
composer require sepiphy/laravel-support
```

Then, you have to add the `Sepiphy\Laravel\Support\SupportServiceProvider` class to the `config/app.php` configuration file.

```php
return [

    'providers' => [

        /*
         * Package Service Providers...
         */
        Sepiphy\Laravel\Support\SupportServiceProvider::class,

    ],

];
```

## Usage

- If you want to use Dependency Injection instead of Laravel Facades, try [Interaction](Interaction) traits.
- If you want to use a wrapper instead of Model mutators/accessors, try the [Presenter](Presenter.php) class.
- If you want to split your simple query builder, try the [Query](Query.php) class.

## Contributing

Please visit [sepiphy/laravel-extensions](../../README.md) for more details!

## License

The `sepiphy/laravel-support` package is open-sourced software licensed under the [MIT license](LICENSE.md).
