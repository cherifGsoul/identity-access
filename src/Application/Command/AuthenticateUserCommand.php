<?php

namespace IdentityAccess\Application\Command;

class AuthenticateUserCommand
{
    private $username;
    private $password;

    public function getUsername()
    {
      return $this->username;
    }

    public function getPassword()
    {
      return $this->password;
    }
}
