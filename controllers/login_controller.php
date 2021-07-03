<?php
require_once('../models/user.php');
require_once('../models/cart.php');
session_start();

$user = User::findByEmailAndPassword($_POST['email'], $_POST['password']);
if($user != NULL){
    $_SESSION['user'] = $user;
    $_SESSION['session_id'] = $_SESSION['user']->getId();
    $cart = Cart::findCartById($_SESSION['session_id']);

    if($cart != NULL){
        $_SESSION['cart_id'] = $_SESSION['session_id'];
        $_SESSION['cart_total_price'] =$cart->getTotalPrice();
        $_SESSION['cart_total_amount'] = $cart->getTotalAmount();
    }
    if(strcmp($_SESSION['session_id'],'anonymous') != 0)
        header('Location: ../index.php?controller=pages&action=home');

}
else{
    echo '<script>alert("Wrong email or password, re-enter please.")</script>';

}





