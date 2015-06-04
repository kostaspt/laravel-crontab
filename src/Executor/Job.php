<?php namespace KostasPt\Crontab\Executor;

class Job {

    protected $basePath;

    function __construct($basePath = './')
    {
        $this->basePath = $basePath;
    }

    public function getArtisanLocation()
    {
        while (substr($this->basePath, -1) == '/')
        {
            $this->basePath = substr($this->basePath, 0, -1);
        }

        return $this->basePath . '/artisan';
    }

    /**
     * Generates the full crontab command
     *
     * @return string
     */
    public function getCronCommand()
    {
        return '* * * * * `which php` ' . $this->getArtisanLocation() . ' schedule:run 1>> /dev/null 2>&1';
    }

    /**
     * Determines if the job is already setup-ed.
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

        return ! $isCronJobRunning;
    }
}
