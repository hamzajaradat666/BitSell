<?php
/**
 * Created by PhpStorm.
 * User: gader177
 * Date: 4/30/2018
 * Time: 10:48 PM
 */
require_once 'db_connect.php';
require_once 'items_api.php';
require_once 'session.php';

if (!isset($_GET['id']) || !isset($_GET['item_name']) || !isset($_GET['brand']) || !isset($_GET['type']) || !isset($_GET['price']) || !isset($_GET['quantity']) || !isset($_GET['des']))
    header('location: admin_panel_items.php?id='.$_SESSION['user info']->user_id.'status=failed1');

$item = bsf_items_get_by_id($_GET['id']);

if (!$item)
    header('location: admin_panel_items.php?id='.$_SESSION['user info']->user_id.'status=failed2');

$update_result = bsf_items_update($_GET['id'], $_GET['price'], $_GET['brand'], $_GET['type'], $_GET['quantity'], $_GET['item_name'], $_GET['des']);
bsf_db_close();

if (!$update_result)
    header('location: admin_panel_items.php?id='.$_SESSION['user info']->user_id.'status=failed3');
else
    header('location: admin_panel_items.php?id='.$_SESSION['user info']->user_id.'status=success');
