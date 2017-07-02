<?php

namespace IdentityAccess\Domain\Model\Identity;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 *
 */
class UserId
{

    /**
     * @var string
     */
    private $id;
    /**
     * @param string $id
     */
    public function __construct($id = null)
    {
        $this->id = null === $id ? Uuid::uuid4()->toString() : $id;
    }

    public static function generate()
    {
      return new self();
    }
    
    /**
     * @return string
     */
    public function id()
    {
        return $this->id;
    }
    /**
     * @param UserId $userId
     *
     * @return bool
     */
    public function equals(UserId $userId)
    {
        return $this->id() === $userId->id();
    }
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->id();
    }
}
