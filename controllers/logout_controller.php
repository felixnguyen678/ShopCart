<?php
session_start();
unset($_SESSION["session_id"]);
unset($_SESSION['user']);

unset($_SESSION["cart_id"]);
unset($_SESSION["cart_total_amount"]);
unset($_SESSION["cart_total_price"]);

header("Location: ../index.php");
