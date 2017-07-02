<?php

namespace IdentityAccess\Application\Command;

/**
 *
 */
class RegisterUserCommand
{
  private $username;
  private $password;
  private $emailAddress;
  private $firstname;
  private $lastname;

  public function __construct($username, $password, $emailAddress, $firstname, $lastname)
  {
    $this->username = $username;
    $this->password = $password;
    $this->emailAddress = $emailAddress;
    $this->firstname = $firstname;
    $this->lastname = $lastname;
  }

    /**
     * Get the value of Username
     *
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get the value of Password
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the value of Email Address
     *
     * @return mixed
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Get the value of Firstname
     *
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Get the value of Lastname
     *
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

}
