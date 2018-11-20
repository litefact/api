<?php

namespace App\Entity\Resource;

use Api\Entity\BlameableTrait;
use Api\Entity\EntityTrait;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class AbstractAddress
 * @package App\Entity\Resource
 *
 * @ORM\MappedSuperclass()
 */
abstract class AbstractAddress implements AddressInterface
{
    use EntityTrait;
    use BlameableTrait;

    /**
     * @var string
     *
     * @ORM\Column(length=250)
     *
     * @Assert\NotBlank()
     */
    protected $name;

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
     * @var string
     *
     * @ORM\Column(length=250)
     *
     * @Assert\NotBlank()
     */
    protected $address1;

    /**
     * @var string
     *
     * @ORM\Column(length=250)
     */
    protected $address2;

    /**
     * @var string
     *
     * @ORM\Column(length=10)
     *
     * @Assert\NotBlank()
     */
    protected $zipCode;

    /**
     * @var string
     *
     * @ORM\Column(length=50)
     *
     * @Assert\NotBlank()
     */
    protected $city;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return AddressInterface
     */
    public function setName(string $name): AddressInterface
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
     * @return AddressInterface
     */
    public function setIsActive(bool $isActive): AddressInterface
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
     * @return AddressInterface
     */
    public function setIsDefault(bool $isDefault): AddressInterface
    {
        $this->isDefault = $isDefault;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress1(): string
    {
        return $this->address1;
    }

    /**
     * @param string $address1
     * @return AddressInterface
     */
    public function setAddress1(string $address1): AddressInterface
    {
        $this->address1 = $address1;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress2(): string
    {
        return $this->address2;
    }

    /**
     * @param string $address2
     * @return AddressInterface
     */
    public function setAddress2(string $address2): AddressInterface
    {
        $this->address2 = $address2;
        return $this;
    }

    /**
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     * @return AddressInterface
     */
    public function setZipCode(string $zipCode): AddressInterface
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return AddressInterface
     */
    public function setCity(string $city): AddressInterface
    {
        $this->city = $city;
        return $this;
    }
}