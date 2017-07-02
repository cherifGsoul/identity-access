<?php

namespace spec\IdentityAccess\Domain\Model\Identity;

use IdentityAccess\Domain\Model\Identity\User;
use IdentityAccess\Domain\Model\Identity\UserId;
use IdentityAccess\Domain\Model\Identity\Person;
use IdentityAccess\Domain\Model\Identity\ContactInformation;
use IdentityAccess\Domain\Model\Identity\FullName;
use IdentityAccess\Domain\Model\Identity\EmailAddress;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends ObjectBehavior
{
    function it_registers_new_user()
    {
      $userId = UserId::generate();
      $fullname = new FullName(Argument::type('string'),Argument::type('string'));
      $emailAddress = EmailAddress::fromString('cherif@site.com');
      $contactInformation = new ContactInformation($emailAddress);
      $person = new Person($fullname,$contactInformation);
      $this->beConstructedThrough('register',[$userId, 'ausername', 'apassword', $person]);
      $this->userId()->shouldReturn($userId);
      $this->person()->shouldReturn($person);
      $this->username()->shouldReturn('ausername');
    }
}
