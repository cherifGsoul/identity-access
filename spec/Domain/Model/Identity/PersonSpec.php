<?php

namespace spec\IdentityAccess\Domain\Model\Identity;

use IdentityAccess\Domain\Model\Identity\Person;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PersonSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Person::class);
    }
}
