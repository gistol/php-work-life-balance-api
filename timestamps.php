<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// cli-config.php
require_once "bootstrap.php";

require_once __DIR__ . '/src/AppBundle/Repository/TimestampRepository.php';


$text = $argv[1];
$source = $argv[2];


// $result = $entityManager->getRepository('AppBundle\Entity\Timestamp')->findAll();
// var_dump($result);
// 
// foreach ($result as $timestamp){
//   var_dump($timestamp);
// }
// 
// 
// $results =  $entityManager->getRepository('AppBundle\Entity\Timestamp')->createQueryBuilder('p')
//   ->where('p.unixtime > :unixtime')
//   ->setParameter('unixtime', '1510182000')
//   ->orderBy('p.date', 'ASC')
//   ->getQuery()
//   ->getResult();
// 
// var_dump($results);
// 
// 
// $results =  $entityManager->getRepository('AppBundle\Entity\Timestamp')->createQueryBuilder('t')
//   ->where('t.id = :id')
//   ->setParameter('id', 1)
//   ->getQuery()
//   ->getResult();
//             
// var_dump($results);

// $results =  $entityManager->getRepository('AppBundle\Entity\Timestamp')->createQueryBuilder('t')
//   ->where('t.id = :id')
//   ->setParameter('id', 1)
//   ->getQuery()
//   ->getResult();
//             
// var_dump($results);

$results =  $entityManager->getRepository('AppBundle\Entity\Timestamp')->createQueryBuilder('t')
  ->where('t.week = :week')
  ->setParameter('week', 46)
  ->getQuery()
  ->getResult();

var_dump($results);

// $quote = new AppBundle\Entity\Quote();
// $quote->setQuote($text);
// $quote->setSource($source);
// $entityManager->persist($quote);
// $entityManager->flush();
