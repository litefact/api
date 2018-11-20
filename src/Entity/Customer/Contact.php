<?php

namespace App\Entity\Customer;

use App\Entity\Resource\AbstractPerson;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Contact
 * @package App\Entity\Customer
 *
 * @ORM\Entity()
 * @ORM\Table(name="customer_contacts")
 */
class Contact extends AbstractPerson implements ContactInterface
{
    /**
     * @var string
     *
     * @ORM\Column(length=250)
     *
     * @Assert\NotBlank()
     * @Assert\Email()
     *
     * @JMS\Groups({"customer-contact-read", "customer-contact-write"})
     */
    private $email;

    /**
     * @var Customer
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Customer\Customer", inversedBy="contacts")
     *
     * @Assert\NotNull()
     */
    private $customer;

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return ContactInterface
     */
    public function setEmail(string $email): ContactInterface
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     * @return ContactInterface
     */
    public function setCustomer(Customer $customer): ContactInterface
    {
        $this->customer = $customer;
        return $this;
    }
}