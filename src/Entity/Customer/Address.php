<?php

namespace App\Entity\Customer;

use App\Entity\Resource\AbstractAddress;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Address
 * @package App\Entity\Customer
 *
 * @ORM\Entity()
 * @ORM\Table(name="customer_addresses")
 */
class Address extends AbstractAddress implements AddressInterface
{
    /**
     * @var Customer
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Customer\Customer", inversedBy="addresses")
     *
     * @Assert\NotNull()
     */
    private $customer;

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     * @return AddressInterface
     */
    public function setCustomer(Customer $customer): AddressInterface
    {
        $this->customer = $customer;
        return $this;
    }
}