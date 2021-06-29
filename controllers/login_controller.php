<?php
require_once('../models/user.php');

$_SESSION['user'] = User::findByEmailAndPassword($_POST['email'], $_POST['password']);
if($_SESSION['user'] != NULL){

    $_SESSION['session_id'] = $_SESSION['user']->getId();
    if(strcmp($_SESSION['session_id'],'anonymous') != 0)
        header('Location: ../index.php?controller=pages&action=home');

}
else{
    echo '<script>alert("Wrong email or password, re-enter please.")</script>';
    exit();

}





