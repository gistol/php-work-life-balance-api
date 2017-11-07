<?php
namespace AppBundle\Controller\Api;

use AppBundle\Entity\Quote;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\Serializer\Serializer;
// use Symfony\Component\Serializer\Encoder\JsonEncoder;
// use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Fidry\PsyshBundle\psysh;
use AppBundle\Helpers\JSONSerializer;

// $encoders = array(new JsonEncoder());
// $normalizers = array(new ObjectNormalizer());
// $serializer = new Serializer($normalizers, $encoders);


// NOTE: Add basic authentication: http://symfony.com/doc/current/event_dispatcher/before_after_filters.html
class QuoteController extends Controller
{

  /**
   * @Route("/api/quotes")
   * @Method("GET")
   */
  public function index(JSONSerializer $serializer) {
    // eval(\Psy\sh());
    $quotes = $this->getDoctrine()->getRepository('AppBundle:Quote')->findAll();
    $anArray = array();

    // The Loop
    foreach ($quotes as $quote){
      $anArray[] = $serializer->serialize($quote);
    }

    return new Response(json_encode($anArray));
  }


    /**
     * @Route("/api/quotes")
     * @Method("POST")
     */
    public function create(Request $request, JSONSerializer $serializer) {
        // eval(\Psy\sh());
        $quote = $serializer->deserialize($request->getContent(), 'AppBundle\Entity\Quote');
        $em = $this->getDoctrine()->getManager();
        $em->persist($quote);
        $em->flush();

        $data = [
          'id' => $quote->getId()
        ];
        return new Response(json_encode($data));
    }


    /**
     * @Route("/api/quotes/{id}")
     * @Method("GET")
     * @param $id
     */
    public function show($id, JSONSerializer $serializer) {
      $quote = $this->getDoctrine()->getRepository('AppBundle:Quote')->findOneBy(['id' => $id]);
      return new Response($serializer->serialize($quote));
      // return new Response(json_encode($data));
    }
}
