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
}
