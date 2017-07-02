<?php

namespace IdentityAccess\Domain\Model\Identity;

use Webmozart\Assert\Assert;

class UserToken
{
    private $username;
    private $emailAddress;

    public static function nullTokenInstance()
    {
        $userToken = new UserToken(null,null);

        return $userToken;
    }

    public function __construct($username,$emailAddress)
    {
      $this->setUsername($username);
      $this->setEmailAddress($emailAddress);
    }


    public function username()
    {
        return $this->username;
    }

    public function emailAddress()
    {
        return $this->emailAddress;
    }

    private function setUsername($username)
    {
      Assert::nullOrString($username);
      $this->username = $username;
    }

    private function setEmailAddress($emailAddress)
    {
      Assert::nullOrString($emailAddress);
      $this->emailAddress = $emailAddress;
    }
}
