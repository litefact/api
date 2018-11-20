<?php

namespace App\Repository;

use App\Entity\User\UserInterface;

interface UserRepositoryInterface
{
    /**
     * @param string $identifier
     * @return UserInterface|null
     */
    public function find(string $identifier): ?UserInterface;

    /**
     * @param UserInterface $user
     * @return UserInterface
     */
    public function save(UserInterface $user): UserInterface;
}