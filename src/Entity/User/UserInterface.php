<?php

namespace App\Entity\User;

use Api\Entity\EntityInterface;
use Symfony\Component\Security\Core\User\UserInterface as BaseUserInterface;

interface UserInterface extends BaseUserInterface, EntityInterface
{
    /**
     * @return string
     */
    public function getEmail(): string;

    /**
     * @param string $email
     * @return UserInterface
     */
    public function setEmail(string $email): self;

    /**
     * @param array $roles
     * @return UserInterface
     */
    public function setRoles(array $roles): self;

    /**
     * @return string
     */
    public function getPlainPassword(): string;

    /**
     * @param string $plainPassword
     * @return UserInterface
     */
    public function setPlainPassword(string $plainPassword): self;

    /**
     * @param string $password
     * @return UserInterface
     */
    public function setPassword(string $password): self;
}