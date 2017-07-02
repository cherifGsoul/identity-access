<?php

namespace spec\IdentityAccess\Infrastructure\Domain;

use IdentityAccess\Infrastructure\Domain\ZendAuthenticationService;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use IdentityAccess\Domain\Model\Identity\AuthenticationService;
use Zend\Authentication\AuthenticationServiceInterface;
use IdentityAccess\Infrastructure\Expressive\Service\Authentication\Adapter\AdapterInterface;
use IdentityAccess\Domain\Model\Identity\UserToken;
use Zend\Authentication\Result;

class ZendAuthenticationServiceSpec extends ObjectBehavior
{
    public function let(AuthenticationServiceInterface $authenticationService, AdapterInterface $adapter)
    {
      $this->beConstructedWith($authenticationService,$adapter);
    }

    function it_implements_domain_service()
    {
        $this->shouldImplement(AuthenticationService::class);
    }

    function it_authenticates_user_with_zend_authentication_service(AuthenticationServiceInterface $authenticationService, AdapterInterface $adapter, UserToken $userToken, Result $result)
    {
      $this->beConstructedWith($authenticationService,$adapter);
      $adapter->withUsername(Argument::cetera())->shouldBeCalled();
      $adapter->withPassword(Argument::cetera())->shouldBeCalled();
      $authenticationService->authenticate($adapter)->willReturn($result);
      $result->getIdentity()->willReturn($userToken);
      $this->authenticate(Argument::cetera(), Argument::cetera())->shouldReturnAnInstanceOf(UserToken::class);
    }
}
