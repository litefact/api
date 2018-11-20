<?php

namespace App\Entity\Customer;

use Api\Entity\EntityInterface;
use Doctrine\Common\Collections\ArrayCollection;

interface CustomerInterface extends EntityInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     * @return CustomerInterface
     */
    public function setName(string $name): CustomerInterface;

    /**
     * @return TypeInterface
     */
    public function getType(): TypeInterface;

    /**
     * @param TypeInterface $type
     * @return CustomerInterface
     */
    public function setType(TypeInterface $type): CustomerInterface;

    /**
     * @return string
     */
    public function getColor(): string;

    /**
     * @param string $color
     * @return CustomerInterface
     */
    public function setColor(string $color): CustomerInterface;

    /**
     * @return bool
     */
    public function isActive(): bool;

    /**
     * @param bool $isActive
     * @return CustomerInterface
     */
    public function setIsActive(bool $isActive): CustomerInterface;

    /**
     * @return ArrayCollection
     */
    public function getAddresses(): ArrayCollection;

    /**
     * @param ArrayCollection $addresses
     * @return CustomerInterface
     */
    public function setAddresses(ArrayCollection $addresses): CustomerInterface;

    /**
     * @return ArrayCollection
     */
    public function getContacts(): ArrayCollection;

    /**
     * @param ArrayCollection $addresses
     * @return CustomerInterface
     */
    public function setContacts(ArrayCollection $addresses): CustomerInterface;
}