<?php

namespace spec\IdentityAccess\Domain\Model\Identity;

use IdentityAccess\Domain\Model\Identity\Person;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use IdentityAccess\Domain\Model\Identity\FullName;
use IdentityAccess\Domain\Model\Identity\ContactInformation;
use IdentityAccess\Domain\Model\Identity\EmailAddress;

class PersonSpec extends ObjectBehavior
{
    function let()
    {
      $fullName = new FullName('afirstname', 'alastname');
      $contactInformation = new ContactInformation(EmailAddress::fromString('cherif@site.com'));
      $this->beConstructedWith($fullName, $contactInformation);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(Person::class);
    }
}
