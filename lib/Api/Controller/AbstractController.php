<?php

namespace Api\Controller;

use Api\Service\ResponseService;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as BaseAbstractController;

abstract class AbstractController extends BaseAbstractController
{
    /**
     * @return array
     */
    public static function getSubscribedServices()
    {
        $services = parent::getSubscribedServices();
        $services[ResponseService::class] = ResponseService::class;

        return $services;
    }

    public function setResponseSerializationGroups(array $groups = [])
    {
        $this->container->get(ResponseService::class)->setSerializationGroups($groups);
    }
}