<?php

namespace spec\IdentityAccess\Application;

use IdentityAccess\Application\AuthenticationHandler;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use IdentityAccess\Domain\Model\Identity\AuthenticationService;
use IdentityAccess\Application\Command\AuthenticateUserCommand;
use IdentityAccess\Domain\Model\Identity\UserToken;

class AuthenticationHandlerSpec extends ObjectBehavior
{
  function let(AuthenticationService $authenticationService)
  {
    $this->beConstructedWith($authenticationService);
  }

  function it_authenticate_user(AuthenticationService $authenticationService, AuthenticateUserCommand $command, UserToken $userToken)
  {
    $this->beConstructedWith($authenticationService);
    $authenticationService->authenticate(
        Argument::cetera(),
        Argument::cetera()
    )->willReturn($userToken);
    $this->__invoke($command)->shouldReturnAnInstanceOf(UserToken::class);
  }
}
