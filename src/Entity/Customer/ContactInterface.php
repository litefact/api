<?php

namespace App\Entity\Customer;

interface ContactInterface
{
    /**
     * @return string
     */
    public function getEmail(): string;

    /**
     * @param string $email
     * @return ContactInterface
     */
    public function setEmail(string $email): self;

    /**
     * @return Customer
     */
    public function getCustomer(): Customer;

    /**
     * @param Customer $customer
     * @return ContactInterface
     */
    public function setCustomer(Customer $customer): self;
}