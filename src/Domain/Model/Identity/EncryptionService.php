<?php

namespace IdentityAccess\Domain\Model\Identity;

/**
 *
 */
interface EncryptionService
{
  /**
   *
   */
  public function hash($password);

  /**
   *
   */
  public function validate($plainPassword, $passwordHash);
}
