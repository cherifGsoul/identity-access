<?php

namespace IdentityAccess\Infrastructure\Expressive\Service\Authentication\Adapter;

use Zend\Authentication\Adapter\AdapterInterface as ZendAdapter;

interface AdapterInterface extends ZendAdapter
{
  public function withUsername($username);
  public function withPassword($password);
}
