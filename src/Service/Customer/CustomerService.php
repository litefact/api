<?php

namespace App\Service\Customer;

use App\Entity\Customer\CustomerInterface;
use App\Repository\CustomerRepositoryInterface;
use App\Validator\CustomerValidator;

class CustomerService
{
    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;
    /**
     * @var CustomerValidator
     */
    private $customerValidator;

    /**
     * CustomerService constructor.
     * @param CustomerRepositoryInterface $customerRepository
     * @param CustomerValidator $customerValidator
     */
    public function __construct(CustomerRepositoryInterface $customerRepository, CustomerValidator $customerValidator)
    {
        $this->customerRepository = $customerRepository;
        $this->customerValidator = $customerValidator;
    }

    /**
     * @param CustomerInterface $customer
     * @return CustomerInterface
     */
    public function post(CustomerInterface $customer): CustomerInterface
    {
        $this->customerValidator->validate($customer);

        $customer = $this->customerRepository->save($customer);

        return $customer;
    }

    /**
     * @param CustomerInterface $customer
     */
    public function delete(CustomerInterface $customer)
    {
        $this->customerRepository->remove($customer);
    }
}