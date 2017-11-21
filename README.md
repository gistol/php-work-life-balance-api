# php-work-life-balance-api
Symfony RESTful API for vue-work-life-balance application
============

Tutorials:
https://andrewadcock.com/a-simple-restful-api-tutorial-with-symfony-3/

Ideas:
SSE Events https://nehalist.io/logging-events-to-database-in-symfony/

`
./bin/console doctrine:schema:update --force
`

`
./bin/console server:run
`


Contoller Tests
https://knpuniversity.com/screencast/symfony-rest2/api-exception-subscriber


PHP.ini 
/usr/local/etc/php/5.5/php.ini

### Doctrine
https://symfony.com/doc/current/doctrine.html

Doctrine logger
// $em->getConnection()->getConfiguration()->setSQLLogger(new \Doctrine\DBAL\Logging\EchoSQLLogger());


Data Mapper vs Active Record 
http://culttt.com/2014/06/18/whats-difference-active-record-data-mapper/
https://www.thecodingmachine.com/orm-active-record-and-data-mapper/
http://fideloper.com/how-we-code
https://www.tomasvotruba.cz/blog/2017/03/27/why-is-doctrine-dying/

Propel 2 http://propelorm.org/
Eloquent ORM https://laravel.com/docs/5.5/eloquent

http://ocramius.github.io/doctrine-best-practices/#/16

### PHP

String interpolation
'Staffer cannot be assigned to a Ticket of category '.$this->category