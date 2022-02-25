<?php

namespace Source\domain\Repositories;

use Source\domain\Entities\User;
use Source\domain\ValueObjects\Identity;

interface GetUserRepositoryInterface
{
    public function getUserById(Identity $id): User;
}