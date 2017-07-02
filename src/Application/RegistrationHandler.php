<?php

namespace IdentityAccess\Application;

use LogicException;
use IdentityAccess\Domain\Model\Identity\User;
use IdentityAccess\Domain\Model\Identity\Person;
use IdentityAccess\Domain\Model\Identity\FullName;
use IdentityAccess\Domain\Model\Identity\ContactInformation;
use IdentityAccess\Domain\Model\Identity\EmailAddress;
use IdentityAccess\Domain\Model\Identity\UserRepository;
use IdentityAccess\Application\Command\RegisterUserCommand;

class RegistrationHandler
{
    private $users;

    public function __construct(UserRepository $users)
    {
      $this->users = $users;
    }

    public function __invoke(RegisterUserCommand $command)
    {

      $user = User::register(
        $this->users->nextIdentity(),
        $command->getUsername(),
        $command->getPassword(),
        new Person(
          new FullName(
            $command->getFirstname(),
            $command->getLastname()
          ),
          new ContactInformation(
            EmailAddress::fromString($command->getEmailAddress())
          )
        )
      );

      if (null === $user) {
        throw new LogicException('User not registered.');
      }

      $this->users->add($user);
      return $user;
    }
}
