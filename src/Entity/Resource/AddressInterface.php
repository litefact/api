<?php

namespace App\Entity\Resource;

use Api\Entity\EntityInterface;

interface AddressInterface extends EntityInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return \DateTime
     */
    public function getCreationDate(): \DateTime;

    /**
     * @return \DateTime
     */
    public function getUpdateDate(): \DateTime;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     * @return AddressInterface
     */
    public function setName(string $name): self;

    /**
     * @return string
     */
    public function getAddress1(): string;

    /**
     * @param string $address1
     * @return AddressInterface
     */
    public function setAddress1(string $address1): self;

    /**
     * @return string
     */
    public function getAddress2(): string;

    /**
     * @param string $address2
     * @return AddressInterface
     */
    public function setAddress2(string $address2): self;

    /**
     * @return string
     */
    public function getZipCode(): string;

    /**
     * @param string $zipCode
     * @return AddressInterface
     */
    public function setZipCode(string $zipCode): self;

    /**
     * @return string
     */
    public function getCity(): string;

    /**
     * @param string $city
     * @return AddressInterface
     */
    public function setCity(string $city): self;
}