<?php

namespace App\Entity\Customer;

use Api\Entity\EntityTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Type
 * @package App\Entity\Customer
 *
 * @ORM\Entity()
 * @ORM\Table(name="customer_types")
 */
class Type implements TypeInterface
{
    use EntityTrait;

    /**
     * @var string
     *
     * @ORM\Column(length=250)
     *
     * @JMS\Groups({"customer-read"})
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", options={"default" : 1})
     *
     * @JMS\Groups({"read", "user-read"})
     */
    private $isActive = true;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true, options={"default" : 0})
     */
    private $isDefault = false;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     *
     * @JMS\Groups({"customer-read"})
     */
    private $saleCoefficient;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $isPublic;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Customer\Customer", mappedBy="type")
     */
    private $customers;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return TypeInterface
     */
    public function setName(string $name): TypeInterface
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
     * @return TypeInterface
     */
    public function setIsActive(bool $isActive): TypeInterface
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDefault(): bool
    {
        return $this->isDefault;
    }

    /**
     * @param bool $isDefault
     * @return TypeInterface
     */
    public function setIsDefault(bool $isDefault): TypeInterface
    {
        $this->isDefault = $isDefault;
        return $this;
    }

    /**
     * @return float
     */
    public function getSaleCoefficient(): float
    {
        return $this->saleCoefficient;
    }

    /**
     * @param float $saleCoefficient
     * @return TypeInterface
     */
    public function setSaleCoefficient(float $saleCoefficient): TypeInterface
    {
        $this->saleCoefficient = $saleCoefficient;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPublic(): bool
    {
        return $this->isPublic;
    }

    /**
     * @param bool $isPublic
     * @return TypeInterface
     */
    public function setIsPublic(bool $isPublic): TypeInterface
    {
        $this->isPublic = $isPublic;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getCustomers(): ArrayCollection
    {
        return $this->customers;
    }

    /**
     * @param ArrayCollection $customers
     * @return TypeInterface
     */
    public function setCustomers(ArrayCollection $customers): TypeInterface
    {
        $this->customers = $customers;
        return $this;
    }
}