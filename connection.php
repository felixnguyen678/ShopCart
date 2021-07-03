<?php
# connection.php
require_once "vendor/autoload.php";

class Mongo
{
    private static $instance = NULL;
    public static function getInstance(){
        if(!isset(self::$instance)){
            $client = new MongoDB\Client;("mongodb://localhost:27017");
            self::$instance = $client;
        }
        return self::$instance;
    }
}



class Redis{
    private static $instance = NULL;
    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new Predis\Client();

        }
        return  self::$instance;
    }
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
