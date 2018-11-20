<?php

namespace App\Service\User;

use App\Entity\User\UserInterface;

use App\Repository\UserRepositoryInterface;
use App\Validator\UserValidator;

/**
 * Class UserService
 * @package App\Service\User
 */
class UserService
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;
    /**
     * @var UserValidator
     */
    private $userValidator;

    /**
     * UserService constructor.
     *
     * @param UserRepositoryInterface $userRepository
     * @param UserValidator $userValidator
     */
    public function __construct(UserRepositoryInterface $userRepository, UserValidator $userValidator)
    {
        $this->userRepository = $userRepository;
        $this->userValidator = $userValidator;
    }

    public function post(UserInterface $user): UserInterface
    {
        $this->userValidator->validate($user, ['write', 'user-write']);

        $user->setRoles(['ROLE_USER']);

        $this->userRepository->save($user);

        return $user;
    }
}