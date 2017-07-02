<?php

namespace spec\IdentityAccess\Application;

use IdentityAccess\Application\RegistrationHandler;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RegistrationHandlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(RegistrationHandler::class);
    }
}
