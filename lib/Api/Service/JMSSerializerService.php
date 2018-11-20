<?php

namespace Api\Service;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;

class JMSSerializerService
{
    public function __construct(SerializerInterface $serializer)
    {
    }

    /**
     * @return SerializationContext
     */
    public function createSerializationContext(): SerializationContext
    {
        $context = new SerializationContext();
        $context->setSerializeNull(true);
        $context->enableMaxDepthChecks();

        return $context;
    }
}