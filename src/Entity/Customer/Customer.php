<?php

namespace App\Entity\Customer;

use Api\Entity\BlameableTrait;
use Api\Entity\EntityTrait;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Customer
 * @package App\Entity\Customer
 *
 * @ORM\Table(name="customers")
 * @ORM\Entity()
 * @UniqueEntity(fields={"name"})
 */
class Customer implements CustomerInterface
{
    use EntityTrait;
    use BlameableTrait;

    /**
     * @var string
     *
     * @ORM\Column(length=250, unique=true)
     *
     * @Assert\NotBlank()
     *
     * @JMS\Groups({"customer-read", "customer-write"})
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", options={"default" : 1})
     *
     * @JMS\Groups({"customer-read", "customer-write"})
     */
    private $isActive = true;

    /**
     * @var TypeInterface
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Customer\Type", inversedBy="customers")
     * @ORM\JoinColumn(name="type")
     *
     * @Assert\NotNull()
     *
     * @JMS\Groups({"customer-read", "customer-write"})
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(length=7, nullable=true)
     *
     * @JMS\Groups({"customer-read", "customer-write"})
     */
    private $color;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Customer\Address", mappedBy="customer")
     */
    private $addresses;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Customer\Contact", mappedBy="customer")
     */
    private $contacts;

    public function __construct()
    {
        $this->addresses = new ArrayCollection();
        $this->contacts = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CustomerInterface
     */
    public function setName(string $name): CustomerInterface
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     * @return CustomerInterface
     */
    public function setIsActive(bool $isActive): CustomerInterface
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * @return TypeInterface
     */
    public function getType(): TypeInterface
    {
        return $this->type;
    }

    /**
     * @param TypeInterface $type
     * @return CustomerInterface
     */
    public function setType(TypeInterface $type): CustomerInterface
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     * @return CustomerInterface
     */
    public function setColor(string $color): CustomerInterface
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getAddresses(): ArrayCollection
    {
        return $this->addresses;
    }

    /**
     * @param ArrayCollection $addresses
     * @return CustomerInterface
     */
    public function setAddresses(ArrayCollection $addresses): CustomerInterface
    {
        $this->addresses = $addresses;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getContacts(): ArrayCollection
    {
        return $this->contacts;
    }

    /**
     * @param ArrayCollection $contacts
     * @return CustomerInterface
     */
    public function setContacts(ArrayCollection $contacts): CustomerInterface
    {
        $this->contacts = $contacts;
        return $this;
    }
}