<?php

namespace App\Entity\Customer;

interface AddressInterface
{
    /**
     * @return Customer
     */
    public function getCustomer(): Customer;

    /**
     * @param Customer $customer
     * @return AddressInterface
     */
    public function setCustomer(Customer $customer): AddressInterface;
}