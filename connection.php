

<?php
# connection.php
require_once ('config.php');
/*
class MySQLConnection
{
    private static $instance = NULl;
    public static function getInstance() {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO('mysql:host=localhost;dbname=demo_mvc', 'bean', '12345');
                self::$instance->exec("SET NAMES 'utf8'");
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }
        return self::$instance;
    }
}

$mysql = MySQLConnection::getInstance();
*/

class MongoConnection{

}
class RedisConnection{

}
class CassandraConnection{

}
class Neo4JConnection{

}