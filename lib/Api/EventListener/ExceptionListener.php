<?php

namespace Api\EventListener;

use Api\Exception\ApiException;
use Api\Exception\ValidatorException;
use Doctrine\DBAL\Exception\ConnectionException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class ExceptionListener
 * @package Api\EventListener
 */
class ExceptionListener
{
    public function onException(GetResponseForExceptionEvent $event)
    {
        $exception =  $event->getException();
        $statusCode = 500;
        $message = $this->toArray(500, $exception->getMessage());

        switch (true) {
            case $exception instanceof ValidatorException:
                $statusCode = 400;
                $message = $exception->toArray();
                break;
            case $exception instanceof NotFoundHttpException:
                $statusCode = 404;
                $message = $this->toArray($exception->getStatusCode(), $exception->getMessage());
                break;
            case $exception instanceof ApiException:
                $statusCode = $exception->getStatusCode();
                $message = $exception->toArray();
                break;
        }

        $content = json_encode($message);
        $response = new Response($content, $statusCode);
        $response->headers->set('Content-Type', 'application/json');
        $event->setResponse($response);
    }

    private function toArray($code, $message)
    {
        return [
            'code' => $code,
            'message' => $message
        ];
    }
}