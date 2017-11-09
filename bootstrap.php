<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

require_once __DIR__ . '/vendor/autoload.php';

$paths            = array(__DIR__ . '/src/AppBundle/Entity');
$isDevMode        = false;
$connectionParams = array(
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/app/sqlite.db',
);

$config = Setup::createConfiguration($isDevMode);
$driver = new AnnotationDriver(new AnnotationReader(), $paths);

// registering noop annotation autoloader - allow all annotations by default
AnnotationRegistry::registerLoader('class_exists');
$config->setMetadataDriverImpl($driver);

$entityManager = EntityManager::create($connectionParams, $config);

// $quote = $entityManager->find('AppBundle\Entity\Quote', 1);
// var_dump($quote);
