<?php

namespace App\Repository;

use App\Entity\Customer\CustomerInterface;

interface CustomerRepositoryInterface
{
    /**
     * @param string $identifier
     * @return CustomerInterface|null
     */
    public function find(string $identifier): ?CustomerInterface;

    /**
     * @param CustomerInterface $customer
     * @return CustomerInterface
     */
    public function save(CustomerInterface $customer): CustomerInterface;

    /**
     * @param CustomerInterface $customer
     */
    public function remove(CustomerInterface $customer);
}