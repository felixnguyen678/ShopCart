<?php
require_once ('connection.php');

class Cart{
    private $_id;
    private $products;
    /**
     * DATA STRUTURE
     */
    /*
    Cart Object
    (
        [_id:Cart:private] => 1
        [products:Cart:private] => Array
            (
                [product4] => Array
                    (
                        [id] => product4
                    )

                [product3] => Array
                    (
                        [id] => product3
                    )

                [product2] => Array
                    (
                        [id] => product2
                        [name] => Ipad
                        [price] => 1500
                        [number] => 2
                    )

                [product1] => Array
                    (
                        [id] => product1
                        [name] => IPhone
                        [price] => 2000
                        [number] => 10
                    )

            )

    )
    */

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
    public function getTotalPrice(){
        $total_price = 0;
        $products = $this->getProducts();
        foreach($products as $product){
            if(isset($product['price']) && isset($product['number'])){
                $total_price += $product['price'] * $product['number'];
            }
        }
        return $total_price;
    }

    public static function findCartById($id){
        $redis = Redis::getInstance();
        $products = array();
        $productIds = $redis->smembers('cart:'.$id);
        if($productIds == NULL)
            return NULL;
        for($i = 0; $i<count($productIds);$i++){
            $product= $redis->hgetall('cart:'.$id.':'.$productIds[$i]);
            if(isset($product['price']) && isset($product['number'])) {
                $product['price'] = +$product['price'];
                $product['number'] = +$product['number'];
            }
            $product = ['id'=>$productIds[$i]] + $product;
            $products += [$productIds[$i] => $product];
        }
        return new Cart($id, $products);
    }
    public static function deleteCart($cart_id){
        $cart = self::findCartById($cart_id);
        if($cart == NULL) return;
        $redis = Redis::getInstance();
        $products = $cart->products;
        foreach($products as $product){
            $redis->del('cart:'.$cart_id.':'.$product['id']);
        }
        $redis->del('cart:'.$cart_id);
    }
    public static function setCart($cart){
        $old_cart = self::findCartById($cart->getId());
        if($old_cart != NULL)
            self::deleteCart($old_cart->getId());
        //add cart
        $redis = Redis::getInstance();
        $products = $cart->getProducts();
        foreach($products as $product){
            // add cart:cartID    set
            // add cart:cartID:productID   hashmap
            $redis->sadd('cart:'.$cart->getId(), $product['id']);
            $redis->hmset('cart:'.$cart->getId().':'.$product['id'],$product);
        }
    }

}

/* test
$cart = Cart::findCartById('1');

$new_produt2 = array
(
    'id' => 'product2',
    'name' => 'Ipad',
'price' => 1500,
                    'number' => 100,
                );
$products = $cart->getProducts();
unset($products['product2']);
array_push($products, $new_produt2);
$cart->setProducts($products);
Cart::setCart($cart);
$cart = Cart::findCartById('1');

print_r($cart);
print($cart->getTotalPrice());

*/