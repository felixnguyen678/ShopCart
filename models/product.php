<?php
#models/product.php
require_once ('connection.php');

class Product{
    private $id;
    private $name;
    private $price;
    private $promotion_price;
    private $inventory;
    private $description;
    private $images;
    private $isDeleted;

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $price
     * @param $promotion_price
     * @param $inventory
     * @param $description
     * @param $images
     * @param $isDeleted
     */
    public function __construct($id, $name, $price, $promotion_price, $inventory, $description, $images, $isDeleted)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->promotion_price = $promotion_price;
        $this->inventory = $inventory;
        $this->description = $description;
        $this->images = $images;
        $this->isDeleted = $isDeleted;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getPromotionPrice()
    {
        return $this->promotion_price;
    }

    /**
     * @return mixed
     */
    public function getInventory()
    {
        return $this->inventory;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @return mixed
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }

    public function toJSON(){
        json_encode($this);
    }

    public static function findAll()
    {
        $array = array();
        $collection = Mongo::getInstance()->ShopCart_db->PRODUCTS;
        $cursor = $collection->find(['isDeleted' => false]);
        foreach($cursor as $pr){
            array_push($array,
                new Product(
                    $pr['_id'],
                    $pr['name'],
                    $pr['price'],
                    $pr['promotion_price'],
                    $pr['inventory'],
                    $pr['description'],
                    $pr['images'],
                    $pr['isDeleted']
                )
            );
        }
        return $array;
    }
    public static function findById($id){
        $collection = Mongo::getInstance()->ShopCart_db->PRODUCTS;
        $cursor = $collection->find(['_id' => new MongoDB\BSON\ObjectId($id)]);
        foreach($cursor as $pr){
            return new Product(
                $pr['_id'],
                $pr['name'],
                $pr['price'],
                $pr['promotion_price'],
                $pr['inventory'],
                $pr['description'],
                $pr['images'],
                $pr['isDeleted']
            );
        }
    }
    public static function findByCategory($category_id){
        $array = array();
        $collection = Mongo::getInstance()->ShopCart_db->CATEGORIES;
        $cursor = $collection->find(['_id' => new MongoDB\BSON\ObjectId($category_id)]);
        foreach($cursor as $category){
            for($i=0;$i<count($category['products']);$i++){
                $pr = $category['products'][$i];
                array_push($array,
                    new Product(
                        $pr['_id'],
                        $pr['name'],
                        $pr['price'],
                        $pr['promotion_price'],
                        NULL,
                        NULL,
                        $pr['images'],
                        NULL
                    )
                );
            }

        }
        return $array;
    }
    public static function findTheMostBought(){
        // lua chon ra 2 san pham duoc mua nhieu nhat
        $query = "match (p:User)-[b:VIEW]->(pr:Product) return pr, count(*) as times order by times desc limit 2";
        $result = Neo4J::getInstace()->sendCypherQuery($query)->getResult();
        $array = array();
        for($i = 1; $i<=2; $i++){
            array_push($array,
                new Product(
                    $result[$i]['n']['id'],
                    $result[$i]['n']['name'],
                    $result[$i]['n']['price'],
                    $result[$i]['n']['promotion_price'],
                    $result[$i]['n']['inventory'],
                    $result[$i]['n']['description'],
                    $result[$i]['n']['images'],
                    $result[$i]['n']['isDeleted'],
                )
            );
        }
        return $array;
    }
}
