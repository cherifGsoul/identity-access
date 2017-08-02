<?php

namespace IdentityAccess\Domain\Model\Identity;

class User
{
    private $userId;
    private $username;
    private $password;
    private $person;

    public static function register(UserId $userId, $username, $password, Person $person)
    {
      $user = new User($userId, $username, $password,$person);
      return $user;
    }

    public function __construct(UserId $userId, $username, $password, Person $person)
    {
      $this->userId = $userId;
      $this->username = $username;
      $this->password = $password;
      $this->person = $person;
    }

    public function userId()
    {
      return $this->userId;
    }

    public function username()
    {
      return $this->username;
    }

    public function password()
    {
      return $this->password;
    }

    public function person()
    {
      return $this->person;
    }

    public function toUserToken()
    {
      return new UserToken(
        $this->userId(),
        $this->username(),
        $this->person()->emailAddress()->toString()
      );
    }
}
