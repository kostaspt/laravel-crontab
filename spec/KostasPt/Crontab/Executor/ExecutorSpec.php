<?php

namespace spec\KostasPt\Crontab\Executor;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ExecutorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('KostasPt\Crontab\Executor\Executor');
    }

    function it_changes_the_base_path()
    {
        $this->setBasePath('/path/to/artisan');

        $this->getBasePath()->shouldBe('/path/to/artisan');
    }
}
