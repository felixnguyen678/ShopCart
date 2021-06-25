<?php
# connection.php
require_once "vendor/autoload.php";
use MongoDB\Client;
class Mongo
{
    private static $instance = NULl;
    public static function getInstance(){
        if(!isset(self::$instance)){
            $con = new Client("mongodb+srv://leminh1031999:minh10399@cluster0.dkkvd.mongodb.net/test");
            self::$instance = $con->selectDatabase("ShopCart_db");
        }
        return self::$instance;
    }
}
$mongo = Mongo::getInstance();


class Redis{

}
class Cassandra{

}


require_once "vendor/autoload.php";
use Neoxygen\NeoClient\ClientBuilder;
class Neo4J{
    private static $instance = NULL;
    public static function getInstace(){
        if(!isset(self::$instance)){
            self::$instance = ClientBuilder::create()
                ->addConnection('default', 'http', 'localhost', 7474)
                ->setAutoFormatResponse(true)
                ->build();
        }
        return self::$instance;
    }
}
$neo4J = Neo4J::getInstace();

//$result = $client->sendCypherQuery("match (n) return n")->getResult();
//print_r($result->getTableFormat());



