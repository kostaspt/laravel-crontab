<?php namespace KostasPt\Crontab;

use Bart\Shell\Command;
use Illuminate\Support\ServiceProvider;

class ServiceProvider extends ServiceProvider {

    /**
     * Setup cron
     *
     * @return void
     */
    public function register()
    {
        $command = '* * * * * `which php` ' . base_path() . '/artisan schedule:run 1>> /dev/null 2>&1';

        $output = (new Command('crontab -l'))->run();

        $isCronOn = $this->checkIfCronExists($output, $command);

        if ($isCronOn === false)
        {
            $this->setupCron($output, $command);
        }
    }

    private function checkIfCronExists($output, $command)
    {
        $isCronOn = false;
        foreach (preg_split('/\n/', $output) as $line)
        {
            if ($line == $command)
            {
                $isCronOn = true;
            }
        }

        return $isCronOn;
    }

    private function setupCron($output, $command)
    {
        $dir = storage_path('/tmp');

        if ( ! is_dir($dir)) mkdir($dir);

        file_put_contents($dir . '/crontab.txt', $output . $command . PHP_EOL);

        (new Command('crontab ' . $dir . '/crontab.txt'))->run();
    }
}