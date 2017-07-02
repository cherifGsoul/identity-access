<?php

namespace IdentityAccess\Application;
use IdentityAccess\Domain\Model\Identity\AuthenticationService;
use IdentityAccess\Application\AuthenticateUserCommand;

class AuthenticationHandler
{
    private $authenticationService;

    public function __construct(AuthenticationService $authenticationService)
    {
      $this->authenticationService = $authenticationService;
    }

    public function __invoke($command)
    {
      $userToken = $this->authenticationService->authenticate(
        $command->getUsername(),
        $command->getPassword()
      );
      return $userToken;
    }
}
