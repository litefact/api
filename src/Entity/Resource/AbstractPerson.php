<?php

namespace App\Entity\Resource;

use Api\Entity\BlameableTrait;
use Api\Entity\EntityTrait;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class AbstractContact
 * @package App\Entity\Resource
 *
 * @ORM\MappedSuperclass()
 */
abstract class AbstractPerson implements PersonInterface
{
    use EntityTrait;
    use BlameableTrait;

    /**
     * @var string
     *
     * @ORM\Column(length=50)
     *
     * @JMS\Groups({"user-read", "user-write"})
     *
     * @Assert\NotBlank()
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(length=50)
     *
     * @Assert\NotBlank()
     *
     * @JMS\Groups({"user-read", "user-write"})
     */
    private $lastName;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", options={"default" : 1})
     *
     * @JMS\Groups({"read", "user-read"})
     */
    private $isActive = true;

    /**
     * @var string
     *
     * @ORM\Column(length=20, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(length=20, nullable=true)
     */
    private $mobile;

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return PersonInterface
     */
    public function setFirstName(string $firstName): PersonInterface
    {
        $this->firstName = trim($firstName);
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return PersonInterface
     */
    public function setLastName(string $lastName): PersonInterface
    {
        $this->lastName = trim($lastName);
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
     * @return AbstractPerson
     */
    public function setIsActive(bool $isActive): PersonInterface
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return PersonInterface
     */
    public function setPhone(string $phone): PersonInterface
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }

    /**
     * @param string $mobile
     * @return PersonInterface
     */
    public function setMobile(string $mobile): PersonInterface
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}