<?php

namespace Api\Service;

class ResponseService
{
    /**
     * @var bool
     */
    private $serializeNull = true;

    /**
     * @var null|array
     */
    private $serializationGroups = null;

    /**
     * @return bool
     */
    public function isSerializeNull(): bool
    {
        return $this->serializeNull;
    }

    /**
     * @param bool $serializeNull
     */
    public function setSerializeNull(bool $serializeNull)
    {
        $this->serializeNull = $serializeNull;
    }

    /**
     * @return null|array
     */
    public function getSerializationGroups(): ?array
    {
        return $this->serializationGroups;
    }

    /**
     * @param null|array $serializationGroups
     */
    public function setSerializationGroups($serializationGroups)
    {
        $this->serializationGroups = $serializationGroups;
    }
}