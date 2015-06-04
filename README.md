## Laravel Crontab

Laravel 5 requires the following command to use the built-in scheduler.

```
* * * * * php /path/to/artisan schedule:run 1>> /dev/null 2>&1
```

This package adds this command in your crontab.

### Installation

Add the package to your `composer.json` file.

```json
{
    "require": {
        "kostaspt/laravel-crontab": "dev-master"
    }
}
```

In your `config\app.php`, add the `ServiceProvider` to the providers array.

```php
'providers' => [
    ...
    'KostasPt\Crontab\ServiceProvider',
];
```
