<?php
# connection.php
require_once "vendor/autoload.php";

class Mongo
{
    private static $instance = NULl;
    public static function getInstance(){
        if(!isset(self::$instance)){
            $client = new MongoDB\Client;("mongodb://localhost:27017");
            self::$instance = $client;
        }
        return self::$instance;
    }
}


class Redis{

}



class Neo4J{
    private static $instance = NULL;
    public static function getInstace(){
        if(!isset(self::$instance)){
            self::$instance =Neoxygen\NeoClient\ClientBuilder::create()
                ->addConnection('default', 'http', 'localhost', 7474)
                ->setAutoFormatResponse(true)
                ->build();
        }
        return self::$instance;
    }
}
$collection = Mongo::getInstance()->ShopCart_db->USERS;
$cursor = $collection->find(['password'=>'123', 'email' => 'phuc@gmmail.com']);
foreach($cursor as $us){
    if(count($us) != 0){
        print("no");
    }
    else {
        print("ys");
    }
}