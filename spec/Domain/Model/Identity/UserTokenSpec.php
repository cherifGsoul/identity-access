<?php

namespace spec\IdentityAccess\Domain\Model\Identity;

use IdentityAccess\Domain\Model\Identity\UserToken;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserTokenSpec extends ObjectBehavior
{
    function let()
    {
      $this->beConstructedWith(Argument::type('string'),Argument::type('string'));
    }

    function it_can_be_instantiated_as_null_token()
    {
      $this->beConstructedThrough('nullTokenInstance');
      $this->username()->shouldReturn(null);
      $this->emailAddress()->shouldReturn(null);
    }
}
