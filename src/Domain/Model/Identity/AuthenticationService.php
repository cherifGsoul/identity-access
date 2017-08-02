<?php

namespace IdentityAccess\Domain\Model\Identity;

interface AuthenticationService
{
  public function authenticate($username, $password);
}
