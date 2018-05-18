<?php
require_once 'db_connect.php';
require_once 'cart_session.php';
require_once 'items_api.php';

session_start();
if(isset($_GET['id']) & !empty($_GET['id'])){
    if(isset($_SESSION['cart']) & !empty($_SESSION['cart'])){

        $items = $_SESSION['cart'];
        $cartitems = explode(",", $items);
        if(in_array($_GET['id'], $cartitems)){
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else{
            $items .= "," . $_GET['id'];
            $_SESSION['cart'] = $items;
            header('Location: ' . $_SERVER['HTTP_REFERER']);

        }

    }else{
        $items = $_GET['id'];
        $_SESSION['cart'] = $items;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

}else{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>