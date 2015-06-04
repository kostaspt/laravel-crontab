<?php namespace KostasPt\Crontab\Executor;

class Executor {

    protected $basePath = './';

    /**
     * It adds the command to crontab, if needed.
     */
    public function execute()
    {
        $cronjob = new Job($this->basePath);

        if ( ! $cronjob->shouldBeInstalled()) return;

        $tempFile = tempnam(sys_get_temp_dir(), 'KP');

        $otherCronJobs = shell_exec('crontab -l');

        file_put_contents($tempFile, $otherCronJobs . $cronjob->getCronCommand() . PHP_EOL);

        exec("crontab {$tempFile}");
    }

    public function setBasePath($basePath)
    {
        $this->basePath = $basePath;
    }
}
