<?php
/**
 * Created by PhpStorm.
 * User: gader177
 * Date: 5/2/2018
 * Time: 5:03 PM
 */
require_once 'db_connect.php';
require_once 'session.php';
require_once 'type_api.php';
require_once 'items_api.php';
require_once 'images_api.php';

if (!isset($_GET['id']))
{ header('location: admin_panel_brand_type.php?id=' . $_SESSION['user info']->user_id . '&status=failed'); die();}

$_id = (int)$_GET['id'];

if ($_id == 0)
{ header('location: admin_panel_brand_type.php?id=' . $_SESSION['user info']->user_id . '&status=failed'); die();}

$type = bsf_type_get_by_id($_id);

if (!$type)
{ header('location: admin_panel_brand_type.php?id=' . $_SESSION['user info']->user_id . '&status=failed'); die();}
//1- delete  all items in this type
$items_in_type = bsf_items_get('*', 'WHERE `type`=' . $_id);

if (!$items_in_type) {
    $result = bsf_type_delete_by_id($type->type_id);

    if(!$result)
        header('location: admin_panel_brand_type.php?id=' . $_SESSION['user info']->user_id . '&status=failed');
    else
        header('location: admin_panel_brand_type.php?id=' . $_SESSION['user info']->user_id . '&status=success');
    die();}

for ($i = 0; $i < count($items_in_type); $i++)
    if(!bsf_items_delete_by_id($items_in_type[$i]->item_id)) {
        die('location: admin_panel_brand_type.php?id=' . $_SESSION['user info']->user_id . '&status=failed_in_loop');
        // die();
    }

$result = bsf_type_delete_by_id($type->type_id);
if (!$result)
    header('location: admin_panel_brand_type.php?id=' . $_SESSION['user info']->user_id . '&status=failed');
else
    header('location: admin_panel_brand_type.php?id=' . $_SESSION['user info']->user_id . '&status=success');