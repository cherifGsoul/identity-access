<?php

namespace IdentityAccess\Domain\Model\Identity;

interface UserRepository
{

    public function ofUsername();

    public function add(User $user);
    
    public function nextIdentity();
}
