<?php

namespace AppBundle\EventListener;

use AppBundle\Api\ApiProblemException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiExceptionSubscriber implements EventSubscriberInterface
{
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        // echo('***************** EXCEPTION');
        $e = $event->getException();
        // if (!$e instanceof ApiProblemException) {
        //     return;
        // }
        // $apiProblem = $e->getApiProblem();
        
        $data = [
          // NOTE: Ask PHP guru
          'code' => $e->getCode(),
          'message' => $e->getMessage()
        ];
        
        $response = new JsonResponse($data);
        // $response = new JsonResponse($e);
        // $response->headers->set('Content-Type', 'application/problem+json');
        
        $event->setResponse($response);
    }
    
    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::EXCEPTION => 'onKernelException'
        );
    }
}