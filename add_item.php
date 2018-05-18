<?php
/**
 * Created by PhpStorm.
 * User: gader177
 * Date: 4/30/2018
 * Time: 9:03 PM
 */
require_once 'db_connect.php';
require_once 'items_api.php';
require_once 'session.php';
extract($_POST);
if (!isset($item_name) || !isset($type) || !isset($brand) || !isset($quantity) || !isset($price) || !isset($des))
    die('not set');

$add_result = bsf_items_add($price, $brand, $type, $quantity, $item_name, $des);

if (!$add_result)
    header('location: admin_panel_items.php?id='.$_SESSION['user info']->user_id.'status=failed');
else
    header('location: admin_panel_items.php?id='.$_SESSION['user info']->user_id.'status=success');
