<?php

namespace App\Entity\Billing;

use Api\Entity\EntityInterface;

/**
 * Interface BillingDetailsInterface
 * @package App\Entity\Billing
 */
interface BillingDetailsInterface extends EntityInterface
{
    /**
     * @return string
     */
    public function getName(): string ;

    /**
     * @param string $name
     * @return BillingDetailsInterface
     */
    public function setName(string $name): BillingDetailsInterface;

    /**
     * @return float
     */
    public function getQuantity(): float;

    /**
     * @param float $quantity
     * @return BillingDetailsInterface
     */
    public function setQuantity(float $quantity): BillingDetailsInterface;

    /**
     * @return float
     */
    public function getVatRate(): float;

    /**
     * @param float $vatRate
     * @return BillingDetailsInterface
     */
    public function setVatRate(float $vatRate): BillingDetailsInterface;

    /**
     * @return float
     */
    public function getAmount(): float;

    /**
     * @param float $amount
     * @return BillingDetailsInterface
     */
    public function setAmount(float $amount): BillingDetailsInterface;

    /**
     * @return float
     */
    public function getDiscount1(): float;

    /**
     * @param float $discount1
     * @return BillingDetailsInterface
     */
    public function setDiscount1(float $discount1): BillingDetailsInterface;

    /**
     * @return float
     */
    public function getDiscount2(): float;

    /**
     * @param float $discount2
     * @return BillingDetailsInterface
     */
    public function setDiscount2(float $discount2): BillingDetailsInterface;

    /**
     * @return int
     */
    public function getPosition(): int;

    /**
     * @param int $position
     * @return BillingDetailsInterface
     */
    public function setPosition(int $position): BillingDetailsInterface;

    /**
     * @return float
     */
    public function getExclTaxAmount(): float;

    /**
     * @return float
     */
    public function getExclTaxWithDiscountAmount(): float;

    /**
     * @return float
     */
    public function getInclTaxAmount(): float;
}