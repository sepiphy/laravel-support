
# Laravel Support Extension

## Requirements

- Laravel [5.6](https://laravel.com/docs/5.6) or [5.7](https://laravel.com/docs/5.7).

## Installation

You should install the `sepiphy/laravel-support` dependency via Composer:

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

- If you want to use Dependency Injection instead of Laravel Facades, [Interaction](Interaction) classes may be pretty choices.

- If you want to use a wrapper instead of Model mutators/accessors, try the [Presenter](Presenter.php) class.

- If you want to split your simple query builder, try the [Query](Query.php) class.
