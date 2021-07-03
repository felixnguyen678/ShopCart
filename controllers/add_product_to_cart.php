<?php
require_once ('../models/cart.php');
session_start();

if(isset($_SESSION['session_id']) && isset($_POST['id']) && isset($_POST['name']) && isset($_POST['image']) && isset($_POST['price']))
{
    if(!isset($_SESSION['cart_id'])){
        $product = array (
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'image' => $_POST['image'],
            'price' => +$_POST['price'],
            'number'=> 1
        );
        Cart::setCart(new Cart(
            $_SESSION['session_id'],array(
            $_POST['id'] => $product
        )));
    }
    else{
        $cart = Cart::findCartById($_SESSION['session_id']);
        $check = 0;
        $products = $cart->getProducts();
        foreach($products as $product){
            if(strcmp($product['id'], $_POST['id']) == 0){
                $products[$_POST['id']]['number'] += 1;
                $check = 1;
                break;
            }
        }
        if($check == 0){
            $products =array(
                    $_POST['id'] => array (
                        'id' => $_POST['id'],
                        'name' => $_POST['name'],
                        'image' => $_POST['image'],
                        'price' => +$_POST['price'],
                        'number'=> 1
                    )
                ) + $products;
        }
        Cart::setCart(new Cart($_SESSION['session_id'], $products));
    }

    $new_cart = Cart::findCartById($_SESSION['session_id']);

    $_SESSION['cart_id'] = $new_cart->getId();
    $_SESSION['cart_total_price'] = $new_cart->getTotalPrice();
    $_SESSION['cart_total_amount'] = $new_cart->getTotalAmount();

    header('Location: ../index.php?controller=pages&action=home');
}
else{
    header('Location: ../index.php?controller=pages&action=login');
}



