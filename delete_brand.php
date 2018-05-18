<?php
/**
 * Created by PhpStorm.
 * User: gader177
 * Date: 5/2/2018
 * Time: 5:03 PM
 */
require_once 'db_connect.php';
require_once 'session.php';
require_once 'brand_api.php';
require_once 'items_api.php';
require_once 'images_api.php';

if (!isset($_GET['id']))
{ header('location: admin_panel_brand_type.php?id=' . $_SESSION['user info']->user_id . '&status=failed1'); die();}

$_id = (int)$_GET['id'];

if ($_id == 0)
{ header('location: admin_panel_brand_type.php?id=' . $_SESSION['user info']->user_id . '&status=failed2'); die();}

$brand = bsf_brand_get_by_id($_id);

if (!$brand)
{ header('location: admin_panel_brand_type.php?id=' . $_SESSION['user info']->user_id . '&status=failed3'); die();}
//1- delete  all items in this type
$items_in_brand = bsf_items_get('*', 'WHERE `brand`=' . $_id);

if (!$items_in_brand) {
$result = bsf_brand_delete_by_id($brand->brand_id);
if (!$result)
    header('location: admin_panel_brand_type.php?id=' . $_SESSION['user info']->user_id . '&status=failed5');
else
    header('location: admin_panel_brand_type.php?id=' . $_SESSION['user info']->user_id . '&status=success');
die(); }

for ($i = 0; $i < count($items_in_brand); $i++)
    if(!bsf_items_delete_by_id($items_in_brand[$i]->item_id)) {
        header('location: admin_panel_brand_type.php?id=' . $_SESSION['user info']->user_id . '&status=failed_in_loop' . $i);
        die();
    }

//2- delete this type
$result = bsf_brand_delete_by_id($brand->brand_id);
header('location: admin_panel_brand_type.php?id=' . $_SESSION['user info']->user_id . '&status=success');