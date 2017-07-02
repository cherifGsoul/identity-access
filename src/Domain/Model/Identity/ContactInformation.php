<?php

namespace IdentityAccess\Domain\Model\Identity;

/**
 *
 */
class ContactInformation
{
  private $emailAddress;

  public function __construct(EmailAddress $emailAddress)
  {
    $this->emailAddress = $emailAddress;
  }

  public function emailAddress()
  {
    return $this->emailAddress;
  }
}
