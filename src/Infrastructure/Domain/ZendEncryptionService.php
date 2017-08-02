<?php

namespace IdentityAccess\Infrastructure\Domain\ZendEncryptionService;

use IdentityAccess\Domain\Model\Identity\EncryptionService;
use Zend\Crypt\Password\PasswordInterface;

/**
 *
 */
class ZendEncryptionService implements EncryptionService
{
  /**
   *
   */
  private $passwordCrypter;

  /**
   *
   */
  public function __construct(PasswordInterface $passwordCrypter)
  {
    $this->passwordCrypter = $passwordCrypter;
  }

  /**
   *
   */
  public function hash($passowrd)
  {
    return $this->passwordCrypter->create($password);
  }

  /**
   *
   */
  public function validate($plainPassword, $passwordHash)
  {
    return $this->passwordCrypter->verify($plainPassword,$passwordhash);
  }
}
