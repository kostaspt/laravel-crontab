<?php namespace KostasPt\Crontab;

use Illuminate\Support\ServiceProvider;
use KostasPt\Crontab\Executor\Executor;

class CrontabServiceProvider extends ServiceProvider {

    /**
     * Setup cron job
     *
     * @return void
     */
    public function register()
    {
        (new Executor)->execute();
    }
}
