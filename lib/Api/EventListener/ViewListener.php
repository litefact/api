<?php

namespace Api\EventListener;

use Api\Service\JMSSerializerService;
use Api\Service\ResponseService;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;

/**
 * Class ViewListener
 * @package Api\EventListener
 */
class ViewListener
{
    /**
     * @var SerializerInterface
     */
    private $serializer;
    /**
     * @var ResponseService
     */
    private $responseService;
    /**
     * @var JMSSerializerService
     */
    private $serializerService;

    /**
     * ViewListener constructor.
     *
     * @param SerializerInterface $serializer
     * @param JMSSerializerService $serializerService
     * @param ResponseService $responseService
     */
    public function __construct(SerializerInterface $serializer, JMSSerializerService $serializerService,ResponseService $responseService)
    {
        $this->serializer = $serializer;
        $this->serializerService = $serializerService;
        $this->responseService = $responseService;
    }

    /**
     * @param GetResponseForControllerResultEvent $event
     *
     * @return GetResponseForControllerResultEvent
     */
    public function onView(GetResponseForControllerResultEvent $event)
    {
        $result = $event->getControllerResult();

        if (!$result instanceof Response) {
            switch ($event->getRequest()->getMethod()) {
                case 'POST':
                    $statusCode = Response::HTTP_CREATED;
                    break;
                case 'DELETE':
                    $statusCode = Response::HTTP_NO_CONTENT;
                    break;
                default:
                    $statusCode = Response::HTTP_OK;
            }

            $context = $this->serializerService->createSerializationContext();
            $groups = $this->responseService->getSerializationGroups();
            if (is_array($groups)) {
                $context->setGroups($groups);
            }

            $response = new Response($this->serializer->serialize($result, 'json', $context), $statusCode);
            $response->headers->set('Content-Type', 'application/json');
            $event->setResponse($response);
        }

        return $event;
    }
}