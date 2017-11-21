<?php
namespace AppBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Fidry\PsyshBundle\psysh;

use AppBundle\Helpers\JSONSerializer;
use AppBundle\Entity\Timestamp;

// https://symfony.com/doc/current/doctrine.html

// NOTE: Add basic authentication: http://symfony.com/doc/current/event_dispatcher/before_after_filters.html
class TimestampController extends Controller
{

  /**
   * @Route("/api/timestamps/")
   * @Method("GET")
   */
  public function index(Request $request, JSONSerializer $serializer) {
    
    $weekQuery = $request->query->get('week');
    
    if($weekQuery) {
      // echo('Filter by week');
      $timestamps = $this->getDoctrine()->getRepository('AppBundle:Timestamp')->findBy(['week' => $weekQuery]);
    } else {
      // echo('Get all');
      $timestamps = $this->getDoctrine()->getRepository('AppBundle:Timestamp')->findAll();
    }
    
    return new Response($serializer->serialize($timestamps));

    // eval(\Psy\sh());

    // NOTE: Returns Array with json strings
    // $quotes = $this->getDoctrine()->getRepository('AppBundle:TimeStamp')->findAll();
    // $anArray = array();
    // 
    // // The Loop
    // // foreach ($quotes as $quote){
    // //   $anArray[] = $serializer->serialize($quote);
    // // }
    // 
    // $data = $serializer->serialize($quotes, 'json');
    // // $serializer->serialize($quotes)
    // return new JsonResponse($data);
    
    // NOTE: Returns json strinbg which have to be parsed on client side
    // $timestamps = $this->getDoctrine()->getRepository('AppBundle:TimeStamp')->findAll();
    // $timestamps = $serializer->serialize($timestamps, 'json');
    // return new JsonResponse($timestamps); 

    // // NOTE: Returns correct JSON reponse
    // // FIXME: Findy a way to serialize objects with findAll()
    // $em = $this->getDoctrine()->getManager();
    // $query = $em->createQuery(
    //   'SELECT c
    //   FROM AppBundle:Timestamp c'
    // );
    // 
    // eval(\Psy\sh());
    // 
    // $timestamps = $query->getArrayResult();
    // return new JsonResponse($timestamps);
  }


    /**
     * @Route("/api/timestamps")
     * @Method("POST")
     */
    public function create(Request $request, JSONSerializer $serializer) {
        $timestamp = $serializer->deserialize($request->getContent(), 'AppBundle\Entity\Timestamp');
        
        // eval(\Psy\sh());
        $date = new \DateTime($timestamp->getDate());
        $timestamp->setDate($date->format('Y-m-d'));
        $timestamp->setUnixtime(strtotime($timestamp->getDate()));
        $em = $this->getDoctrine()->getManager();
        $em->persist($timestamp);

        // echo var_dump($timestamp);
        // eval(\Psy\sh());

        $em->flush();

        $data = [
          'id' => $timestamp->getId()
        ];
        return new JsonResponse($data);
    }

    /**
     * @Route("/api/timestamps/{id}")
     * @Method("PUT")
     */
    public function update($id, Request $request, JSONSerializer $serializer) {
        $em = $this->getDoctrine()->getManager();
        $body = json_decode($request->getContent());
        $timestamp = $em->getRepository('AppBundle:Timestamp')->find($id);
        
        
        // eval(\Psy\sh());


        if (!$timestamp) {
          throw $this->createNotFoundException(
            'No product found for id '.$productId
          );
        }
        
        $timestamp->setStart($body->start);
        $timestamp->setPause($body->pause);
        $timestamp->setFinish($body->finish);
        $em->flush();

        $data = [
          'id' => $timestamp->getId()
        ];
        return new JsonResponse($data);
    }

    /**
     * @Route("/api/timestamps/{id}")
     * @Method("GET")
     * @param $id
     */
    public function show($id, JSONSerializer $serializer) {
      $timestamp = $this->getDoctrine()->getRepository('AppBundle:Timestamp')->findOneBy(['id' => $id]);
      
      if (!$timestamp) {
        throw $this->createNotFoundException('No record found for id '.$id);
      }
      
      // return new JsonResponse($timestamp);
      // return new JsonResponse($serializer->serialize($timestamp));
      // return new Response(json_encode($timestamp));
      
      // NOTE: Ask PHP guru -> https://github.com/symfony/symfony/issues/7046
      $response = new Response($serializer->serialize($timestamp));
      $response->headers->set('Content-Type', 'application/json');

      return $response;
    }
}
