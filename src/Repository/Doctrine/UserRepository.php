<?php

namespace App\Repository\Doctrine;

use Api\Exception\ApiException;
use App\Entity\User\UserInterface;
use App\Repository\UserRepositoryInterface;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\ORMInvalidArgumentException;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * UserRepository constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param string $identifier
     * @return UserInterface|null
     */
    public function find(string $identifier): ?UserInterface
    {
        $user = null;
        try {
            $user = $this->entityManager->find(UserInterface::class, $identifier);
        } catch (ORMInvalidArgumentException | ORMException $e) {
            throw new \LogicException('It is not possible to retrieve this user');
        } finally {
            if (null === $user) {
                throw new ApiException(
                    (string) $identifier,
                    UserInterface::class
                );
            }
            return $user;
        }
    }

    /**
     * @param UserInterface $user
     * @return UserInterface
     */
    public function save(UserInterface $user): UserInterface
    {
        /**
         * @var UserInterface $user
         */
        try {
            $user = $this->entityManager->merge($user);
            $this->entityManager->persist($user);
            $this->entityManager->flush();
        } catch (ORMInvalidArgumentException | ORMException $e) {
            throw new \LogicException('It is not possible to save this user');
        }
        return $user;
    }
}