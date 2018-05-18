<?php
/**
 * Created by PhpStorm.
 * User: gader177
 * Date: 4/25/2018
 * Time: 5:50 PM
 */
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = false;
}