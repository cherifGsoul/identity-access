<?php

namespace IdentityAccess\Domain\Model\Identity;

/**
 *
 */
class FullName
{
  private $firstname;
  private $lastname;

  public function __construct($firstname, $lastname)
  {
    $this->firstname = $firstname;
    $this->lastname = $lastname;
  }

  public function firstname()
  {
    return $this->firstname;
  }

  public function lastname()
  {
    return $this->lastname;
  }
}
