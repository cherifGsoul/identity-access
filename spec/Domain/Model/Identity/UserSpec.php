<?php

namespace spec\IdentityAccess\Domain\Model\Identity;

use IdentityAccess\Domain\Model\Identity\User;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(User::class);
    }
}
