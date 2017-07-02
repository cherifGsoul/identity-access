<?php

namespace IdentityAccess\Domain\Model\Identity;

/**
 *
 */
class EmailAddress
{
  private $emailAddress;

  private function __construct($emailAddress)
  {
    $this->emailAddress = $emailAddress;
  }

  public static function fromString($emailAddress)
  {
    return new self($emailAddress);
  }

  public function toString()
  {
    return $this->emailAddress;
  }
}
