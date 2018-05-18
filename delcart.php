<?php
require_once 'db_connect.php';
require_once 'cart_session.php';
$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
if(isset($_GET['remove'])){
    $delitem = $_GET['remove'];
    unset($cartitems[$delitem]);
    $itemids = implode(",", $cartitems);
    $_SESSION['cart'] = $itemids;
}
header('location:cart.php');