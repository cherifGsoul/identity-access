<?php

namespace spec\IdentityAccess\Application;

use IdentityAccess\Application\RegistrationHandler;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use IdentityAccess\Domain\Model\Identity\User;
use IdentityAccess\Domain\Model\Identity\UserId;
use IdentityAccess\Domain\Model\Identity\UserRepository;
use IdentityAccess\Application\Command\RegisterUserCommand;

class RegistrationHandlerSpec extends ObjectBehavior
{
    function let(UserRepository $users)
    {
      $this->beConstructedWith($users);
    }

    function it_uses_user_repository_to_persist_user(UserRepository $users)
    {
      $command = new RegisterUserCommand('cherif_b','azerty','cherif@mail.com','Cherif', 'BOUCHELAGHEM');
      $users->nextIdentity()->willReturn(UserId::generate());
      $users->add(Argument::type(User::class))->shouldBeCalled();
      $this->__invoke($command)->shouldReturnAnInstanceOf(User::class);
    }
}
