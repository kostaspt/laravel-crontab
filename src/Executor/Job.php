<?php namespace Kostaspt\Crontab\Executor;

class Job {

    protected $schedule;

    protected $command;

    function __construct($command = null, $schedule = null)
    {
        $this->command = $command ?: '`which php` ' . base_path() . '/artisan schedule:run 1>> /dev/null 2>&1';

        $this->schedule = $schedule ?: '* * * * *';
    }

    /**
     * Generates the full crontab command
     *
     * @return string
     */
    public function getCronCommand()
    {
        return "{$this->schedule} {$this->command}";
    }

    /**
     * Determines if the job is already setuped.
     *
     * @return bool
     */
    public function shouldBeInstalled()
    {
        $cronJobs = shell_exec('crontab -l');

        $isCronJobRunning = false;

        foreach (preg_split('/\n/', $cronJobs) as $cronJob)
        {
            if ($cronJob == $this->getCronCommand())
            {
                $isCronJobRunning = true;
            }
        }

        return $isCronJobRunning;
    }
}
