<?php

namespace App\Entity\Billing;

use App\Entity\Customer\AddressInterface;
use App\Entity\Customer\CustomerInterface;
use Api\Entity\EntityInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Interface BillingInterface
 * @package App\Entity\Billing
 */
interface BillingInterface extends EntityInterface
{
    /**
     * @return string
     */
    public function getNumber(): string;

    /**
     * @param string $number
     * @return BillingInterface
     */
    public function setNumber(string $number): BillingInterface;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     * @return BillingInterface
     */
    public function setName(string $name): BillingInterface;

    /**
     * @return CustomerInterface
     */
    public function getCustomer(): CustomerInterface;

    /**
     * @param CustomerInterface $customer
     * @return BillingInterface
     */
    public function setCustomer(CustomerInterface $customer): BillingInterface;

    /**
     * @return AddressInterface
     */
    public function getBillingAddress(): AddressInterface;

    /**
     * @param AddressInterface $address
     * @return BillingInterface
     */
    public function setBillingAddress(AddressInterface $address): BillingInterface;

    /**
     * @return AddressInterface
     */
    public function getDeliveryAddress(): AddressInterface;

    /**
     * @param AddressInterface $address
     * @return BillingInterface
     */
    public function setDeliveryAddress(AddressInterface $address): BillingInterface;

    /**
     * @return string
     */
    public function getReference(): string;

    /**
     * @param string $reference
     * @return BillingInterface
     */
    public function setReference(string $reference): BillingInterface;

    /**
     * @return string
     */
    public function getComment(): string;

    /**
     * @param string $comment
     * @return BillingInterface
     */
    public function setComment(string $comment): BillingInterface;

    /**
     * @return ArrayCollection
     */
    public function getDetails(): ArrayCollection;

    /**
     * @param ArrayCollection $details
     * @return BillingInterface
     */
    public function setDetails(ArrayCollection $details): BillingInterface;

    /**
     * @param BillingDetailsInterface $detail
     * @return BillingInterface
     */
    public function addDetail(BillingDetailsInterface $detail): BillingInterface;

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