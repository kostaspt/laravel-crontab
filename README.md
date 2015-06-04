## Laravel Crontab

![Build Status Images](https://travis-ci.org/kostaspt/crontabber.svg)

Laravel 5.x requires you to add the following command to your system's crontab to use the built-in scheduler.

```
* * * * * php /path/to/artisan schedule:run 1>> /dev/null 2>&1
```

This package will add this command for you.

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
    'KostasPt\Crontab\CrontabServiceProvider',
];
```
