<?php

namespace App\Entity\Resource;

use Api\Entity\EntityInterface;

interface PersonInterface extends EntityInterface
{
    /**
     * @return string
     */
    public function getFirstName(): string;

    /**
     * @param string $firstName
     * @return PersonInterface
     */
    public function setFirstName(string $firstName): self;

    /**
     * @return string
     */
    public function getLastName(): string;

    /**
     * @param string $lastName
     * @return PersonInterface
     */
    public function setLastName(string $lastName): self;

    /**
     * @return string
     */
    public function getPhone(): string;

    /**
     * @param string $phone
     * @return PersonInterface
     */
    public function setPhone(string $phone): self;

    /**
     * @return string
     */
    public function getMobile(): string;

    /**
     * @param string $mobile
     * @return PersonInterface
     */
    public function setMobile(string $mobile): self;
}