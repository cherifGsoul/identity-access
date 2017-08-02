<?php

namespace IdentityAccess\Infrastructure\Expressive\Service\Authentication\Adapter;

use IdentityAccess\Domain\Model\Identity\UserRepository;
use Zend\Crypt\Password\PasswordInterface as EncryptionService;
use Zend\Authentication\Result;
use IdentityAccess\Domain\Model\Identity\UserToken;

class MemoryAdapter implements AdapterInterface
{
  private $username;
  private $password;
  private $userRepository;
  private $encryptionService;

  public function __construct(UserRepository $userRepository, EncryptionService $encryptionService)
  {
    $this->userRepository = $userRepository;
    $this->encryptionService = $encryptionService;
  }

  public function withUsername($username)
  {
    $this->username = $username;
  }

  public function withPassword($password)
  {
    $this->password = $password;
  }

  public function authenticate()
  {
    $userToken = UserToken::nullTokenInstance();
    $user = $this->userRepository->ofUsername($this->username);

    if (null !== $user) {
      if ($this->encryptionService->verify($this->password, $user->password())) {
        $userToken = $user->toUserToken();
        return new Result(
                   Result::SUCCESS,
                   $userToken,
                   ['Authenticated successfully.']
                 );
      }
    }

    return new Result(
                Result::FAILURE_CREDENTIAL_INVALID,
                $userToken,
                ['Invalid credentials.']
              );
  }

}
