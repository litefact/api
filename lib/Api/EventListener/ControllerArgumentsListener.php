<?php

namespace Api\EventListener;

use Doctrine\Common\Annotations\AnnotationException;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\SerializerInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations\Parameter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\FilterControllerArgumentsEvent;

class ControllerArgumentsListener
{
    /**
     * @var AnnotationReader
     */
    private $annotationReader;
    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        try {
            $this->annotationReader = new AnnotationReader();
        } catch (AnnotationException $e) {}
        $this->serializer = $serializer;
    }

    public function onControllerArguments(FilterControllerArgumentsEvent $event)
    {
        $controller = explode('::', $event->getRequest()->get('_controller'));
        if (count($controller) != 2) {
            return;
        }

        $action = $controller[1];
        $controller = $controller[0];

        $resource = $this->getMethodAnnotation($controller, $action, Parameter::class);

        if ($resource instanceof Parameter) {
            foreach ($resource->_unmerged as $model) {
                if ($model instanceof Model && is_string($model->type)) {
                    $this->transformParameters($event->getRequest(), $resource, $model);
                    break;
                }
            }
        }
    }

    private function getMethodAnnotation(string $class, string $method, string $annotationName)
    {
        try {
            $reflectionMethod = new \ReflectionMethod($class, $method);
            return $this->annotationReader->getMethodAnnotation($reflectionMethod, $annotationName);
        } catch (\ReflectionException $e) {}

        return null;
    }

    public function transformParameters(Request $request, Parameter $resource, ?Model $model)
    {
        $entity = $request->getContent();
        if ($model instanceof Model && !is_null($model)) {
            $entity = $this->deserialize($request->getContent(), $model->type);
        }

        $request->request->set($resource->name, $entity);
    }

    private function deserialize(string $encodedData, string $type, $source = null)
    {
        $context = [];
        if (!is_null($source)) {
            $context['object_to_populate'] = clone $source;
        }
        return $this->serializer->deserialize($encodedData, $type, 'json');
    }
}