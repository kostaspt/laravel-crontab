<?php namespace spec\KostasPt\Crontab\Executor;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class JobSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('KostasPt\Crontab\Executor\Job');
    }

    function it_generates_the_full_command()
    {
        $this->getCronCommand()->shouldBe('* * * * * `which php` ./artisan schedule:run 1>> /dev/null 2>&1');
    }

    function it_can_change_the_base_path()
    {
        $this->beConstructedWith('/path/to/');

        $this->getCronCommand()->shouldBe('* * * * * `which php` /path/to/artisan schedule:run 1>> /dev/null 2>&1');
    }

    function it_does_not_add_many_backslashes_in_base_path()
    {
        $this->beConstructedWith('/path/to///');

        $this->getCronCommand()->shouldBe('* * * * * `which php` /path/to/artisan schedule:run 1>> /dev/null 2>&1');
    }
}
