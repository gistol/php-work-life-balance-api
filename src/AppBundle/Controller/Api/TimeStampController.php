<?php
namespace AppBundle\Controller\Api;

use AppBundle\Entity\TimeStamp;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Fidry\PsyshBundle\psysh;
use AppBundle\Helpers\JSONSerializer;

// NOTE: Add basic authentication: http://symfony.com/doc/current/event_dispatcher/before_after_filters.html
class TimeStampController extends Controller
{

  /**
   * @Route("/api/timestamps")
   * @Method("GET")
   */
  public function index(JSONSerializer $serializer) {
    // eval(\Psy\sh());
    $quotes = $this->getDoctrine()->getRepository('AppBundle:TimeStamp')->findAll();
    $anArray = array();

    // The Loop
    foreach ($quotes as $quote){
      $anArray[] = $serializer->serialize($quote);
    }

    return new Response(json_encode($anArray));
  }


    /**
     * @Route("/api/timestamps")
     * @Method("POST")
     */
    public function create(Request $request, JSONSerializer $serializer) {
        $timestamp = $serializer->deserialize($request->getContent(), 'AppBundle\Entity\TimeStamp');

        $now = new \DateTime();
        // $timestamp->setDate($now->format('Y-m-d H:i:s'));
        $timestamp->setDate(new \DateTime($timestamp->getDate()));
        // $timestamp->setDate(strtotime($timestamp->getDate()));

        $em = $this->getDoctrine()->getManager();
        $em->persist($timestamp);

        echo var_dump($timestamp);
        // eval(\Psy\sh());

        $em->flush();

        $data = [
          'id' => $timestamp->getId()
        ];
        return new Response(json_encode($data));
    }


    /**
     * @Route("/api/timestamps/{id}")
     * @Method("GET")
     * @param $id
     */
    public function show($id, JSONSerializer $serializer) {
      $quote = $this->getDoctrine()->getRepository('AppBundle:TimeStamp')->findOneBy(['id' => $id]);
      return new Response($serializer->serialize($quote));
      // return new Response(json_encode($data));
    }
}
