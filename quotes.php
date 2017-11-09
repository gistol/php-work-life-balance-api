<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// cli-config.php
require_once "bootstrap.php";

require_once __DIR__ . '/src/AppBundle/Repository/QuoteRepository.php';


$text = $argv[1];
$source = $argv[2];


$result = $entityManager->getRepository('AppBundle\Entity\Quote')->findAll();
var_dump($result);

foreach ($result as $quote){
  var_dump($quote);
}

$quote = new AppBundle\Entity\Quote();
$quote->setQuote($text);
$quote->setSource($source);
$entityManager->persist($quote);
$entityManager->flush();
