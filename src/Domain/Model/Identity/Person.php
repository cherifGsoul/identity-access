<?php

namespace IdentityAccess\Domain\Model\Identity;

class Person
{
  private $fullName;
  private $contactInformation;

  public function __construct(FullName $fullName,ContactInformation $contactInformation)
  {
    $this->fullName = $fullName;
    $this->contactInformation = $contactInformation;
  }



    /**
     * Get the value of Full Name
     *
     * @return mixed
     */
    public function fullName()
    {
        return $this->fullName;
    }

    /**
     * Get the value of Contact Information
     *
     * @return mixed
     */
    public function contactInformation()
    {
        return $this->contactInformation;
    }

}
