## Crontabber

Adds the cron command that Laravel 5 needs for scheduling commands in your crontab.

### Installation

Add the package to your `composer.json`.

```json
{
    "require": {
        "kostaspt/crontabber": "dev-master"
    }
}
```

In your `config\app.php`, add `Crontabber` to your providers array

```php
'providers' => [
    ...
    'Crontabber\CrontabberServiceProvider',
];
```
