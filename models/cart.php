<?php
require_once ('connection.php');

class Cart_Detail{
    private $_id;
    private $price;
    private $image;

    /**
     * Cart_Detail constructor.
     * @param $_id
     * @param $price
     * @param $image
     */
    public function __construct($_id, $price, $image)
    {
        $this->_id = $_id;
        $this->price = $price;
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }


}
class Cart{
    private $_id;
    private $products;

    /**
     * Cart constructor.
     * @param $_id
     * @param $products
     */
    public function __construct($_id, $products)
    {
        $this->_id = $_id;
        $this->products = $products;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param mixed $products
     */
    public function setProducts($products): void
    {
        $this->products = $products;
    }


    public static function findCartById($id){
        $redis = Redis::getInstance();
        $products = array();
        $productIds = $redis->smembers('cart:'.$id);


        for($i = 0; $i<count($productIds);$i++){
            $product= $redis->hgetall('cart:'.$id.':'.$productIds[$i]);
            $product = ['product_id'=>$productIds[$i]] + $product;
            array_push($products, $product);


        }
        return new Cart($id, $products);
    }
    public static function addCart($cart){

    }
    public static function deleteCart($cart){

    }
    public static function updateCart($cart){

    }

}

$cart = Cart::findCartById(1);
print_r($cart);