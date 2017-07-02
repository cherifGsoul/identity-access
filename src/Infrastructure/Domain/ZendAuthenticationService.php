<?php

namespace IdentityAccess\Infrastructure\Domain;

use IdentityAccess\Domain\Model\Identity\AuthenticationService;
use Zend\Authentication\AuthenticationServiceInterface;
use IdentityAccess\Infrastructure\Expressive\Service\Authentication\Adapter\AdapterInterface;

class ZendAuthenticationService implements AuthenticationService
{
    private $authenticationService;
    private $adapter;

    public function __construct(AuthenticationServiceInterface $authenticationService, AdapterInterface $adapter)
    {
      $this->authenticationService = $authenticationService;
      $this->adapter = $adapter;
    }

    public function authenticate($username, $password)
    {
      $this->adapter->withUsername($username);
      $this->adapter->withPassword($password);
      $result = $this->authenticationService->authenticate($this->adapter);
      return $result->getIdentity();
    }
}
