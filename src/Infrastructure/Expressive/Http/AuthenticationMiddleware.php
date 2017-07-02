<?php

namespace IdentityAccess\Infrastructure\Expressive\Http;

use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Authentication\Adapter\AdapterInterface;

class AuthenticationMiddleware implements MiddlewareInterface
{
    const USER_IDENTITY_ATTRIBUTE =  'user_identity';
    private $authenticationService;
    private $response;

    /**
     *
     */
    public function __construct(AuthenticationServiceInterface $authenticationService, ResponseInterface $response)
    {
      $this->authenticationService = $authenticationService;
      $this->response = $response;
    }

    /**
     *
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
      if ($this->authenticationService->hasIdentity()) {
        $user = $this->authenticationService->getIdentity();
        return $delegate->process($request->withAttribute(self::USER_IDENTITY_ATTRIBUTE,$user));
      }
      return $this->response->withStatus(401);
    }
}
