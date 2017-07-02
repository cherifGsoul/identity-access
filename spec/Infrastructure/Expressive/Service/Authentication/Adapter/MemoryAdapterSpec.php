<?php

namespace spec\IdentityAccess\Infrastructure\Expressive\Service\Authentication\Adapter;

use IdentityAccess\Infrastructure\Expressive\Service\Authentication\Adapter\MemoryAdapter;
use IdentityAccess\Infrastructure\Expressive\Service\Authentication\Adapter\AdapterInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use IdentityAccess\Domain\Model\Identity\UserRepository;
use IdentityAccess\Domain\Model\Identity\User;
use Zend\Crypt\Password\PasswordInterface as EncryptionService;
use Zend\Authentication\Result;

class MemoryAdapterSpec extends ObjectBehavior
{
    function let(UserRepository $userRepository, EncryptionService $encryptionService)
    {
        $this->beConstructedWith($userRepository,$encryptionService);
    }

    function it_implements_adapter_interface()
    {
      $this->shouldImplement(AdapterInterface::class);
    }

    function it_authenticates_a_user(UserRepository $userRepository, EncryptionService $encryptionService, User $user)
    {
      $this->beConstructedWith($userRepository,$encryptionService);
      $encryptionService->verify(Argument::cetera(),Argument::cetera())->willReturn(true);
      $userRepository->ofUsername(Argument::cetera())->willReturn($user);
      $this->authenticate()->shouldReturnInstanceOf(Result::class);
    }
}
