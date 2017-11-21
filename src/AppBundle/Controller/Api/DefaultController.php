<?php

namespace AppBundle\Controller\Api;

use AppBundle\Controller\DefaultController as BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends BaseController
{
    public function index(Request $request)
    {
      $routes = [
        'available' => 'fooo'
      ];
      
      return new Response(json_encode($routes));
    }
}
