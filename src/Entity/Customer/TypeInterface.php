<?php

namespace App\Entity\Customer;

use Api\Entity\EntityInterface;
use Doctrine\Common\Collections\ArrayCollection;

interface TypeInterface extends EntityInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     * @return TypeInterface
     */
    public function setName(string $name): TypeInterface;
    /**
     * @return bool
     */
    public function isDefault(): bool;

    /**
     * @param bool $isDefault
     * @return TypeInterface
     */
    public function setIsDefault(bool $isDefault): TypeInterface;

    /**
     * @return bool
     */
    public function isActive(): bool;

    /**
     * @param bool $isActive
     * @return TypeInterface
     */
    public function setIsActive(bool $isActive): TypeInterface;

    /**
     * @return float
     */
    public function getSaleCoefficient(): float;

    /**
     * @param float $saleCoefficient
     * @return TypeInterface
     */
    public function setSaleCoefficient(float $saleCoefficient): TypeInterface;

    /**
     * @return bool
     */
    public function isPublic(): bool;

    /**
     * @param bool $isPublic
     * @return TypeInterface
     */
    public function setIsPublic(bool $isPublic): TypeInterface;

    /**
     * @return ArrayCollection
     */
    public function getCustomers(): ArrayCollection;

    /**
     * @param ArrayCollection $customers
     * @return TypeInterface
     */
    public function setCustomers(ArrayCollection $customers): TypeInterface;
}