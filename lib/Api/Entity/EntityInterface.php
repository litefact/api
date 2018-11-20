<?php

namespace Api\Entity;

interface EntityInterface
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
}