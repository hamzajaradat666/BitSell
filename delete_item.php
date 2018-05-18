
<?php
/**
 * Created by PhpStorm.
 * User: gader177
 * Date: 4/30/2018
 * Time: 9:26 PM
 */
require_once 'db_connect.php';
require_once 'items_api.php';
require_once 'images_api.php';
require_once 'session.php';

if(!isset($_GET['id']))
    header('location: admin_panel_items.php?id='.$_SESSION['user info']->user_id.'status=failed');
$_id = (int)$_GET['id'];

if ($_id == 0)
    header('location: admin_panel_items.php?id='.$_SESSION['user info']->user_id.'status=failed');

$item = bsf_items_get_by_id($_id);

if (!$item)
    header('location: admin_panel_items.php?id='.$_SESSION['user info']->user_id.'status=failed');
$images = bsf_images_get('*', 'WHERE `item`=' . $item->item_id);
$image = $images[0];
if ($image)
$delete_image_result = bsf_images_delete_by_id($image->image_id);

$delete_result = bsf_items_delete_by_id($_id);

if (!$delete_result)
    header('location: admin_panel_items.php?id='.$_SESSION['user info']->user_id.'status=failed');
else
    header('location: admin_panel_items.php?id='.$_SESSION['user info']->user_id.'status=success');



