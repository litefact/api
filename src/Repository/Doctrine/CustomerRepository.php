<?php

namespace App\Repository\Doctrine;

use Api\Exception\ApiException;
use App\Entity\Customer\CustomerInterface;
use App\Repository\CustomerRepositoryInterface;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\ORMInvalidArgumentException;

class CustomerRepository implements CustomerRepositoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * CustomerRepository constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param string $identifier
     * @return CustomerInterface|null
     */
    public function find(string $identifier): ?CustomerInterface
    {
        $customer = null;
        try {
            $customer = $this->entityManager->find(CustomerInterface::class, $identifier);
        } catch (ORMInvalidArgumentException | ORMException $e) {
            throw new \LogicException('It is not possible to retrieve this customer');
        } finally {
            if (null === $customer) {
                throw new ApiException(
                    (string) $identifier,
                    CustomerInterface::class
                );
            }
            return $customer;
        }
    }

    /**
     * @param CustomerInterface $customer
     * @return CustomerInterface
     */
    public function save(CustomerInterface $customer): CustomerInterface
    {
        /**
         * @var CustomerInterface $customer
         */
        try {
            $customer = $this->entityManager->merge($customer);
            $this->entityManager->persist($customer);
            $this->entityManager->flush();
        } catch (ORMInvalidArgumentException | ORMException $e) {
            throw new \LogicException('It is not possible to save this customer');
        }
        return $customer;
    }

    public function remove(CustomerInterface $customer)
    {
        try {
            $this->entityManager->remove($customer);
            $this->entityManager->flush();
        } catch (ORMInvalidArgumentException | ORMException $e) {
            throw new \LogicException('It is not possible to remove this customer');
        }
    }
}