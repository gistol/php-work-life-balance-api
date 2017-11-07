<?php
namespace AppBundle\Helpers;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class JSONSerializer
{
    // FIXME: Class property
    public function serializer()
    {
      $encoders = array(new JsonEncoder());
      $normalizers = array(new ObjectNormalizer());
      return $serializer = new Serializer($normalizers, $encoders);
    }

    public function serialize($object)
    {
      return $this->serializer()->serialize($object, 'json');
    }

    public function deserialize($string, $entity)
    {
      return $this->serializer()->deserialize($string, $entity, 'json');
    }
}
