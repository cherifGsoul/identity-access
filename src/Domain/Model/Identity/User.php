<?php

namespace IdentityAccess\Domain\Model\Identity;

class User
{
  private $password;

  public function password()
  {
    return $this->$password;
  }
}
