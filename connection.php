<?php
# connection.php
require_once "vendor/autoload.php";
use MongoDB\Client;
class Mongo
{
    private static $instance = NULl;
    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new Client("mongodb+srv://leminh1031999:minh10399@cluster0.dkkvd.mongodb.net/test");
        }
        return self::$instance;
    }
}
$collection = (new MongoDB\Client("mongodb+srv://leminh1031999:minh10399@cluster0.dkkvd.mongodb.net/test"))->ShopCart_db->PRODUCTS;
$cursor = $collection->find(['_id' => new MongoDB\BSON\ObjectId('60d57044b2d9cc20b2764580')]);
print_r($cursor);

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






