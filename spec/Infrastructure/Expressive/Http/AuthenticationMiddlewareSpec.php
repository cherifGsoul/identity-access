<?php

namespace spec\IdentityAccess\Infrastructure\Expressive\Http;

use IdentityAccess\Infrastructure\Expressive\Http\AuthenticationMiddleware;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Authentication\Adapter\AdapterInterface;

class AuthenticationMiddlewareSpec extends ObjectBehavior
{
    function let(AuthenticationServiceInterface $authenticationService, ResponseInterface $response)
    {
      $this->beConstructedWith($authenticationService, $response);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(AuthenticationMiddleware::class);
    }

    function it_implements_middleware_interface()
    {
      $this->shouldImplement(MiddlewareInterface::class);
    }

    function it_delegates_request_when_user_is_authenticated(
        ServerRequestInterface $request,
        DelegateInterface $delegate,
        AuthenticationServiceInterface $authenticationService,
        ResponseInterface $response
    )
    {
      $this->beConstructedWith($authenticationService, $response);

      $authenticationService->hasIdentity()->willReturn(true);
      $authenticationService->getIdentity()->willReturn(Argument::any());

      $delegate->process(Argument::type(ServerRequestInterface::class))->willReturn($response);
      $request->withAttribute(Argument::cetera())->willReturn($request);
      $this->process($request,$delegate)->shouldReturn($response);
      $delegate->process(Argument::type(ServerRequestInterface::class))->shouldhaveBeenCalled();
    }

    function it_returns_unauthorized_error_code_when_user_is_not_authenticated(
      ServerRequestInterface $request,
      DelegateInterface $delegate,
      AuthenticationServiceInterface $authenticationService,
      ResponseInterface $response
    )
    {
      $this->beConstructedWith($authenticationService, $response);
      $authenticationService->hasIdentity()->willReturn(false);
      $response->withStatus(Argument::cetera())->willReturn($response);
      $this->process($request,$delegate)->shouldReturnAnInstanceOf(ResponseInterface::class);
      $delegate->process(Argument::type(ServerRequestInterface::class))->shouldNotHaveBeenCalled();
    }
}
