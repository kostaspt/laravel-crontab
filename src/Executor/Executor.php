<?php namespace KostasPt\Crontab\Executor;

class Executor {

    /**
     * It adds the command to crontab, if needed.
     */
    public function execute()
    {
        $cronjob = new Job;

        if ( ! $cronjob->shouldBeInstalled()) return;

        $tempFile = tempnam(sys_get_temp_dir(), 'KP');

        $otherCronJobs = shell_exec('crontab -l');

        file_put_contents($tempFile, $otherCronJobs . $cronjob->getCronCommand() . PHP_EOL);

        exec("crontab {$tempFile}");
    }
}
